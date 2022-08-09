<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vidange;
use App\Models\Voiture;

class Vidange extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

}
