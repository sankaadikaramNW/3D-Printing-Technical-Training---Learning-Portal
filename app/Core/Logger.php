<?php
namespace App\Core;

use PDO;

/**
 * System Audit & Security Logger
 */
class Logger
{
    public static function log(string $action, string $module, ?int $recordId = null, ?string $details = null): void
    {
        try {
            $db = Database::getConnection();
            $user = Auth::user();
            $adminId = $user['id'] ?? null;
            $adminName = $user['full_name'] ?? 'System / Anonymous';
            $ip = (new Request())->ip();

            $stmt = $db->prepare("
                INSERT INTO audit_logs (admin_id, admin_name, action, module, record_id, details, ip_address, created_at)
                VALUES (:admin_id, :admin_name, :action, :module, :record_id, :details, :ip_address, NOW())
            ");
            $stmt->execute([
                'admin_id' => $adminId,
                'admin_name' => $adminName,
                'action' => $action,
                'module' => $module,
                'record_id' => $recordId,
                'details' => $details,
                'ip_address' => $ip
            ]);
        } catch (\Exception $e) {
            // Failsafe: avoid crashing if logging fails
            error_log("Audit log failed: " . $e->getMessage());
        }
    }
}
