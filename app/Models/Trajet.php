<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;


class Trajet extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "trajets";

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public static function get(){
        return DB::table('trajets')
        ->select('id')
        ->get();
    }
}
