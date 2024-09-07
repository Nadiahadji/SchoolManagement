<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id',
        'montant',
        'date_versement',
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
