<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Helper;
use App\Core\Logger;
use App\Models\TroubleshootingIssue;

class TroubleshootingAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $troubleModel = new TroubleshootingIssue();
        $issues = $troubleModel->all('sort_order ASC, category ASC');

        $this->render('admin.troubleshooting.index', [
            'pageTitle' => 'Manage Troubleshooting Matrix',
            'issues' => $issues
        ], 'admin');
    }

    public function create(): void
    {
        $this->requireAuth();
        $this->render('admin.troubleshooting.form', [
            'pageTitle' => 'Add Diagnostic Issue',
            'issue' => null
        ], 'admin');
    }

    public function store(): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/troubleshooting');
            return;
        }

        $title = trim((string)$this->request->input('title'));
        $slug = Helper::slugify($title);
        $category = $this->request->input('category');
        $severity = $this->request->input('severity', 'Medium');
        $symptom = trim((string)$this->request->input('symptom'));
        $likelyCauses = trim((string)$this->request->input('likely_causes'));
        $inspectionSteps = trim((string)$this->request->input('inspection_steps'));
        $correctiveActions = trim((string)$this->request->input('corrective_actions'));
        $preventionGuidelines = trim((string)$this->request->input('prevention_guidelines'));
        $imageUrl = trim((string)$this->request->input('image_url'));

        $troubleModel = new TroubleshootingIssue();
        $id = $troubleModel->create([
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'severity' => $severity,
            'symptom' => $symptom,
            'likely_causes' => $likelyCauses,
            'inspection_steps' => $inspectionSteps,
            'corrective_actions' => $correctiveActions,
            'prevention_guidelines' => $preventionGuidelines,
            'image_url' => $imageUrl,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('create', 'troubleshooting', $id, "Added troubleshooting issue: $title");
        $this->setFlash('success', 'Diagnostic issue added.');
        $this->redirect('admin/troubleshooting');
    }

    public function edit(string $id): void
    {
        $this->requireAuth();
        $troubleModel = new TroubleshootingIssue();
        $issue = $troubleModel->find((int)$id);

        if (!$issue) {
            $this->setFlash('error', 'Issue not found.');
            $this->redirect('admin/troubleshooting');
            return;
        }

        $this->render('admin.troubleshooting.form', [
            'pageTitle' => 'Edit Diagnostic Issue',
            'issue' => $issue
        ], 'admin');
    }

    public function update(string $id): void
    {
        $this->requireAuth();
        if (!$this->validateCsrf()) {
            $this->redirect('admin/troubleshooting');
            return;
        }

        $id = (int)$id;
        $title = trim((string)$this->request->input('title'));
        $slug = trim((string)$this->request->input('slug')) ?: Helper::slugify($title);
        $category = $this->request->input('category');
        $severity = $this->request->input('severity', 'Medium');
        $symptom = trim((string)$this->request->input('symptom'));
        $likelyCauses = trim((string)$this->request->input('likely_causes'));
        $inspectionSteps = trim((string)$this->request->input('inspection_steps'));
        $correctiveActions = trim((string)$this->request->input('corrective_actions'));
        $preventionGuidelines = trim((string)$this->request->input('prevention_guidelines'));
        $imageUrl = trim((string)$this->request->input('image_url'));

        $troubleModel = new TroubleshootingIssue();
        $troubleModel->update($id, [
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'severity' => $severity,
            'symptom' => $symptom,
            'likely_causes' => $likelyCauses,
            'inspection_steps' => $inspectionSteps,
            'corrective_actions' => $correctiveActions,
            'prevention_guidelines' => $preventionGuidelines,
            'image_url' => $imageUrl,
            'sort_order' => (int)$this->request->input('sort_order', 0)
        ]);

        Logger::log('update', 'troubleshooting', $id, "Updated troubleshooting issue: $title");
        $this->setFlash('success', 'Diagnostic issue updated.');
        $this->redirect('admin/troubleshooting');
    }

    public function delete(string $id): void
    {
        $this->requireAuth();
        if ($this->request->isPost() && !$this->validateCsrf()) {
            $this->redirect('admin/troubleshooting');
            return;
        }

        $troubleModel = new TroubleshootingIssue();
        $item = $troubleModel->find((int)$id);
        if ($item) {
            $troubleModel->delete((int)$id);
            Logger::log('delete', 'troubleshooting', (int)$id, "Deleted issue: {$item['title']}");
            $this->setFlash('success', 'Issue deleted.');
        }

        $this->redirect('admin/troubleshooting');
    }
}
