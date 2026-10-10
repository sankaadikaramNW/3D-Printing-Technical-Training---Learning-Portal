<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(): void
    {
        $videoModel = new Video();
        $groupedVideos = $videoModel->getByCategory();
        $allVideos = $videoModel->all('sort_order ASC, id DESC');

        $this->render('pages.videos', [
            'pageTitle' => 'Video Learning Center - Practical Demonstrations',
            'metaDescription' => 'Watch instructional video demonstrations covering FDM printer setup, bed leveling, slicing in Cura, maintenance, and failure troubleshooting.',
            'groupedVideos' => $groupedVideos,
            'allVideos' => $allVideos
        ]);
    }
}
