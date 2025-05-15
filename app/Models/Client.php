<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'client_status_id',
        'client_weight_id',
        'account_manager_id',
    ];

    public static array $rules = [
        'name' => 'required|string|max:255',
        'status' => 'nullable|in:red,green,orange,blue,pause',
        'account_manager_id' => 'nullable|exists:users,id',
        'client_status_id' => 'nullable|exists:client_statuses,id',
        'client_weight_id' => 'nullable|exists:client_weights,id',
        'primary_site_url' => 'nullable|url',
    ];

    /**
     * Relación con el estado del cliente (leyenda).
     */
    public function status()
    {
        return $this->belongsTo(ClientStatus::class, 'client_status_id');
    }

    /**
     * Relación con el peso del cliente.
     */
    public function weight()
    {
        return $this->belongsTo(ClientWeight::class, 'client_weight_id');
    }

    /**
     * Relación con el Account Manager (User).
     */
    public function accountManager()
    {
        return $this->belongsTo(User::class, 'account_manager_id');
    }

    /**
     * Relación con los sitios del cliente.
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    /**
     * Relación con los pods asociados (muchos a muchos).
     */
    public function pods()
    {
        return $this->belongsToMany(Pod::class, 'pod_client', 'client_id', 'pod_id')
                    ->withTimestamps();
    }
}
