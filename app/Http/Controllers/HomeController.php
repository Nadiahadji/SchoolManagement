<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Eleve;
use App\Models\Condidat;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Achat;
use App\Models\PaiementFormation; // Importer le modèle PaiementFormation

class HomeController extends Controller
{
    public function index()
    {
        $aujourdhui = Carbon::today()->format('Y-m-d');
        $eleves = Eleve::whereDate('date_inscription', $aujourdhui)->get();
        $nbrEleves = Eleve::count();
        $nbrcondidats = Condidat::count();
        $nbrformateurs = Formateur::count();
        $nbrFormations = Formation::count();

        // Récupérer les dépenses mensuelles
        $depensesParMois = Achat::selectRaw('SUM(montant) as total, DATE_FORMAT(date_achat, "%Y-%m") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Récupérer les gains mensuels
        $gainsParMois = PaiementFormation::selectRaw('SUM(montant) as total, DATE_FORMAT(date_paiement, "%Y-%m") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Formater les données pour le graphique
        $mois = $depensesParMois->pluck('mois');
        $depensesTotaux = $depensesParMois->pluck('total');
        $gainsTotaux = $gainsParMois->pluck('total');

        // Récupérer les nombres d'élèves et de candidats inscrits par mois
        $elevesParMois = Eleve::selectRaw('COUNT(*) as total, DATE_FORMAT(date_inscription, "%Y-%m") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        $candidatsParMois = Condidat::selectRaw('COUNT(*) as total, DATE_FORMAT(date_inscription, "%Y-%m") as mois')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        // Formater les données pour les graphiques
        $elevesCounts = $elevesParMois->pluck('total');
        $candidatsCounts = $candidatsParMois->pluck('total');

        return view('dashboard', compact(
            'eleves', 
            'nbrEleves', 
            'nbrcondidats', 
            'nbrformateurs', 
            'nbrFormations', 
            'mois', 
            'depensesTotaux', 
            'gainsTotaux', 
            'elevesCounts', 
            'candidatsCounts'
        ));
    }
}
