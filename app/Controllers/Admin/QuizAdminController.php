<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class QuizAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $quizModel = new Quiz();
        $quizzes = $quizModel->all('id ASC');

        $this->render('admin.quizzes.index', [
            'pageTitle' => 'Manage Assessment Quizzes',
            'quizzes' => $quizzes
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.quizzes.form', [
            'pageTitle' => 'Create Quiz',
            'quiz' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/quizzes');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $category = trim((string)$this->request->input('category', 'Fundamentals'));
        $description = trim((string)$this->request->input('description'));
        $durationMins = (int)$this->request->input('duration_mins', 15);
        $passingScore = (int)$this->request->input('passing_score', 70);

        $quizModel = new Quiz();
        $id = $quizModel->create([
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'description' => $description,
            'duration_mins' => $durationMins,
            'passing_score' => $passingScore,
            'is_active' => 1
        ]);

        Logger::log('create', 'quizzes', $id, "Created quiz: $title");
        $this->setFlash('success', 'Quiz created successfully.');
        $this->redirect("admin/quizzes/questions/$id");
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $quizModel = new Quiz();
        $quiz = $quizModel->find((int)$id);

        if (!$quiz) {
            $this->setFlash('error', 'Quiz not found.');
            $this->redirect('admin/quizzes');
            return;
        }

        $this->render('admin.quizzes.form', [
            'pageTitle' => 'Edit Quiz: ' . $quiz['title'],
            'quiz' => $quiz
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/quizzes');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $category = trim((string)$this->request->input('category', 'Fundamentals'));
        $description = trim((string)$this->request->input('description'));
        $durationMins = (int)$this->request->input('duration_mins', 15);
        $passingScore = (int)$this->request->input('passing_score', 70);

        $quizModel = new Quiz();
        $quizModel->update($id, [
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'description' => $description,
            'duration_mins' => $durationMins,
            'passing_score' => $passingScore
        ]);

        Logger::log('update', 'quizzes', $id, "Updated quiz: $title");
        $this->setFlash('success', 'Quiz updated successfully.');
        $this->redirect('admin/quizzes');
    }

    public function questions(string $id): void
    {
        $this->requireAuth();
        $quizModel = new Quiz();
        $quiz = $quizModel->getQuizWithFullQuestions((int)$id);

        if (!$quiz) {
            $this->setFlash('error', 'Quiz not found.');
            $this->redirect('admin/quizzes');
            return;
        }

        $this->render('admin.quizzes.questions', [
            'pageTitle' => 'Questions for ' . $quiz['title'],
            'quiz' => $quiz
        ], 'admin');
    }

    public function storeQuestion(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/quizzes');
            return;
        }

        $quizId = (int)$this->request->input('quiz_id');
        $questionText = trim((string)$this->request->input('question_text'));
        $explanation = trim((string)$this->request->input('explanation'));
        $points = (int)$this->request->input('points', 10);
        $answers = $this->request->input('answers', []);
        $correctIndex = (int)$this->request->input('correct_index', 0);

        $questionModel = new QuizQuestion();
        $qId = $questionModel->create([
            'quiz_id' => $quizId,
            'question_text' => $questionText,
            'explanation' => $explanation,
            'points' => $points,
            'sort_order' => 0
        ]);

        $ansModel = new QuizAnswer();
        foreach ($answers as $idx => $ansText) {
            $text = trim((string)$ansText);
            if (!empty($text)) {
                $ansModel->create([
                    'question_id' => $qId,
                    'answer_text' => $text,
                    'is_correct' => ($idx == $correctIndex) ? 1 : 0,
                    'sort_order' => $idx + 1
                ]);
            }
        }

        $this->setFlash('success', 'Question added to quiz.');
        $this->redirect("admin/quizzes/questions/$quizId");
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/quizzes');
            return;
        }

        $quizModel = new Quiz();
        $quiz = $quizModel->find((int)$id);
        if ($quiz) {
            $quizModel->delete((int)$id);
            Logger::log('delete', 'quizzes', (int)$id, "Deleted quiz: {$quiz['title']}");
            $this->setFlash('success', 'Quiz deleted successfully.');
        }

        $this->redirect('admin/quizzes');
    }

    public function deleteQuestion(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/quizzes');
            return;
        }

        $questionModel = new QuizQuestion();
        $q = $questionModel->find((int)$id);
        if ($q) {
            $quizId = $q['quiz_id'];
            $questionModel->delete((int)$id);
            $this->setFlash('success', 'Question deleted.');
            $this->redirect("admin/quizzes/questions/$quizId");
            return;
        }

        $this->redirect('admin/quizzes');
    }
}
