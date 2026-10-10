<?php
namespace App\Models;

use App\Core\Model;

class TrainingModule extends Model
{
    protected string $table = 'training_modules';

    public function getPublishedWithLessons(): array
    {
        $modules = $this->where(['is_published' => 1], 'sort_order ASC, module_number ASC');
        $lessonModel = new TrainingLesson();

        foreach ($modules as &$module) {
            $module['lessons'] = $lessonModel->getLessonsForModule((int)$module['id']);
            $module['lesson_count'] = count($module['lessons']);
        }

        return $modules;
    }

    public function findBySlug(string $slug): ?array
    {
        $module = $this->findBy('slug', $slug);
        if ($module) {
            $lessonModel = new TrainingLesson();
            $module['lessons'] = $lessonModel->getLessonsForModule((int)$module['id']);
        }
        return $module;
    }
}
