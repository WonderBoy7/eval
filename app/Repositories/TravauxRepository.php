<?php

namespace App\Repositories;

use App\Models\Travaux;
use App\Repositories\BaseRepository;

class TravauxRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom',
        'nbr_pers'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Travaux::class;
    }
}
