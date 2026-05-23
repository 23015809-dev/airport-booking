<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'license_number',
        'status',
    ];

    public function transferRoutes()
    {
        return $this->hasMany(TransferRoute::class);
    }
}
