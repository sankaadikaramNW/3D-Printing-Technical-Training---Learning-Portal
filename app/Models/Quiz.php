<?php
namespace App\Models;

use App\Core\Model;

class Quiz extends Model
{
    protected string $table = 'quizzes';

    public function getQuizWithFullQuestions(int $quizId): ?array
    {
        $quiz = $this->find($quizId);
        if (!$quiz) return null;

        $qStmt = $this->db->prepare("SELECT * FROM quiz_questions WHERE quiz_id = :qid ORDER BY sort_order ASC, id ASC");
        $qStmt->execute(['qid' => $quizId]);
        $questions = $qStmt->fetchAll();

        $ansStmt = $this->db->prepare("SELECT * FROM quiz_answers WHERE question_id = :qid ORDER BY sort_order ASC, id ASC");

        foreach ($questions as &$q) {
            $ansStmt->execute(['qid' => $q['id']]);
            $q['answers'] = $ansStmt->fetchAll();
        }

        $quiz['questions'] = $questions;
        return $quiz;
    }
}
