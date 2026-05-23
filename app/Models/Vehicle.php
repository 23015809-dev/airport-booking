<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'license_plate',
        'seats',
        'image',
        'status',
    ];

    public function transferRoutes()
    {
        return $this->hasMany(TransferRoute::class);
    }
}
