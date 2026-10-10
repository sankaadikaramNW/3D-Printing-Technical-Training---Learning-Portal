<?php
namespace App\Models;

use App\Core\Model;

class PrinterPart extends Model
{
    protected string $table = 'printer_parts';

    public function getByCategory(): array
    {
        $all = $this->all('sort_order ASC, id ASC');
        $grouped = [];
        foreach ($all as $item) {
            $grouped[$item['category']][] = $item;
        }
        return $grouped;
    }
}
