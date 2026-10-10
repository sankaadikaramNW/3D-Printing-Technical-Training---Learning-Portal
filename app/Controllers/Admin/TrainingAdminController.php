<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\TrainingModule;
use App\Models\TrainingLesson;

class TrainingAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $moduleModel = new TrainingModule();
        $modules = $moduleModel->getPublishedWithLessons();

        $this->render('admin.training.index', [
            'pageTitle' => 'Manage Training Curriculum & Modules',
            'modules' => $modules
        ], 'admin');
    }

    public function createModule(): void
    {
        $this->requireAuth();
        $this->render('admin.training.module_form', [
            'pageTitle' => 'Create Training Module',
            'module' => null
        ], 'admin');
    }

    public function storeModule(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $moduleNumber = (int)$this->request->input('module_number');
        $slug = Helper::slugify($title);
        $description = trim((string)$this->request->input('description'));
        $estimatedHours = trim((string)$this->request->input('estimated_hours', '2 Hours'));
        $difficulty = $this->request->input('difficulty_level', 'Beginner');
        $icon = trim((string)$this->request->input('icon', 'fa-layer-group'));

        $moduleModel = new TrainingModule();
        $id = $moduleModel->create([
            'module_number' => $moduleNumber,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'estimated_hours' => $estimatedHours,
            'difficulty_level' => $difficulty,
            'icon' => $icon,
            'sort_order' => $moduleNumber,
            'is_published' => 1
        ]);

        Logger::log('create', 'training_modules', $id, "Created module: $title");
        $this->setFlash('success', 'Training module created.');
        $this->redirect('admin/training');
    }

    public function editModule(string $id): void
    {
        $this->requireAuth();
        $moduleModel = new TrainingModule();
        $module = $moduleModel->find((int)$id);

        if (!$module) {
            $this->setFlash('error', 'Module not found.');
            $this->redirect('admin/training');
            return;
        }

        $this->render('admin.training.module_form', [
            'pageTitle' => 'Edit Training Module',
            'module' => $module
        ], 'admin');
    }

    public function updateModule(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $moduleNumber = (int)$this->request->input('module_number');
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $description = trim((string)$this->request->input('description'));
        $estimatedHours = trim((string)$this->request->input('estimated_hours', '2 Hours'));
        $difficulty = $this->request->input('difficulty_level', 'Beginner');
        $icon = trim((string)$this->request->input('icon', 'fa-layer-group'));

        $moduleModel = new TrainingModule();
        $moduleModel->update($id, [
            'module_number' => $moduleNumber,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'estimated_hours' => $estimatedHours,
            'difficulty_level' => $difficulty,
            'icon' => $icon,
            'sort_order' => $moduleNumber
        ]);

        Logger::log('update', 'training_modules', $id, "Updated module: $title");
        $this->setFlash('success', 'Training module updated.');
        $this->redirect('admin/training');
    }

    public function deleteModule(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $moduleModel = new TrainingModule();
        $module = $moduleModel->find((int)$id);
        if ($module) {
            $moduleModel->delete((int)$id);
            Logger::log('delete', 'training_modules', (int)$id, "Deleted module: {$module['title']}");
            $this->setFlash('success', 'Module deleted.');
        }

        $this->redirect('admin/training');
    }

    public function createLesson(string $moduleId): void
    {
        $this->requireAuth();
        $moduleModel = new TrainingModule();
        $module = $moduleModel->find((int)$moduleId);

        $this->render('admin.training.lesson_form', [
            'pageTitle' => 'Add Lesson to ' . ($module['title'] ?? 'Module'),
            'module' => $module,
            'lesson' => null
        ], 'admin');
    }

    public function storeLesson(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $moduleId = (int)$this->request->input('module_id');
        $title = trim((string)$this->request->input('title'));
        $lessonNumber = (int)$this->request->input('lesson_number');
        $slug = Helper::slugify($title);
        $summary = trim((string)$this->request->input('summary'));
        $content = trim((string)$this->request->input('content'));
        $videoUrl = trim((string)$this->request->input('video_url'));
        $duration = (int)($this->request->input('duration_mins') ?: 15);

        $lessonModel = new TrainingLesson();
        $id = $lessonModel->create([
            'module_id' => $moduleId,
            'lesson_number' => $lessonNumber,
            'title' => $title,
            'slug' => $slug,
            'summary' => $summary,
            'content' => $content,
            'video_url' => $videoUrl,
            'duration_mins' => $duration,
            'sort_order' => $lessonNumber,
            'is_published' => 1
        ]);

        Logger::log('create', 'training_lessons', $id, "Created lesson: $title");
        $this->setFlash('success', 'Lesson added successfully.');
        $this->redirect('admin/training');
    }

    public function editLesson(string $id): void
    {
        $this->requireAuth();
        $lessonModel = new TrainingLesson();
        $moduleModel = new TrainingModule();

        $lesson = $lessonModel->find((int)$id);
        if (!$lesson) {
            $this->setFlash('error', 'Lesson not found.');
            $this->redirect('admin/training');
            return;
        }
        $module = $moduleModel->find((int)$lesson['module_id']);

        $this->render('admin.training.lesson_form', [
            'pageTitle' => 'Edit Lesson: ' . $lesson['title'],
            'module' => $module,
            'lesson' => $lesson
        ], 'admin');
    }

    public function updateLesson(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $lessonNumber = (int)$this->request->input('lesson_number');
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $summary = trim((string)$this->request->input('summary'));
        $content = trim((string)$this->request->input('content'));
        $videoUrl = trim((string)$this->request->input('video_url'));
        $duration = (int)($this->request->input('duration_mins') ?: 15);

        $lessonModel = new TrainingLesson();
        $lessonModel->update($id, [
            'lesson_number' => $lessonNumber,
            'title' => $title,
            'slug' => $slug,
            'summary' => $summary,
            'content' => $content,
            'video_url' => $videoUrl,
            'duration_mins' => $duration,
            'sort_order' => $lessonNumber
        ]);

        Logger::log('update', 'training_lessons', $id, "Updated lesson: $title");
        $this->setFlash('success', 'Lesson updated successfully.');
        $this->redirect('admin/training');
    }

    public function deleteLesson(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/training');
            return;
        }

        $lessonModel = new TrainingLesson();
        $lesson = $lessonModel->find((int)$id);
        if ($lesson) {
            $lessonModel->delete((int)$id);
            Logger::log('delete', 'training_lessons', (int)$id, "Deleted lesson: {$lesson['title']}");
            $this->setFlash('success', 'Lesson deleted.');
        }

        $this->redirect('admin/training');
    }
}
