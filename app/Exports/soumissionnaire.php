<?php

namespace App\Exports;
use App\Models\souscrire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;;
use Illuminate\Support\Facades\DB;

class soumissionnaire implements FromCollection,WithHeadings
{
     protected $id;
     /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Titre offre',
            'Dénomination',
            'Statut Social',
            'Représentant Légal',
            'Fonction du Représentant Légal ',
            'Point focal appel',
            'Contacts',
            'Email de référence',
            'Date et Heure'

        ];
    }


    public function collection()
    {
        $assise = DB::table('souscrires')
        ->where('souscrires.offre_id',$this->id)
        ->join('offres','offres.id','=','souscrires.offre_id')
        ->select('souscrires.id','offres.titre',
            'souscrires.denomination','souscrires.statut_social','souscrires.representant', 'souscrires.fonct_representant',
                'souscrires.point_focal','souscrires.telephone','souscrires.email','souscrires.created_at')
        ->orderBy('souscrires.id','asc')
        ->get();
        return $assise;
    }
}
