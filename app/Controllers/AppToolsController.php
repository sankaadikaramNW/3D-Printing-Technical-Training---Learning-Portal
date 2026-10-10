<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\PrinterPart;
use App\Models\PrintingMaterial;
use App\Models\PrinterSpecification;

class AppToolsController extends Controller
{
    public function slicingCalculator(): void
    {
        $materialModel = new PrintingMaterial();
        $materials = $materialModel->all('sort_order ASC, id ASC');

        $this->render('pages.slicing_calculator', [
            'pageTitle' => 'Interactive Slicing Calculator & Extrusion Simulator - SLAF 3D Portal',
            'metaDescription' => 'Real-time defense slicing simulator calculating part mass, build duration, and material cost based on SLAF aerospace formulas.',
            'materials' => $materials
        ]);
    }

    public function hardwareAnatomy(): void
    {
        $partModel = new PrinterPart();
        $groupedParts = $partModel->getByCategory();

        $this->render('pages.hardware_anatomy', [
            'pageTitle' => 'Hardware Anatomy & Maintenance Subsystem Viewer - SLAF 3D Portal',
            'metaDescription' => 'Interactive subsystem inspection for Hotend, Extruder, Heatbed, Steppers, Controller, and SLA Resin Vat with airbase maintenance checklists.',
            'groupedParts' => $groupedParts
        ]);
    }

    public function preflightChecklist(): void
    {
        $this->render('pages.preflight_checklist', [
            'pageTitle' => '5-Phase Pre-Flight Additive Manufacturing Checklist - SLAF',
            'metaDescription' => 'Standardized 5-phase pre-flight checklist for SLAF airmen before initiating mission-critical 3D printing jobs.',
        ]);
    }
}
