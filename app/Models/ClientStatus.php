<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientStatus extends Model
{
    public $table = 'client_statuses';

    public $fillable = [
        'name',
        'description',
        'color'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'color' => 'string'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    
}
