<?php
namespace App\Models;

use App\Core\Model;

class AuditLog extends Model
{
    protected string $table = 'audit_logs';

    public function getRecent(int $limit = 50): array
    {
        return $this->all('id DESC', $limit);
    }
}
