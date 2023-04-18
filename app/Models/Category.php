<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id','id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });
    }
}
