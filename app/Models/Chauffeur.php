<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carnet;
use App\Models\Trajet;

class Chauffeur extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function carnets()
    {
        return $this->hasMany(Carnet::class);
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

}
