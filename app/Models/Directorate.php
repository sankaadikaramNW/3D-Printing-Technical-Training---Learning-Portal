<?php
namespace App\Models;

use App\Core\Model;

class Directorate extends Model
{
    protected string $table = 'directorates';

    public function findByCode(string $code): ?array
    {
        return $this->findBy('code', strtoupper($code));
    }
}
