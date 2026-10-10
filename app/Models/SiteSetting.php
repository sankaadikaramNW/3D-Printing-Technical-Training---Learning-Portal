<?php
namespace App\Models;

use App\Core\Model;

class SiteSetting extends Model
{
    protected string $table = 'site_settings';

    public function getAllKeyValues(): array
    {
        $all = $this->all('setting_group ASC, id ASC');
        $map = [];
        foreach ($all as $item) {
            $map[$item['setting_key']] = $item['setting_value'];
        }
        return $map;
    }
}
