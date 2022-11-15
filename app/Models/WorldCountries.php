<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldCountries extends Model
{
    use HasFactory;
    protected $table="world_countries";
    protected $primary_key="id";
    
    public function world_divisions()
    {
        return $this->hasMany('\App\Models\WorldDivisions','country_id','id');
    }

}
