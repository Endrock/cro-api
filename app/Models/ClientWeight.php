<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientWeight extends Model
{
    public $table = 'client_weights';

    public $fillable = [
        'value'
    ];

    protected $casts = [
        'value' => 'decimal:2'
    ];

    public static array $rules = [
        'value' => 'required'
    ];

    
}
