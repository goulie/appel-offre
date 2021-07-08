<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offre extends Model
{
    use HasFactory;
    protected $table = 'offres';
    protected $fillable =['titre','alias','date_limite','fichier','details','date_publication'];

    public function souscrire()
    {
        return $this->hasMany(souscrire::class);
    }
}
