<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\Project;

class ProjectAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $projectModel = new Project();
        $projects = $projectModel->all('sort_order ASC, id DESC');

        $this->render('admin.projects.index', [
            'pageTitle' => 'Manage Practical Engineering Projects',
            'projects' => $projects
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.projects.form', [
            'pageTitle' => 'Add Engineering Project Showcase',
            'project' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/projects');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $clientOrg = trim((string)$this->request->input('client_org', 'Technical Training Wing'));
        $category = trim((string)$this->request->input('category', 'Engineering Prototyping'));
        $objective = trim((string)$this->request->input('objective'));
        $problemStatement = trim((string)$this->request->input('problem_statement'));
        $solutionSummary = trim((string)$this->request->input('solution_summary'));
        $materialUsed = trim((string)$this->request->input('material_used'));
        $printTimeHours = (float)$this->request->input('print_time_hours', 0);
        $filamentWeight = (float)$this->request->input('filament_weight_grams', 0);
        $layerHeight = (float)$this->request->input('layer_height_mm', 0.2);
        $infillPercent = (int)$this->request->input('infill_percent', 20);
        $nozzleTemp = (int)$this->request->input('nozzle_temp_c', 210);
        $bedTemp = (int)$this->request->input('bed_temp_c', 60);
        $resultsSummary = trim((string)$this->request->input('results_summary'));
        $lessonsLearned = trim((string)$this->request->input('lessons_learned'));
        $imageUrl = trim((string)$this->request->input('image_url'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;

        $projectModel = new Project();
        $id = $projectModel->create([
            'title' => $title,
            'slug' => $slug,
            'client_org' => $clientOrg,
            'category' => $category,
            'objective' => $objective,
            'problem_statement' => $problemStatement,
            'solution_summary' => $solutionSummary,
            'material_used' => $materialUsed,
            'print_time_hours' => $printTimeHours,
            'filament_weight_grams' => $filamentWeight,
            'layer_height_mm' => $layerHeight,
            'infill_percent' => $infillPercent,
            'nozzle_temp_c' => $nozzleTemp,
            'bed_temp_c' => $bedTemp,
            'results_summary' => $resultsSummary,
            'lessons_learned' => $lessonsLearned,
            'image_url' => $imageUrl,
            'is_featured' => $isFeatured,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('create', 'projects', $id, "Added project: $title");
        $this->setFlash('success', 'Project added successfully.');
        $this->redirect('admin/projects');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $projectModel = new Project();
        $project = $projectModel->find((int)$id);

        if (!$project) {
            $this->setFlash('error', 'Project not found.');
            $this->redirect('admin/projects');
            return;
        }

        $this->render('admin.projects.form', [
            'pageTitle' => 'Edit Project: ' . $project['title'],
            'project' => $project
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/projects');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $clientOrg = trim((string)$this->request->input('client_org', 'Technical Training Wing'));
        $category = trim((string)$this->request->input('category', 'Engineering Prototyping'));
        $objective = trim((string)$this->request->input('objective'));
        $problemStatement = trim((string)$this->request->input('problem_statement'));
        $solutionSummary = trim((string)$this->request->input('solution_summary'));
        $materialUsed = trim((string)$this->request->input('material_used'));
        $printTimeHours = (float)$this->request->input('print_time_hours', 0);
        $filamentWeight = (float)$this->request->input('filament_weight_grams', 0);
        $layerHeight = (float)$this->request->input('layer_height_mm', 0.2);
        $infillPercent = (int)$this->request->input('infill_percent', 20);
        $nozzleTemp = (int)$this->request->input('nozzle_temp_c', 210);
        $bedTemp = (int)$this->request->input('bed_temp_c', 60);
        $resultsSummary = trim((string)$this->request->input('results_summary'));
        $lessonsLearned = trim((string)$this->request->input('lessons_learned'));
        $imageUrl = trim((string)$this->request->input('image_url'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;

        $projectModel = new Project();
        $projectModel->update($id, [
            'title' => $title,
            'slug' => $slug,
            'client_org' => $clientOrg,
            'category' => $category,
            'objective' => $objective,
            'problem_statement' => $problemStatement,
            'solution_summary' => $solutionSummary,
            'material_used' => $materialUsed,
            'print_time_hours' => $printTimeHours,
            'filament_weight_grams' => $filamentWeight,
            'layer_height_mm' => $layerHeight,
            'infill_percent' => $infillPercent,
            'nozzle_temp_c' => $nozzleTemp,
            'bed_temp_c' => $bedTemp,
            'results_summary' => $resultsSummary,
            'lessons_learned' => $lessonsLearned,
            'image_url' => $imageUrl,
            'is_featured' => $isFeatured,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('update', 'projects', $id, "Updated project: $title");
        $this->setFlash('success', 'Project updated successfully.');
        $this->redirect('admin/projects');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/projects');
            return;
        }

        $projectModel = new Project();
        $p = $projectModel->find((int)$id);
        if ($p) {
            $projectModel->delete((int)$id);
            Logger::log('delete', 'projects', (int)$id, "Deleted project: {$p['title']}");
            $this->setFlash('success', 'Project deleted.');
        }

        $this->redirect('admin/projects');
    }
}
