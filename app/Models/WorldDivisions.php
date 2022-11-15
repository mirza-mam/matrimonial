<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldDivisions extends Model
{
    use HasFactory;
    protected $table="world_divisions";
    protected $primary_key="id";

    public function world_countries()
    {
        return $this->belongsTo('\App\Models\WorldCountries','country_id','id');
    }
}
