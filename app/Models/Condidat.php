<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Condidat extends Model
{
    use HasFactory, Searchable;
     protected $fillable = [
        'nom',
        'prenom',
        'date_inscription',
        'tel',
        'niv',
        'date_naissance',
        'adresse',
    ];

    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'paiement_formations')
                    ->withPivot('montant_verse'); // Assurez-vous que 'montant_verse' est une colonne dans la table pivot
    }
    
    public function formationsGrouped()
    {
        return $this->formations->groupBy('id');
    }

    public function paiements()
    {
        return $this->hasMany(PaiementFormation::class);
    }

    public function montantVerseParFormation($formationId)
    {
        return $this->paiements->where('formation_id', $formationId)->sum('montant');
    }
    
    public function montantRestant($formationId)
    {
        $formation = Formation::find($formationId);
        return $formation ? $formation->cout - $this->montantVerseParFormation($formationId) : 0;
    }





  
    public function toSearchableArray()
    {
        return [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_inscription' => $this->date_inscription,
            'tel' => $this->tel,
            'niv' => $this->niv,
            'date_naissance' => $this->date_naissance,
            'adresse' => $this->adresse,
        ];
    }
}
