<?php
namespace App\Models;

use App\Core\Model;

class TrainingLesson extends Model
{
    protected string $table = 'training_lessons';

    public function getLessonsForModule(int $moduleId): array
    {
        return $this->where([
            'module_id' => $moduleId,
            'is_published' => 1
        ], 'sort_order ASC, lesson_number ASC');
    }

    public function findBySlugWithModule(string $slug): ?array
    {
        $sql = "
            SELECT l.*, m.title as module_title, m.slug as module_slug, m.module_number 
            FROM training_lessons l 
            JOIN training_modules m ON l.module_id = m.id 
            WHERE l.slug = :slug AND l.is_published = 1 
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['slug' => $slug]);
        $res = $stmt->fetch();
        return $res ?: null;
    }
}
