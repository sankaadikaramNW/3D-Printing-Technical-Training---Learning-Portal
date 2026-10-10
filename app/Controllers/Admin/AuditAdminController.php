<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\AuditLog;

class AuditAdminController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $this->requireRole('super-admin');

        $auditModel = new AuditLog();
        $logs = $auditModel->all('id DESC', 100);

        $this->render('admin.audit.index', [
            'pageTitle' => 'Security & Action Audit Logs',
            'logs' => $logs
        ], 'admin');
    }
}
