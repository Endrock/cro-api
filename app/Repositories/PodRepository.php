<?php

namespace App\Repositories;

use App\Models\Pod;
use App\Repositories\BaseRepository;

class PodRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Pod::class;
    }
}
