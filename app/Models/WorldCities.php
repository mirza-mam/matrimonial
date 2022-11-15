<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldCities extends Model
{
    use HasFactory;
    protected $table="world_cities";
    protected $primary_key="id";
    
    public function world_countries()
    {
        return $this->world_divisions->world_countries;
    }
    public function world_divisions()
    {
        return $this->belongsTo('\App\Models\WorldDivisions','division_id','id');
    }

}
