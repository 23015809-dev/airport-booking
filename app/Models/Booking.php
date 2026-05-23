<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'transfer_route_id',
        'passenger_name',
        'passenger_phone',
        'pickup_time',
        'num_passengers',
        'total_price',
        'note',
        'status',
    ];

    protected $casts = [
        'pickup_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transferRoute()
    {
        return $this->belongsTo(TransferRoute::class);
    }
}
