<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class QuizController extends Controller
{
    public function index(): void
    {
        $quizModel = new Quiz();
        $quizzes = $quizModel->where(['is_active' => 1], 'id ASC');

        $this->render('pages.quiz_index', [
            'pageTitle' => 'Knowledge Quizzes & Skills Assessment',
            'metaDescription' => 'Interactive multiple-choice quizzes to assess your technical understanding of FDM 3D printing, slicing parameters, safety, and troubleshooting.',
            'quizzes' => $quizzes
        ]);
    }

    public function take(string $slug): void
    {
        $quizModel = new Quiz();
        $quizBasic = $quizModel->findBy('slug', $slug);

        if (!$quizBasic) {
            http_response_code(404);
            $this->render('pages.404', ['pageTitle' => 'Quiz Not Found']);
            return;
        }

        $quiz = $quizModel->getQuizWithFullQuestions((int)$quizBasic['id']);

        $this->render('pages.quiz_take', [
            'pageTitle' => $quiz['title'] . ' - Interactive Assessment',
            'metaDescription' => $quiz['description'],
            'quiz' => $quiz
        ]);
    }

    public function submitScore(): void
    {
        // JSON endpoint for quiz scoring and feedback
        $data = json_decode(file_get_contents('php://input'), true);
        $quizId = (int)($data['quiz_id'] ?? 0);
        $userAnswers = $data['answers'] ?? []; // [question_id => answer_id]

        $quizModel = new Quiz();
        $quiz = $quizModel->getQuizWithFullQuestions($quizId);

        if (!$quiz) {
            $this->json(['success' => false, 'message' => 'Quiz not found'], 404);
            return;
        }

        $totalQuestions = count($quiz['questions']);
        $totalPoints = 0;
        $earnedPoints = 0;
        $feedback = [];

        foreach ($quiz['questions'] as $q) {
            $qId = $q['id'];
            $points = (int)($q['points'] ?? 10);
            $totalPoints += $points;

            $selectedAnswerId = $userAnswers[$qId] ?? null;
            $correctAnswer = null;

            foreach ($q['answers'] as $ans) {
                if ($ans['is_correct'] == 1) {
                    $correctAnswer = $ans;
                }
            }

            $isCorrect = false;
            if ($selectedAnswerId && $correctAnswer && $selectedAnswerId == $correctAnswer['id']) {
                $isCorrect = true;
                $earnedPoints += $points;
            }

            $feedback[] = [
                'question_id' => $qId,
                'question_text' => $q['question_text'],
                'selected_answer_id' => $selectedAnswerId,
                'correct_answer_id' => $correctAnswer['id'] ?? null,
                'correct_answer_text' => $correctAnswer['answer_text'] ?? '',
                'is_correct' => $isCorrect,
                'explanation' => $q['explanation'],
                'points_earned' => $isCorrect ? $points : 0
            ];
        }

        $percentage = $totalPoints > 0 ? round(($earnedPoints / $totalPoints) * 100) : 0;
        $passed = $percentage >= (int)$quiz['passing_score'];

        $this->json([
            'success' => true,
            'quiz_title' => $quiz['title'],
            'earned_points' => $earnedPoints,
            'total_points' => $totalPoints,
            'percentage' => $percentage,
            'passed' => $passed,
            'passing_score' => $quiz['passing_score'],
            'total_questions' => $totalQuestions,
            'feedback' => $feedback
        ]);
    }
}
