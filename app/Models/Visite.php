<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voiture;


class Visite extends Model
{
    use HasFactory;

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
