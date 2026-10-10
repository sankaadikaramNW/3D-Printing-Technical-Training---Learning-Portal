<?php
namespace App\Models;

use App\Core\Model;

class PrinterSpecification extends Model
{
    protected string $table = 'printer_specifications';

    public function getGroupedByCategory(): array
    {
        $specs = $this->all('sort_order ASC, id ASC');
        $grouped = [];
        foreach ($specs as $s) {
            $grouped[$s['category']][] = $s;
        }
        return $grouped;
    }
}
