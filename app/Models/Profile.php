<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $table = 'profiles';

    public $fillable = [
        'user_id',
        'github_username'
    ];

    protected $casts = [
        'github_username' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
