<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyreProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tyre_width()
    {
        return $this->belongsTo(TyreWidth::class,'tyre_widths_id','id');
    }

    public function tyre_rim()
    {
        return $this->hasMany(TyreRim::class,'tyre_profiles_id','id');
    }
}
