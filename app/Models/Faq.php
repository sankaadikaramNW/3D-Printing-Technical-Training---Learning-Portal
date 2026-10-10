<?php
namespace App\Models;

use App\Core\Model;

class Faq extends Model
{
    protected string $table = 'faqs';

    public function getGroupedByCategory(): array
    {
        $faqs = $this->where(['is_published' => 1], 'category ASC, sort_order ASC');
        $grouped = [];
        foreach ($faqs as $f) {
            $grouped[$f['category']][] = $f;
        }
        return $grouped;
    }
}
