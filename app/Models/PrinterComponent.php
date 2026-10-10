<?php
namespace App\Models;

use App\Core\Model;

class PrinterComponent extends Model
{
    protected string $table = 'printer_components';

    public function getByCategory(): array
    {
        $all = $this->all('sort_order ASC, name ASC');
        $grouped = [];
        foreach ($all as $item) {
            $grouped[$item['category']][] = $item;
        }
        return $grouped;
    }
}
