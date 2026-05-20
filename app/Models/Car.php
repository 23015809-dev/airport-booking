<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id', 'car_name', 'license_plate', 'seats'];

    // Khai báo mối quan hệ ngược lại: Một xe thuộc về một tài xế
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
