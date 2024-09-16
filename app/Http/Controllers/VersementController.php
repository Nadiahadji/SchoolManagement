<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versement;
use App\Models\Eleve;
use Carbon\Carbon;

class VersementController extends Controller
{
    // VersementController.php
// public function store(Request $request, $id)
// {
//     $request->validate([
//         'montant' => 'required|numeric',
//         'date_versement' => 'required|date',
//     ]);

//     try {
//         // Trouver l'élève par ID
//         $eleve = Eleve::findOrFail($id);

//         // Créer un nouveau versement
//         $versement = new Versement();
//         $versement->montant = $request->input('montant');
//         $versement->date_versement = $request->input('date_versement');
//         $versement->eleve_id = $eleve->id;
//         $versement->save();

//         // Mettre à jour l'élève
//         $eleve->versement += $versement->montant;
//         $eleve->reste -= $versement->montant;
//         $eleve->save();

//         return redirect()->route('eleves.index')->with('success', 'Versement est ajoutée avec succès.');
//     } catch (\Exception $e) {
//         // Enregistrer l'erreur dans les logs
//         \Log::error($e->getMessage());
//         return redirect()->route('eleves.index')->with('error', 'Versement est ajoutée avec succès.');


//         // return response()->json(['success' => false, 'message' => 'Erreur lors de l\'ajout du versement.'], 500);
//     }
// }


public function store(Request $request, $id)
{
    $request->validate([
        'montant' => 'required|numeric',
        'date_versement' => 'required|date',
    ]);

    try {
        // Trouver l'élève par ID
        $eleve = Eleve::findOrFail($id);

        // Créer un nouveau versement
        $versement = new Versement();
        $versement->montant = $request->input('montant');
        $versement->date_versement = Carbon::parse($request->input('date_versement'))->format('Y-m-d');
        $versement->eleve_id = $eleve->id;
        $versement->save();

        // Recalculer le reste
        $totalVersements = $eleve->versements->sum('montant');
        $eleve->reste = $eleve->offre - $totalVersements;
        $eleve->save();

        return redirect()->route('eleves.show', $eleve->id)->with('success', 'Versement ajouté avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('eleves.show', $eleve->id)->with('error', 'Erreur lors de l\'ajout du versement.');
    }
}

public function edit($id)
{
    $versement = Versement::findOrFail($id);
    return view('versementsEleve.edit', compact('versement'));
}



public function updateVer(Request $request, $id)
{
    $request->validate([
        'montant' => 'required|numeric',
        'date_versement' => 'required|date',
    ]);

    try {
        // Trouver le versement par ID
        $versement = Versement::findOrFail($id);
        $eleve = $versement->eleve;

        // Mettre à jour le versement
        $versement->montant = $request->input('montant');
        $versement->date_versement = Carbon::parse($request->input('date_versement'))->format('Y-m-d');
        $versement->save();

        // Recalculer le reste
        $totalVersements = $eleve->versements->sum('montant');
        $eleve->reste = $eleve->offre - $totalVersements;
        $eleve->save();

        return redirect()->route('eleves.show', $eleve->id)->with('success', 'Versement mis à jour avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('eleves.show', $eleve->id)->with('error', 'Erreur lors de la mise à jour du versement.');
    }
}

public function destroyVer($id)
{
    try {
        // Trouver le versement par ID
        $versement = Versement::findOrFail($id);
        $eleve = $versement->eleve;

        // Supprimer le versement
        $versement->delete();

        // Recalculer le reste
        $totalVersements = $eleve->versements->sum('montant');
        $eleve->reste = $eleve->offre - $totalVersements;
        $eleve->save();

        return redirect()->route('eleves.show', $eleve->id)->with('success', 'Versement supprimé avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('eleves.show', $eleve->id)->with('error', 'Erreur lors de la suppression du versement.');
    }
}

    
}

