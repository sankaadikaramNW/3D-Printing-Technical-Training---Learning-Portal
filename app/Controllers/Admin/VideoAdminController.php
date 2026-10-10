<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\Video;

class VideoAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $videoModel = new Video();
        $videos = $videoModel->all('sort_order ASC, id DESC');

        $this->render('admin.videos.index', [
            'pageTitle' => 'Manage Training Videos',
            'videos' => $videos
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.videos.form', [
            'pageTitle' => 'Add Training Video',
            'video' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/videos');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $category = trim((string)$this->request->input('category'));
        $description = trim((string)$this->request->input('description'));
        $videoSource = $this->request->input('video_source', 'youtube');
        $videoUrl = trim((string)$this->request->input('video_url'));
        $durationSeconds = (int)$this->request->input('duration_seconds', 0);
        $thumbnailUrl = trim((string)$this->request->input('thumbnail_url'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;

        $videoModel = new Video();
        $id = $videoModel->create([
            'category' => $category,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'video_source' => $videoSource,
            'video_url' => $videoUrl,
            'duration_seconds' => $durationSeconds,
            'thumbnail_url' => $thumbnailUrl,
            'is_featured' => $isFeatured,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('create', 'videos', $id, "Added video: $title");
        $this->setFlash('success', 'Video added successfully.');
        $this->redirect('admin/videos');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $videoModel = new Video();
        $video = $videoModel->find((int)$id);

        if (!$video) {
            $this->setFlash('error', 'Video not found.');
            $this->redirect('admin/videos');
            return;
        }

        $this->render('admin.videos.form', [
            'pageTitle' => 'Edit Video: ' . $video['title'],
            'video' => $video
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/videos');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $category = trim((string)$this->request->input('category'));
        $description = trim((string)$this->request->input('description'));
        $videoSource = $this->request->input('video_source', 'youtube');
        $videoUrl = trim((string)$this->request->input('video_url'));
        $durationSeconds = (int)$this->request->input('duration_seconds', 0);
        $thumbnailUrl = trim((string)$this->request->input('thumbnail_url'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;

        $videoModel = new Video();
        $videoModel->update($id, [
            'category' => $category,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'video_source' => $videoSource,
            'video_url' => $videoUrl,
            'duration_seconds' => $durationSeconds,
            'thumbnail_url' => $thumbnailUrl,
            'is_featured' => $isFeatured,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('update', 'videos', $id, "Updated video: $title");
        $this->setFlash('success', 'Video updated successfully.');
        $this->redirect('admin/videos');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/videos');
            return;
        }

        $videoModel = new Video();
        $vid = $videoModel->find((int)$id);
        if ($vid) {
            $videoModel->delete((int)$id);
            Logger::log('delete', 'videos', (int)$id, "Deleted video: {$vid['title']}");
            $this->setFlash('success', 'Video deleted.');
        }

        $this->redirect('admin/videos');
    }
}
