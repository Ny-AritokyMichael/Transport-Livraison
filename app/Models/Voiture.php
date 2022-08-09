<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Carnet;
use App\Models\Assurance;
use App\Models\VisiteTechnique;
use App\Models\Visite;
use App\Models\Vidange;
use App\Models\Pneu;
use App\Models\Dispo;
use App\Models\Trajet;


class Voiture extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function carnets()
    {
        return $this->hasMany(Carnet::class);
    }

    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }


    public function visiteTechniques()
    {
        return $this->hasMany(VisiteTechnique::class);
    }

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }

    public function vidanges()
    {
        return $this->hasMany(Vidange::class);
    }

    public function pneus()
    {
        return $this->hasMany(Pneu::class);
    }

    public function dispos()
    {
        return $this->hasMany(Dispo::class);
    }

}
