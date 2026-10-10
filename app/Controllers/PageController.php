<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\PrinterSpecification;
use App\Models\PrinterComponent;
use App\Models\PrintingMaterial;
use App\Models\TroubleshootingIssue;
use App\Models\ProjectDevelopmentStage;

class PageController extends Controller
{
    public function aboutProject(): void
    {
        $specModel = new PrinterSpecification();
        $groupedSpecs = $specModel->getGroupedByCategory();

        $this->render('pages.about_project', [
            'pageTitle' => 'About The Project - FDM 3D Printer Module',
            'metaDescription' => 'Background, aim, objectives, scope, and technical educational significance of the FDM 3D printer training module.',
            'groupedSpecs' => $groupedSpecs
        ]);
    }

    public function fundamentals(): void
    {
        $this->render('pages.fundamentals', [
            'pageTitle' => '3D Printing Fundamentals & Additive Manufacturing',
            'metaDescription' => 'Foundational principles of additive manufacturing, history, technology comparisons, advantages, and limitations.'
        ]);
    }

    public function fdmTechnology(): void
    {
        $this->render('pages.fdm_technology', [
            'pageTitle' => 'FDM Technology & Extrusion Mechanics',
            'metaDescription' => 'In-depth exploration of Fused Deposition Modeling principles, melt zone thermodynamics, filament extrusion, and layer formation.'
        ]);
    }

    public function printerComponents(): void
    {
        $componentModel = new PrinterComponent();
        $groupedComponents = $componentModel->getByCategory();

        $this->render('pages.printer_components', [
            'pageTitle' => 'FDM Printer Components & Subsystems',
            'metaDescription' => 'Exhaustive mechanical, electrical, extrusion, and thermal component database with working principles, technical specs, and maintenance guides.',
            'groupedComponents' => $groupedComponents
        ]);
    }

    public function howItWorks(): void
    {
        $this->render('pages.how_it_works', [
            'pageTitle' => 'How the FDM 3D Printer Works - Complete Lifecycle',
            'metaDescription' => 'Interactive step-by-step workflow from CAD design, STL/3MF mesh generation, slicer toolpaths, to physical thermal layer deposition.'
        ]);
    }

    public function modelPreparation(): void
    {
        $this->render('pages.model_preparation', [
            'pageTitle' => '3D Model Preparation & CAD Design for Additive Manufacturing',
            'metaDescription' => 'Best practices for 3D modeling, STL/3MF file standards, orientation strategy, wall thickness, overhang angles, and support structures.'
        ]);
    }

    public function slicing(): void
    {
        $this->render('pages.slicing', [
            'pageTitle' => '3D Slicing Masterclass - Cura, PrusaSlicer & G-Code',
            'metaDescription' => 'Master critical slicing parameters: layer height, infill patterns, wall count, extrusion temperature, print speed, retraction, and bed adhesion.'
        ]);
    }

    public function materials(): void
    {
        $materialModel = new PrintingMaterial();
        $materials = $materialModel->all('sort_order ASC, id ASC');

        $this->render('pages.materials', [
            'pageTitle' => '3D Printing Materials - PLA, PETG, ABS & TPU Polymers',
            'metaDescription' => 'Engineering comparison of FDM thermoplastic filaments, thermal properties, mechanical tensile strength, print settings, and safety protocols.',
            'materials' => $materials
        ]);
    }

    public function operationProcess(): void
    {
        $this->render('pages.operation_process', [
            'pageTitle' => 'Standard Operating Procedure (SOP) - 19-Step Printing Process',
            'metaDescription' => 'Rigorous 19-stage standard operating procedure from pre-flight safety check to post-print cool down and QA metrology inspection.'
        ]);
    }

    public function safety(): void
    {
        $this->render('pages.safety', [
            'pageTitle' => 'Laboratory Safety Guidelines & Hazard Management',
            'metaDescription' => 'Comprehensive technical workshop safety rules: thermal burn prevention, electrical fire safety, mechanical pinch points, and UFP/VOC ventilation.'
        ]);
    }

    public function troubleshooting(): void
    {
        $troubleModel = new TroubleshootingIssue();
        $groupedIssues = $troubleModel->getByCategory();

        $this->render('pages.troubleshooting', [
            'pageTitle' => 'Interactive 3D Printing Troubleshooting Matrix',
            'metaDescription' => 'Systematic diagnostic framework: diagnose symptoms, identify root causes, execute step-by-step checks, and apply corrective actions.',
            'groupedIssues' => $groupedIssues
        ]);
    }

    public function projectDevelopment(): void
    {
        $stageModel = new ProjectDevelopmentStage();
        $stages = $stageModel->all('stage_number ASC');

        $this->render('pages.project_development', [
            'pageTitle' => 'Project Development Journey - Fabrication Milestones',
            'metaDescription' => 'Chronological 13-stage engineering journey documenting the conceptualization, CAD design, fabrication, assembly, calibration, and deployment of the FDM printer module.',
            'stages' => $stages
        ]);
    }

    public function applications(): void
    {
        $this->render('pages.applications', [
            'pageTitle' => 'Engineering & Educational Applications of FDM 3D Printing',
            'metaDescription' => 'Practical applications in rapid prototyping, tooling, custom jigs and fixtures, electronic enclosures, laboratory apparatus, and STEM innovation.'
        ]);
    }

    public function technicalTrainingImportance(): void
    {
        $this->render('pages.technical_training_importance', [
            'pageTitle' => 'Significance of 3D Printing in Technical & Engineering Training',
            'metaDescription' => 'How hands-on additive manufacturing interconnects mechanical engineering, electronics, computer science, and practical prototyping skills.'
        ]);
    }

    public function finalProject(): void
    {
        $specModel = new PrinterSpecification();
        $specs = $specModel->all('sort_order ASC, id ASC');

        $this->render('pages.final_project', [
            'pageTitle' => 'Final Project Showcase & Technical Dossier',
            'metaDescription' => 'Comprehensive engineering technical dossier and showcase of the developed FDM 3D printer module for technical training.',
            'specs' => $specs
        ]);
    }
}
