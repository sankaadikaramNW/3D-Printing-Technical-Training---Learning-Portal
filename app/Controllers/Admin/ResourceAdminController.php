<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\LearningResource;

class ResourceAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $resModel = new LearningResource();
        $resources = $resModel->all('id DESC');

        $this->render('admin.resources.index', [
            'pageTitle' => 'Manage Downloadable Learning Resources',
            'resources' => $resources
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.resources.form', [
            'pageTitle' => 'Add Learning Resource',
            'resource' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/resources');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $category = trim((string)$this->request->input('category', 'SOP & Checklists'));
        $fileType = trim((string)$this->request->input('file_type', 'PDF'));
        $fileSize = (float)$this->request->input('file_size_mb', 1.0);
        $downloadUrl = trim((string)$this->request->input('download_url'));
        $description = trim((string)$this->request->input('description'));

        $resModel = new LearningResource();
        $id = $resModel->create([
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'file_type' => $fileType,
            'file_size_mb' => $fileSize,
            'download_url' => $downloadUrl,
            'description' => $description,
            'is_active' => 1
        ]);

        Logger::log('create', 'resources', $id, "Added resource: $title");
        $this->setFlash('success', 'Resource added.');
        $this->redirect('admin/resources');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/resources');
            return;
        }

        $resModel = new LearningResource();
        $res = $resModel->find((int)$id);
        if ($res) {
            $resModel->delete((int)$id);
            Logger::log('delete', 'resources', (int)$id, "Deleted resource: {$res['title']}");
            $this->setFlash('success', 'Resource deleted.');
        }

        $this->redirect('admin/resources');
    }
}
