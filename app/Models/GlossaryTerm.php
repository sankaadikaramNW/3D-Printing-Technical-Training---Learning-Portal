<?php
namespace App\Models;

use App\Core\Model;

class GlossaryTerm extends Model
{
    protected string $table = 'glossary_terms';

    public function getGroupedByLetter(): array
    {
        $terms = $this->all('letter ASC, term ASC');
        $grouped = [];
        foreach ($terms as $t) {
            $grouped[$t['letter']][] = $t;
        }
        return $grouped;
    }
}
