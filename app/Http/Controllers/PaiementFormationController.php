<?php

namespace App\Http\Controllers;

use App\Models\PaiementFormation;
use App\Models\Condidat;
use App\Models\Formation;
use Illuminate\Http\Request;

class PaiementFormationController extends Controller
{
//     public function search(Request $request)
// {
//     $query = $request->input('search'); // Assurez-vous d'utiliser le même nom que dans le formulaire de recherche

//     $paiements = PaiementFormation::search($query)->get();
//    $paiements->load('condidat', 'formation');

//     return view('paiements.index', compact('paiements'));
// }
public function search(Request $request)
{
    $query = $request->input('search'); // Assurez-vous d'utiliser le même nom que dans le formulaire de recherche

    $paiements = PaiementFormation::whereHas('condidat', function($q) use ($query) {
        $q->where('nom', 'LIKE', "%{$query}%")
          ->orWhere('prenom', 'LIKE', "%{$query}%");
    })->orWhereHas('formation', function($q) use ($query) {
        $q->where('nom', 'LIKE', "%{$query}%");
    })->get();

    $paiements->load('condidat', 'formation');

    return view('paiements.index', compact('paiements'));
}


    public function search1(Request $request)
{
    $query = $request->input('query');
    $paiements = PaiementFormation::search($query)->get();
    $paiements->load('condidat', 'formation');
    return view('paiements.index', compact('paiements'));
}



    public function index()
    {
        $paiements = PaiementFormation::all();
        return view('paiements.index', compact('paiements'));
    }

    public function create()
    {
        $condidats = Condidat::all();
        $formations = Formation::all();
        return view('paiements.create', compact('condidats', 'formations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'condidat_id' => 'required|exists:condidats,id',
            'formation_id' => 'required|exists:formations,id',
            'montant' => 'required|numeric|min:0',
            'date_paiement' => 'required|date',
            'methode_paiement' => 'required|string|max:255',
        ]);

        PaiementFormation::create($request->all());
        return redirect()->route('paiements.index')->with('success', 'Paiement enregistré avec succès.');
    }

    public function show(PaiementFormation $paiement)
    {
        return view('paiements.show', compact('paiement'));
    }

    public function edit(PaiementFormation $paiement)
    {
        $condidats = Condidat::all();
        $formations = Formation::all();
        return view('paiements.edit', compact('paiement', 'condidats', 'formations'));
    }

    public function update(Request $request, PaiementFormation $paiement)
    {
        $request->validate([
            'condidat_id' => 'required|exists:condidats,id',
            'formation_id' => 'required|exists:formations,id',
            'montant' => 'required|numeric|min:0',
            'date_paiement' => 'required|date',
            'methode_paiement' => 'required|string|max:255',
        ]);

        $paiement->update($request->all());
        return redirect()->route('paiements.index')->with('success', 'Paiement mis à jour avec succès.');
    }

    public function destroy(PaiementFormation $paiement)
    {
        $paiement->delete();
        return redirect()->route('paiements.index')->with('success', 'Paiement supprimé avec succès.');
    }
}
