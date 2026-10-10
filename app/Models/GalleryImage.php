<?php
namespace App\Models;

use App\Core\Model;

class GalleryImage extends Model
{
    protected string $table = 'gallery_images';

    public function getByCategory(): array
    {
        $all = $this->all('sort_order ASC, id DESC');
        $grouped = [];
        foreach ($all as $item) {
            $grouped[$item['category']][] = $item;
        }
        return $grouped;
    }
}
