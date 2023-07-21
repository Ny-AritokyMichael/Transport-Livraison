<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Chauffeur;
use App\Models\Voiture;

class Carnet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

}
