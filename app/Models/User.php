<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'team_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación con Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relación con Team.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
