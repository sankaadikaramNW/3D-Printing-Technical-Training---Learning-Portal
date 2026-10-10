<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\GlossaryTerm;

class GlossaryController extends Controller
{
    public function index(): void
    {
        $glossaryModel = new GlossaryTerm();
        $groupedTerms = $glossaryModel->getGroupedByLetter();
        $letters = array_keys($groupedTerms);
        sort($letters);

        $this->render('pages.glossary', [
            'pageTitle' => 'A-Z 3D Printing & Additive Manufacturing Glossary',
            'metaDescription' => 'Comprehensive technical dictionary of additive manufacturing, slicing terms, motion control, thermodynamics, and FDM engineering concepts.',
            'groupedTerms' => $groupedTerms,
            'letters' => $letters
        ]);
    }
}
