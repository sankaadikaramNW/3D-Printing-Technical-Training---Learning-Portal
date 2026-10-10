<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Logger;
use App\Models\MediaFile;

class MediaAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $mediaModel = new MediaFile();
        $mediaFiles = $mediaModel->all('id DESC');

        $this->render('admin.media.index', [
            'pageTitle' => 'Media Library & File Assets',
            'mediaFiles' => $mediaFiles,
            'files' => $mediaFiles
        ], 'admin');
    }

    public function upload(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->setFlash('error', 'Invalid security token. Please try again.');
            $this->redirect('admin/media');
            return;
        }

        $file = $this->request->file('file') ?? $this->request->file('upload_file');
        if (!$file || !isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            $this->setFlash('error', 'Please select a valid file to upload.');
            $this->redirect('admin/media');
            return;
        }

        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml', 'application/pdf', 'model/stl', 'application/sla', 'text/plain'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = !empty($file['tmp_name']) && file_exists($file['tmp_name']) ? finfo_file($finfo, $file['tmp_name']) : '';
        finfo_close($finfo);

        $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg', 'pdf', 'stl', 'txt'];

        if (!in_array($mime, $allowedMimes) && !in_array($ext, $allowedExts)) {
            $this->setFlash('error', 'Invalid file type. Only JPG, PNG, WebP, GIF, SVG, PDF and STL files are allowed.');
            $this->redirect('admin/media');
            return;
        }

        $maxSize = (int)($_ENV['MAX_UPLOAD_SIZE'] ?? 10485760);
        if (($file['size'] ?? 0) > $maxSize) {
            $this->setFlash('error', 'File size exceeds maximum permitted limit (10MB).');
            $this->redirect('admin/media');
            return;
        }

        $uploadDir = __DIR__ . '/../../../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $safeName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', pathinfo($file['name'] ?? 'file', PATHINFO_FILENAME));
        $finalName = time() . '_' . $safeName . '.' . $ext;
        $targetPath = $uploadDir . $finalName;
        $publicPath = 'uploads/' . $finalName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $mediaModel = new MediaFile();
            $id = $mediaModel->create([
                'file_name' => $file['name'] ?? $finalName,
                'file_path' => $publicPath,
                'file_type' => $ext,
                'file_size' => (int)($file['size'] ?? 0),
                'mime_type' => $mime ?: ('image/' . $ext),
                'alt_text' => $this->request->input('alt_text', $file['name'] ?? 'Media asset'),
                'uploaded_by' => Auth::id()
            ]);

            Logger::log('upload', 'media', (int)$id, "Uploaded file: " . ($file['name'] ?? $finalName));
            $this->setFlash('success', 'File uploaded successfully.');
        } else {
            $this->setFlash('error', 'Failed to save uploaded file to destination directory.');
        }

        $this->redirect('admin/media');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->setFlash('error', 'Security token validation failed.');
            $this->redirect('admin/media');
            return;
        }

        $mediaModel = new MediaFile();
        $media = $mediaModel->find((int)$id);

        if ($media) {
            $filePath = __DIR__ . '/../../../' . ($media['file_path'] ?? '');
            if (!empty($media['file_path']) && file_exists($filePath)) {
                @unlink($filePath);
            }
            $mediaModel->delete((int)$id);
            Logger::log('delete', 'media', (int)$id, "Deleted media: " . ($media['file_name'] ?? 'File'));
            $this->setFlash('success', 'File deleted.');
        } else {
            $this->setFlash('error', 'File not found or already deleted.');
        }

        $this->redirect('admin/media');
    }
}
