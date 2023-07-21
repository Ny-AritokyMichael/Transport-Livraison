<?php

namespace App\Exports;

use App\Models\Trajet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrajetExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'lieuTrajet',
            'typeTrajet',
            'debutKilometrage',
            'arriveKilometrage',
            'dateDepart ',
            'heureDepart',
            'dateArrive',
            'heureArrive',
            'montantCarburant',
            'quantiteCarburant',
            'motif',
            'chauffeur_id',
            'voiture_id'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Trajet::get());
    }
}
