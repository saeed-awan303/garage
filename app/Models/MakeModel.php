<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MakeModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function makes()
    {
        return $this->belongsTo(Make::class,'make_id','id');
    }

    public function fuels()
    {
        return $this->hasMany(fuelType::class,'model_id','id');
    }

    public function engines()
    {
        return $this->hasMany(EngineCapacity::class,'model_id','id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }
}
