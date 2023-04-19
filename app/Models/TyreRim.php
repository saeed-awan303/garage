<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyreRim extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tyre_profile()
    {
        return $this->belongsTo(TyreProfile::class,'tyre_profiles_id','id');
    }

    public function tyre_speed()
    {
        return $this->hasMany(TyreSpeed::class,'tyre_rims_id','id');
    }
}
