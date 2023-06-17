<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function make()
    {
        return $this->belongsTo(Make::class);
    }
    public function model()
    {
        return $this->belongsTo(MakeModel::class);
    }
    public function fuelType()
    {
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }
}
