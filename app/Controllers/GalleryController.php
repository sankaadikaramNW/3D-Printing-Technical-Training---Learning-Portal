<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index(): void
    {
        $galleryModel = new GalleryImage();
        $groupedImages = $galleryModel->getByCategory();
        $allImages = $galleryModel->all('sort_order ASC, id DESC');

        $this->render('pages.gallery', [
            'pageTitle' => 'Photo Gallery & Fabrication Documentation',
            'metaDescription' => 'High-resolution photographic documentation of the FDM 3D printer fabrication, assembly, wiring, test printing, and student training workshops.',
            'groupedImages' => $groupedImages,
            'allImages' => $allImages
        ]);
    }
}
