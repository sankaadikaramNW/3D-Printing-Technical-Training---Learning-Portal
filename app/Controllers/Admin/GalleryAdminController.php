<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Logger;
use App\Models\GalleryImage;

class GalleryAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $galleryModel = new GalleryImage();
        $images = $galleryModel->all('sort_order ASC, id DESC');

        $this->render('admin.gallery.index', [
            'pageTitle' => 'Manage Gallery Documentation',
            'images' => $images
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.gallery.form', [
            'pageTitle' => 'Add Gallery Photo',
            'image' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/gallery');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $description = trim((string)$this->request->input('description'));
        $imageUrl = trim((string)$this->request->input('image_url'));
        $category = $this->request->input('category');
        $stageTag = trim((string)$this->request->input('stage_tag'));

        $galleryModel = new GalleryImage();
        $id = $galleryModel->create([
            'title' => $title,
            'description' => $description,
            'image_url' => $imageUrl,
            'category' => $category,
            'stage_tag' => $stageTag,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('create', 'gallery', $id, "Added photo: $title");
        $this->setFlash('success', 'Photo added to gallery.');
        $this->redirect('admin/gallery');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/gallery');
            return;
        }

        $galleryModel = new GalleryImage();
        $img = $galleryModel->find((int)$id);
        if ($img) {
            $galleryModel->delete((int)$id);
            Logger::log('delete', 'gallery', (int)$id, "Deleted gallery photo: {$img['title']}");
            $this->setFlash('success', 'Photo deleted.');
        }

        $this->redirect('admin/gallery');
    }
}
