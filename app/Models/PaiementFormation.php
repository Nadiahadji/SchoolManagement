<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class PaiementFormation extends Model
{
    use HasFactory , Searchable;

    protected $fillable = [
        'condidat_id',
        'formation_id',
        'montant',
        'date_paiement',
        'methode_paiement',
    ];


    public function condidat()
    {
        return $this->belongsTo(Condidat::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function toSearchableArray()
    {
        return [
            'condidat_id' => $this->condidat, 
            'formation_id' => $this->formation,
            'montant' => $this->montant,
            'date_paiement' => $this->date_paiement,
            'methode_paiement' => $this->methode_paiement,
        ];
    }


 
}
