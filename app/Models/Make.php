<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Make extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function models()
    {
        return $this->hasMany(MakeModel::class,'make_id','id');
    }


    protected static function boot() {
        parent::boot();

        static::creating(function ($make) {
            $make->slug = Str::slug($make->title);
        });
    }
}
