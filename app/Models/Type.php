<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voiture;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}
