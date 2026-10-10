<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\PrinterComponent;

class ComponentAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $componentModel = new PrinterComponent();
        $components = $componentModel->all('sort_order ASC, category ASC');

        $this->render('admin.components.index', [
            'pageTitle' => 'Manage Printer Components',
            'components' => $components
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.components.form', [
            'pageTitle' => 'Add Printer Component',
            'component' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/components');
            return;
        }

        $name = trim((string)$this->request->input('name'));
        $category = $this->request->input('category');
        $slug = Helper::slugify($name);
        $subtitle = trim((string)$this->request->input('subtitle'));
        $workingPrinciple = trim((string)$this->request->input('working_principle'));
        $functionDescription = trim((string)$this->request->input('function_description'));
        $technicalSpecs = trim((string)$this->request->input('technical_specs'));
        $commonProblems = trim((string)$this->request->input('common_problems'));
        $maintenanceTips = trim((string)$this->request->input('maintenance_tips'));
        $safetyNotes = trim((string)$this->request->input('safety_notes'));
        $imageUrl = trim((string)$this->request->input('image_url', 'assets/images/components/hotend.jpg'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;
        $sortOrder = (int)$this->request->input('sort_order', 0);

        $componentModel = new PrinterComponent();
        $id = $componentModel->create([
            'category' => $category,
            'name' => $name,
            'slug' => $slug,
            'subtitle' => $subtitle,
            'working_principle' => $workingPrinciple,
            'function_description' => $functionDescription,
            'technical_specs' => $technicalSpecs,
            'common_problems' => $commonProblems,
            'maintenance_tips' => $maintenanceTips,
            'safety_notes' => $safetyNotes,
            'image_url' => $imageUrl,
            'is_featured' => $isFeatured,
            'sort_order' => $sortOrder
        ]);

        Logger::log('create', 'printer_components', $id, "Added component: $name");
        $this->setFlash('success', 'Component added successfully.');
        $this->redirect('admin/components');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $componentModel = new PrinterComponent();
        $component = $componentModel->find((int)$id);

        if (!$component) {
            $this->setFlash('error', 'Component not found.');
            $this->redirect('admin/components');
            return;
        }

        $this->render('admin.components.form', [
            'pageTitle' => 'Edit Component: ' . $component['name'],
            'component' => $component
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/components');
            return;
        }

        $id = (int)$id;
        $name = trim((string)$this->request->input('name'));
        $category = $this->request->input('category');
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($name);
        $subtitle = trim((string)$this->request->input('subtitle'));
        $workingPrinciple = trim((string)$this->request->input('working_principle'));
        $functionDescription = trim((string)$this->request->input('function_description'));
        $technicalSpecs = trim((string)$this->request->input('technical_specs'));
        $commonProblems = trim((string)$this->request->input('common_problems'));
        $maintenanceTips = trim((string)$this->request->input('maintenance_tips'));
        $safetyNotes = trim((string)$this->request->input('safety_notes'));
        $imageUrl = trim((string)$this->request->input('image_url'));
        $isFeatured = $this->request->input('is_featured') ? 1 : 0;
        $sortOrder = (int)$this->request->input('sort_order', 0);

        $componentModel = new PrinterComponent();
        $componentModel->update($id, [
            'category' => $category,
            'name' => $name,
            'slug' => $slug,
            'subtitle' => $subtitle,
            'working_principle' => $workingPrinciple,
            'function_description' => $functionDescription,
            'technical_specs' => $technicalSpecs,
            'common_problems' => $commonProblems,
            'maintenance_tips' => $maintenanceTips,
            'safety_notes' => $safetyNotes,
            'image_url' => $imageUrl,
            'is_featured' => $isFeatured,
            'sort_order' => $sortOrder
        ]);

        Logger::log('update', 'printer_components', $id, "Updated component: $name");
        $this->setFlash('success', 'Component updated successfully.');
        $this->redirect('admin/components');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/components');
            return;
        }

        $componentModel = new PrinterComponent();
        $comp = $componentModel->find((int)$id);
        if ($comp) {
            $componentModel->delete((int)$id);
            Logger::log('delete', 'printer_components', (int)$id, "Deleted component: {$comp['name']}");
            $this->setFlash('success', 'Component deleted.');
        }

        $this->redirect('admin/components');
    }
}
