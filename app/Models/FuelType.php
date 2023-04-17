<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FuelType extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static function boot() {
        parent::boot();

        static::creating(function ($fueltype) {
            $fueltype->slug = Str::slug($fueltype->title);
        });
    }
}
