<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Directorate;
use App\Models\Video;
use App\Models\Article;
use App\Models\Project;

class DirectorateController extends Controller
{
    public function index(): void
    {
        $dirModel = new Directorate();
        $directorates = $dirModel->all('sort_order ASC');

        $this->render('pages.directorates_index', [
            'pageTitle' => 'SLAF Directorates & Technical Trades - Additive Manufacturing Tracks',
            'metaDescription' => 'Specialized 3D printing and additive manufacturing applications across DGCE, DGGE, DGP, and IT & Avionics branches in the Sri Lanka Air Force.',
            'directorates' => $directorates
        ]);
    }

    public function show(string $code): void
    {
        $dirModel = new Directorate();
        $directorate = $dirModel->findByCode($code);

        if (!$directorate) {
            $this->redirect('directorates');
            return;
        }

        $videoModel = new Video();
        $videos = $videoModel->where(['directorate_code' => strtoupper($code)]);
        if (empty($videos)) {
            $videos = $videoModel->where(['is_featured' => 1], 'id DESC', 3);
        }

        $projectModel = new Project();
        $projects = $projectModel->all('sort_order ASC, id DESC', 4);

        $this->render('pages.directorate_show', [
            'pageTitle' => $directorate['name'] . ' (' . $directorate['code'] . ') - SLAF 3D Printing Track',
            'metaDescription' => $directorate['description'],
            'directorate' => $directorate,
            'videos' => $videos,
            'projects' => $projects
        ]);
    }
}
