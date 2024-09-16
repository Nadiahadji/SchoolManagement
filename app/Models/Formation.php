<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Formation extends Model
{
    use HasFactory , Searchable;

    protected $fillable = [
        'nom',
        'description',
        'duree',
        'niveau',
        'cout',
        'formateur_id',
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }



    // public function condidats()
    // {
    //     return $this->belongsToMany(Condidat::class)
    //                 ->withPivot('date_inscription');
    // }

    // public function paiements()
    // {
    //     return $this->hasMany(PaiementFormation::class, 'formation_id');
    // }




    public function paiements()
    {
        return $this->hasMany(PaiementFormation::class, 'formation_id');
    }

    public function condidats()
    {
        return $this->belongsToMany(Condidat::class, 'condidat_formation')
                    ->withPivot('id');
    }
    public function toSearchableArray(){
        return [
       
            'nom'=> $this->nom,
             'description'=> $this->description,
             'duree'=> $this->duree, 
             'niveau'=> $this->niveau,
             'cout'=> $this->cout,
          
            ];
     }
}

