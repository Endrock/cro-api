<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'github_username'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Profile::class;
    }
}
