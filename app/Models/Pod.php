<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
    public $table = 'pods';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    /**
     * Relación muchos a muchos con User.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'pod_user', 'pod_id', 'user_id')
                    ->withTimestamps();
    }
}
