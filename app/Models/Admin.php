<?php
namespace App\Models;

use App\Core\Model;

class Admin extends Model
{
    protected string $table = 'admins';

    public function getAllWithRole(): array
    {
        $sql = "
            SELECT a.*, r.name as role_name, r.slug as role_slug 
            FROM admins a 
            JOIN roles r ON a.role_id = r.id 
            ORDER BY a.id ASC
        ";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
