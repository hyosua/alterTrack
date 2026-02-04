<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternance extends Model
{
    use HasFactory;
    protected $table = 'alternances';
    protected $fillable = [
        'entreprise_id',
        'nom_etudiant',
        'prenom_etudiant',
        'mois_annee',
        'duree',
        'descriptif',
        'prof_referent',
        'qualite_travail',
        'technos',
        'type',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
