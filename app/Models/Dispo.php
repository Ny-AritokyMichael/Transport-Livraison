<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voiture;

class Dispo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function voitures()
    {
        return $this->belongsTo(Voiture::class);
    }
}
