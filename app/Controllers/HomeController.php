<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\PrinterSpecification;
use App\Models\TrainingModule;
use App\Models\Project;
use App\Models\Video;
use App\Models\GalleryImage;
use App\Models\PrinterComponent;

class HomeController extends Controller
{
    public function index(): void
    {
        $articleModel = new Article();
        $specModel = new PrinterSpecification();
        $trainingModel = new TrainingModule();
        $projectModel = new Project();
        $videoModel = new Video();
        $galleryModel = new GalleryImage();
        $componentModel = new PrinterComponent();

        $featuredArticles = $articleModel->where(['is_published' => 1, 'is_featured' => 1], 'id DESC', 3);
        if (empty($featuredArticles)) {
            $featuredArticles = $articleModel->where(['is_published' => 1], 'id DESC', 3);
        }

        $highlightSpecs = $specModel->where(['is_highlight' => 1], 'sort_order ASC, id ASC');
        $trainingModules = $trainingModel->getPublishedWithLessons();
        $featuredProjects = $projectModel->where(['is_featured' => 1], 'sort_order ASC, id DESC', 3);
        $featuredVideos = $videoModel->where(['is_featured' => 1], 'sort_order ASC, id DESC', 3);
        $galleryHighlights = $galleryModel->all('sort_order ASC, id DESC', 6);
        $featuredComponents = $componentModel->where(['is_featured' => 1], 'sort_order ASC, id ASC', 4);

        $this->render('pages.home', [
            'pageTitle' => 'Home - FDM 3D Printer Technical Training Module',
            'metaDescription' => 'Digital technical learning and knowledge platform for the design, fabrication, and operation of an FDM 3D printer module.',
            'featuredArticles' => $featuredArticles,
            'highlightSpecs' => $highlightSpecs,
            'trainingModules' => $trainingModules,
            'featuredProjects' => $featuredProjects,
            'featuredVideos' => $featuredVideos,
            'galleryHighlights' => $galleryHighlights,
            'featuredComponents' => $featuredComponents
        ]);
    }
}
