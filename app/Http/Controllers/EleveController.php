<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Versement;
use PDF;
use Carbon\Carbon;

class EleveController extends Controller
{

    public function search(Request $request)    {
        $query = $request->input('search');
        $eleves = Eleve::search($query)->get();
        return view('eleves.index', compact('eleves'));
        } 

    public function index()
    {
        $eleves = Eleve::with('versements')->get();
        return view('eleves.index', compact('eleves'));
    }

    public function create()
    {
        return view('eleves.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_inscription' => 'required|date',
            'tel_parent' => 'required|string',
            'niv' => 'required|string',
            'adresse' => 'required|string',
            'date_naissance' => 'required|date',
            'offre' => 'required|numeric',
        ]);

        $eleve = Eleve::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date_inscription' => Carbon::parse($request->input('date_inscription'))->format('Y-m-d'),
            'tel_parent' => $request->input('tel_parent'),
            'niv' => $request->input('niv'),
            'adresse' => $request->input('adresse'),
            'date_naissance' => Carbon::parse($request->input('date_naissance'))->format('Y-m-d'),
            'offre' => $request->input('offre'),
            'reste' => $request->input('offre'),
        ]);

        return redirect()->route('eleves.index')->with('success', 'Élève créé avec succès.');
    }

    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.show', compact('eleve'));
    }

    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    // public function update(Request $request, $id)
    // {
    //     $eleve = Eleve::findOrFail($id);

    //     $request->validate([
    //         'nom' => 'required|string',
    //         'prenom' => 'required|string',
    //         'date_inscription' => 'required|date',
    //         'tel_parent' => 'required|string',
    //         'niv' => 'required|string',
    //         'date_naissance' => 'required|date',
    //         'offre' => 'required|numeric',
    //         'adresse' => 'required|string',

    //     ]);

    //     $eleve->update([
    //         'nom' => $request->input('nom'),
    //         'prenom' => $request->input('prenom'),
    //         'date_inscription' => Carbon::parse($request->input('date_inscription'))->format('Y-m-d'),
    //         'tel_parent' => $request->input('tel_parent'),
    //         'niv' => $request->input('niv'),
    //         'adresse' => $request->input('adresse'),
    //         'date_naissance' => Carbon::parse($request->input('date_naissance'))->format('Y-m-d'),
    //         'offre' => $request->input('offre'),
    //         'reste' => $eleve->reste, // Pas de modification ici, calculé à la création des versements
    //     ]);

    //     return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
    // }
    public function update(Request $request, $id)
    {
        $eleve = Eleve::findOrFail($id);
    
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_inscription' => 'required|date',
            'tel_parent' => 'required|string',
            'niv' => 'required|string',
            'date_naissance' => 'required|date',
            'offre' => 'required|numeric',
            'adresse' => 'required|string',
        ]);
    
        // Calculer le total des versements
        $totalVersements = $eleve->versements->sum('montant');
    
        // Mettre à jour l'élève et recalculer le reste
        $eleve->nom = $request->input('nom');
        $eleve->prenom = $request->input('prenom');
        $eleve->date_inscription = Carbon::parse($request->input('date_inscription'))->format('Y-m-d');
        $eleve->tel_parent = $request->input('tel_parent');
        $eleve->niv = $request->input('niv');
        $eleve->adresse = $request->input('adresse');
        $eleve->date_naissance = Carbon::parse($request->input('date_naissance'))->format('Y-m-d');
        $eleve->offre = $request->input('offre');
        $eleve->reste = $request->input('offre') - $totalVersements;
    
        $eleve->save();
    
        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
    }
    


    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->versements()->delete();
        $eleve->delete();
        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès.');
    }


    public function payments($id)
{
    $eleve = Eleve::findOrFail($id);
    return view('gestion_paiements', compact('eleve'));
}



public function imprimerContrat($id)
{

    $eleve = Eleve::findOrFail($id);

    $data = ['title' => 'Contrat','eleve' =>$eleve];
    $pdf = PDF::loadView('pdf.document', $data);
    return $pdf->download('Contrat_'.$eleve->nom.'_'.$eleve->prenom.'.pdf');
  
}

}
