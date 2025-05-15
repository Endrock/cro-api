<?php

namespace App\Repositories;

use App\Models\ClientWeight;
use App\Repositories\BaseRepository;

class ClientWeightRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'value'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ClientWeight::class;
    }
}
