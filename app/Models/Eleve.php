<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'prenom',
        'date_inscription', 
        'tel',
        'tel_parent',
        'niv',
        'date_naissance',
        'offre',
        // 'versement',
        // 'reste',
       
    ];
    public function versements()
    {
        return $this->hasMany(Versement::class);
    }
}
