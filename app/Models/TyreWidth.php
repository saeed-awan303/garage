<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyreWidth extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tyre()
    {
        return $this->BelongsTo(Tyre::class,'tyre_id','id');
    }
    
    public function tyre_profile()
    {
        return $this->hasMany(TyreProfile::class,'tyre_widths_id','id');
    }
}
