<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(): void
    {
        $faqModel = new Faq();
        $groupedFaqs = $faqModel->getGroupedByCategory();

        $this->render('pages.faq', [
            'pageTitle' => 'Frequently Asked Questions (FAQ) - FDM 3D Printing',
            'metaDescription' => 'Expert answers to common questions on FDM printer operation, material selection, bed leveling, safety, and troubleshooting.',
            'groupedFaqs' => $groupedFaqs
        ]);
    }
}
