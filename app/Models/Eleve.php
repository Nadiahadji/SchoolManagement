<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Eleve extends Model
{
    use HasFactory , Searchable;
    protected $fillable=[
        'nom',
        'prenom',
        'date_inscription', 
        'tel',
        'tel_parent',
        'niv',
        'date_naissance',
        'offre',
        'versement',
        'reste',
        'adresse',
       
    ];
    public function versements()
    {
        return $this->hasMany(Versement::class);
    }
    // public function getStatutAttribute()
    // {
    //     if ($this->offre > $this->reste) {
    //         return 'En solde';
    //     } elseif ($this->offre == $this->reste) {
    //         return 'À jour';
    //     } else {
    //         return 'En retard';
    //     }
    // }

    public function toSearchableArray(){
        return [
            'nom'=> $this->nom,
             'prenom'=> $this->prenom,
             'date_inscription'=> $this->date_inscription, 
             'tel'=> $this->tel,
             'tel_parent'=> $this->tel_parent,
             'niv'=> $this->niv,
             'date_naissance'=> $this->date_naissance,
             'offre'=> $this->offre,
             'versement'=> $this->versement,
             'reste'=> $this->reste,
             'adresse'=> $this->adresse,
            ];
     }

}
