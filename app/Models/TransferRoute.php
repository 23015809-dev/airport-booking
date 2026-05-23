<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransferRoute extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'pickup_point',
        'dropoff_point',
        'price',
        'duration_minutes',
        'description',
        'image',
        'status',
        'vehicle_id',
        'driver_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
