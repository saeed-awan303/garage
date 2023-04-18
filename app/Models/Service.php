<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(Category::class,'service_id','id');
    }



    protected static function boot() {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = Str::slug($service->title);
        });
    }
}
