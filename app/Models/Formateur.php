<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Formateur extends Model
{
    use HasFactory  , Searchable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tel',
        'address',
        'specialties',
        'qualifications',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
    public function toSearchableArray(){
        return [
            'nom'=> $this->nom,
             'prenom'=> $this->prenom,
             'email'=> $this->email, 
             'tel'=> $this->tel,
             'address'=> $this->address,
             'specialties'=> $this->specialties,
             'qualifications'=> $this->qualifications,
           
            ];
     }
}

