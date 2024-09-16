<?php

namespace App\Http\Controllers;

use App\Models\Condidat;
use App\Models\Formation;
use Illuminate\Http\Request;
use PDF;

class CondidatController extends Controller
{

    public function search(Request $request)    {
        $query = $request->input('search');
        $condidats = Condidat::search($query)->get();
        $formations = Formation::all();
        return view('condidats.index', compact('condidats', 'formations'));
        }
    public function index()
    {
        $condidats = Condidat::with('formations', 'paiements')->get();
        $formations = Formation::all();
        return view('condidats.index', compact('condidats', 'formations'));
    }

    public function create()
    {
        return view('condidats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_inscription' => 'required|date',
            'tel' => 'required|string|max:20',
            'niv' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
        ]);

        Condidat::create($request->all());
        return redirect()->route('condidats.index')->with('success', 'Candidat ajouté avec succès.');
    }


    // public function show(Condidat $condidat)
    // {
    //     // Charger les formations et les paiements avec le candidat
    //     $condidat->load('formations.paiements');

    //     $formations = Formation::all(); // Récupère toutes les formations disponibles

    //     return view('condidats.show', compact('condidat', 'formations'));
    // }
    public function show(Condidat $condidat)
{
    // Charger les formations et les paiements avec le candidat
    $condidat->load('formations', 'paiements'); // Charger formations et paiements

    return view('condidats.show', compact('condidat'));
}


    public function inscrireFormation1(Request $request, Condidat $condidat)
    {
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
        ]);

        $condidat->formations()->attach($request->formation_id);

        return redirect()->route('condidats.show', $condidat->id)->with('success', 'Formation ajoutée avec succès.');
    }

    public function ajouterPaiement(Request $request, Condidat $condidat)
    {
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'montant' => 'required|numeric',
            'date_paiement' => 'required|date',
            'methode_paiement' => 'required|string',
        ]);

        PaiementFormation::create([
            'condidat_id' => $condidat->id,
            'formation_id' => $request->formation_id,
            'montant' => $request->montant,
            'date_paiement' => $request->date_paiement,
            'methode_paiement' => $request->methode_paiement,
        ]);

        return redirect()->route('condidats.show', $condidat->id)->with('success', 'Paiement ajouté avec succès.');
    }

    public function edit(Condidat $condidat)
    {
        return view('condidats.edit', compact('condidat'));
    }

    public function update(Request $request, Condidat $condidat)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_inscription' => 'required|date',
            'tel' => 'required|string|max:20',
            'niv' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
        ]);

        $condidat->update($request->all());
        return redirect()->route('condidats.index')->with('success', 'Candidat mis à jour avec succès.');
    }

    public function destroy(Condidat $condidat)
    {
        $condidat->delete();
        return redirect()->route('condidats.index')->with('success', 'Candidat supprimé avec succès.');
    }

 

        // Afficher le formulaire d'inscription à une formation
        public function inscrireFormationForm(Condidat $condidat)
        {
            $formations = Formation::all(); // Récupère toutes les formations disponibles
            return view('condidats.inscrire', compact('condidat', 'formations'));
        }
    
        // Traiter l'inscription à une formation
        public function inscrireFormation(Request $request, Condidat $condidat)
        {
            $request->validate([
                'formation_id' => 'required|exists:formations,id',
            ]);
    
           // Attacher la formation avec la date d'inscription
           $condidat->formations()->attach($request->formation_id, [
            'date_inscription' => $request->date_inscription,
        ]);
    
            return redirect()->route('condidats.show', $condidat->id)->with('success', 'Formation ajoutée avec succès.');
        }

        public function imprimerContrat($id, $formation_id)
        {
            // Récupérez les informations nécessaires
            $condidat = Condidat::findOrFail($id);
            $formation = Formation::findOrFail($formation_id);

    $data = ['title' => 'Contrat','eleve' =>$condidat,'formation'=>$formation];
    $pdf = PDF::loadView('pdf.document2', $data);
    return $pdf->download('Contrat_'.$condidat->nom.'_'.$condidat->prenom.'.pdf');
  
}
}
