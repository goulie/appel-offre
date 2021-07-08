<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class souscrire extends Model
{
    use HasFactory;
    protected $fillable = [	'denomination','statut_social','representant',
    						'fonct_representant','point_focal','telephone','email','offre_id'];
    protected $table = 'souscrires';

    public function offre()
    {
    return $this->belongsTo(offre::class);

    }

}
