<?php
namespace App\Models;

use App\Core\Model;

class TroubleshootingIssue extends Model
{
    protected string $table = 'troubleshooting_issues';

    public function getByCategory(): array
    {
        $all = $this->all('sort_order ASC, title ASC');
        $grouped = [];
        foreach ($all as $item) {
            $grouped[$item['category']][] = $item;
        }
        return $grouped;
    }
}
