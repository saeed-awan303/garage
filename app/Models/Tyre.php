<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tyre_width()
    {
        return $this->hasMany(TyreWidth::class,'tyre_id','id');
    }
}
