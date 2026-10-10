<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\TrainingModule;
use App\Models\TrainingLesson;

class TrainingController extends Controller
{
    public function index(): void
    {
        $moduleModel = new TrainingModule();
        $modules = $moduleModel->getPublishedWithLessons();

        $this->render('pages.training_index', [
            'pageTitle' => 'Structured Training Modules & Curriculum',
            'metaDescription' => '8-module progressive engineering curriculum for hands-on FDM 3D printing and additive manufacturing technical training.',
            'modules' => $modules
        ]);
    }

    public function lesson(string $slug): void
    {
        $lessonModel = new TrainingLesson();
        $moduleModel = new TrainingModule();

        $lesson = $lessonModel->findBySlugWithModule($slug);
        if (!$lesson) {
            http_response_code(404);
            $this->render('pages.404', ['pageTitle' => 'Lesson Not Found']);
            return;
        }

        $module = $moduleModel->find((int)$lesson['module_id']);
        $siblingLessons = $lessonModel->getLessonsForModule((int)$lesson['module_id']);

        // Determine previous and next lessons
        $prevLesson = null;
        $nextLesson = null;
        for ($i = 0; $i < count($siblingLessons); $i++) {
            if ($siblingLessons[$i]['id'] == $lesson['id']) {
                $prevLesson = $siblingLessons[$i - 1] ?? null;
                $nextLesson = $siblingLessons[$i + 1] ?? null;
                break;
            }
        }

        $this->render('pages.lesson_detail', [
            'pageTitle' => $lesson['title'] . ' - Training Lesson',
            'metaDescription' => $lesson['summary'],
            'lesson' => $lesson,
            'module' => $module,
            'siblingLessons' => $siblingLessons,
            'prevLesson' => $prevLesson,
            'nextLesson' => $nextLesson
        ]);
    }
}
