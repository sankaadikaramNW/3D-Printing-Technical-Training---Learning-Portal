<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\PrintingMaterial;

class MaterialAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $materialModel = new PrintingMaterial();
        $materials = $materialModel->all('sort_order ASC');

        $this->render('admin.materials.index', [
            'pageTitle' => 'Manage 3D Printing Materials',
            'materials' => $materials
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.materials.form', [
            'pageTitle' => 'Add Printing Material',
            'material' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/materials');
            return;
        }

        $name = trim((string)$this->request->input('name'));
        $code = trim((string)$this->request->input('code'));
        $slug = Helper::slugify($name);
        $materialType = trim((string)$this->request->input('material_type'));
        $description = trim((string)$this->request->input('description'));
        $printTempNozzle = trim((string)$this->request->input('print_temp_nozzle'));
        $printTempBed = trim((string)$this->request->input('print_temp_bed'));
        $printSpeed = trim((string)$this->request->input('print_speed'));
        $bedAdhesion = trim((string)$this->request->input('bed_adhesion'));
        $coolingFan = trim((string)$this->request->input('cooling_fan'));
        $tensileStrength = trim((string)$this->request->input('tensile_strength'));
        $density = trim((string)$this->request->input('density'));
        $flexuralModulus = trim((string)$this->request->input('flexural_modulus'));
        $pros = trim((string)$this->request->input('pros'));
        $cons = trim((string)$this->request->input('cons'));
        $applications = trim((string)$this->request->input('applications'));
        $storageNotes = trim((string)$this->request->input('storage_notes'));
        $safetyNotes = trim((string)$this->request->input('safety_notes'));

        $materialModel = new PrintingMaterial();
        $id = $materialModel->create([
            'name' => $name,
            'slug' => $slug,
            'code' => $code,
            'material_type' => $materialType,
            'description' => $description,
            'print_temp_nozzle' => $printTempNozzle,
            'print_temp_bed' => $printTempBed,
            'print_speed' => $printSpeed,
            'bed_adhesion' => $bedAdhesion,
            'cooling_fan' => $coolingFan,
            'tensile_strength' => $tensileStrength,
            'density' => $density,
            'flexural_modulus' => $flexuralModulus,
            'pros' => $pros,
            'cons' => $cons,
            'applications' => $applications,
            'storage_notes' => $storageNotes,
            'safety_notes' => $safetyNotes,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('create', 'printing_materials', $id, "Added material: $name");
        $this->setFlash('success', 'Material added successfully.');
        $this->redirect('admin/materials');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $materialModel = new PrintingMaterial();
        $material = $materialModel->find((int)$id);

        if (!$material) {
            $this->setFlash('error', 'Material not found.');
            $this->redirect('admin/materials');
            return;
        }

        $this->render('admin.materials.form', [
            'pageTitle' => 'Edit Material: ' . $material['name'],
            'material' => $material
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/materials');
            return;
        }

        $id = (int)$id;
        $name = trim((string)$this->request->input('name'));
        $code = trim((string)$this->request->input('code'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($name);
        $materialType = trim((string)$this->request->input('material_type'));
        $description = trim((string)$this->request->input('description'));
        $printTempNozzle = trim((string)$this->request->input('print_temp_nozzle'));
        $printTempBed = trim((string)$this->request->input('print_temp_bed'));
        $printSpeed = trim((string)$this->request->input('print_speed'));
        $bedAdhesion = trim((string)$this->request->input('bed_adhesion'));
        $coolingFan = trim((string)$this->request->input('cooling_fan'));
        $tensileStrength = trim((string)$this->request->input('tensile_strength'));
        $density = trim((string)$this->request->input('density'));
        $flexuralModulus = trim((string)$this->request->input('flexural_modulus'));
        $pros = trim((string)$this->request->input('pros'));
        $cons = trim((string)$this->request->input('cons'));
        $applications = trim((string)$this->request->input('applications'));
        $storageNotes = trim((string)$this->request->input('storage_notes'));
        $safetyNotes = trim((string)$this->request->input('safety_notes'));

        $materialModel = new PrintingMaterial();
        $materialModel->update($id, [
            'name' => $name,
            'slug' => $slug,
            'code' => $code,
            'material_type' => $materialType,
            'description' => $description,
            'print_temp_nozzle' => $printTempNozzle,
            'print_temp_bed' => $printTempBed,
            'print_speed' => $printSpeed,
            'bed_adhesion' => $bedAdhesion,
            'cooling_fan' => $coolingFan,
            'tensile_strength' => $tensileStrength,
            'density' => $density,
            'flexural_modulus' => $flexuralModulus,
            'pros' => $pros,
            'cons' => $cons,
            'applications' => $applications,
            'storage_notes' => $storageNotes,
            'safety_notes' => $safetyNotes,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('update', 'printing_materials', $id, "Updated material: $name");
        $this->setFlash('success', 'Material updated.');
        $this->redirect('admin/materials');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/materials');
            return;
        }

        $materialModel = new PrintingMaterial();
        $mat = $materialModel->find((int)$id);
        if ($mat) {
            $materialModel->delete((int)$id);
            Logger::log('delete', 'printing_materials', (int)$id, "Deleted material: {$mat['name']}");
            $this->setFlash('success', 'Material deleted.');
        }

        $this->redirect('admin/materials');
    }
}
