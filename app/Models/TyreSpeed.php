<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyreSpeed extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tyre_rim()
    {
        return $this->belongsTo(TyreRim::class,'tyre_rims_id','id');
    }
}
