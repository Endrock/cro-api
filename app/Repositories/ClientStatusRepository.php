<?php

namespace App\Repositories;

use App\Models\ClientStatus;
use App\Repositories\BaseRepository;

class ClientStatusRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'color'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ClientStatus::class;
    }
}
