<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Logger;
use App\Models\SiteSetting;
use App\Models\PrinterSpecification;

class SettingAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');

        $settingModel = new SiteSetting();
        $settings = $settingModel->all('setting_group ASC, id ASC');

        $this->render('admin.settings.index', [
            'pageTitle' => 'General Portal & Institutional Settings',
            'settings' => $settings
        ], 'admin');
    }

    public function updateSettings(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');
        if (!$this->validateCsrf()) {
            $this->redirect('admin/settings');
            return;
        }

        $submitted = $this->request->all();
        $settingModel = new SiteSetting();

        foreach ($submitted as $key => $value) {
            if (strpos($key, 'setting_') === 0) {
                $settingKey = substr($key, 8);
                $existing = $settingModel->findBy('setting_key', $settingKey);
                if ($existing) {
                    $settingModel->update((int)$existing['id'], [
                        'setting_value' => (string)$value
                    ]);
                }
            }
        }

        Logger::log('update', 'settings', null, "Updated portal site settings");
        $this->setFlash('success', 'Portal settings updated successfully.');
        $this->redirect('admin/settings');
    }

    public function printerSpecs(): void
    {
        $this->requireAuth();
        $specModel = new PrinterSpecification();
        $specs = $specModel->all('sort_order ASC, id ASC');

        $this->render('admin.settings.printer_specs', [
            'pageTitle' => 'FDM Printer Module Technical Specifications',
            'specs' => $specs
        ], 'admin');
    }

    public function updateSpecs(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin', 'content-admin');
        if (!$this->validateCsrf()) {
            $this->redirect('admin/settings/printer-specs');
            return;
        }

        $specModel = new PrinterSpecification();
        $specValues = $this->request->input('spec_values', []);

        foreach ($specValues as $id => $val) {
            $specId = (int)$id;
            $specModel->update($specId, [
                'spec_value' => trim((string)$val)
            ]);
        }

        Logger::log('update', 'printer_specifications', null, "Updated printer technical specifications");
        $this->setFlash('success', 'Printer technical specifications updated successfully.');
        $this->redirect('admin/settings/printer-specs');
    }
}
