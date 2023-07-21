<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voiture;

class Assurance extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public static function fn($assurance){
            date_default_timezone_set('Africa/Nairobi');
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $date = "'".$year."-".$month."-".$day."'";

            $date = $assurance;
            $date = explode('-', $date);
            $annee= ($date[0]-$year)*365;
             $mois = ($date[1]-$month)*30;
             $jour =  $date[2]-$day;
            $total = $annee + $mois + $jour;

            return $total;
    }

    // public function couleur($assurance){
    //     if($assurance =< 10){

    //     }
    // }

}
