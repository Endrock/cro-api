<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public $table = 'sites';

    public $fillable = [
        'client_id',
        'url'
    ];

    protected $casts = [
        'client_id' => 'integer',
        'url' => 'string'
    ];

    public static array $rules = [
        'client_id' => 'required',
        'url' => 'required|url'
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
