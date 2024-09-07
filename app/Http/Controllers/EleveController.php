<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PDF;
use App\Exports\ElevesExport;
use Maatwebsite\Excel\Facades\Excel;



class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

     public function index()
     {
         $eleves = Eleve::all();
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
             'date_naissance' => 'required|date',
             'offre' => 'required|numeric',
             'versement' => 'required|numeric',
         ]);
 
         Eleve::create([
             'nom' => $request->input('nom'),
             'prenom' => $request->input('prenom'),
             'date_inscription' => Carbon::parse($request->input('date_inscription'))->format('Y/m/d'),
             'tel' => $request->input('tel', ''),
             'tel_parent' => $request->input('tel_parent'),
             'niv' => $request->input('niv'),
             'date_naissance' => Carbon::parse($request->input('date_naissance'))->format('Y/m/d'),
             'offre' => $request->input('offre'),
             'versement' => $request->input('versement'),
             'reste' => $request->input('offre') - $request->input('versement'),
         ]);
 
         return redirect()->route('eleves.index')->with('success', 'Élève créé avec succès.');
     }
 
     public function show($id)
     {
        $eleve=Eleve::find($id);

         return view('eleves.Show', compact('eleve'));
     }
 
     public function edit($id)
     {
        $eleve=Eleve::find($id);
         return view('eleves.edit', compact('eleve'));
     }
 
     public function update(Request $request, $id)
     {
        $eleve=Eleve::find($id);
         $request->validate([
             'nom' => 'required|string',
             'prenom' => 'required|string',
             'date_inscription' => 'required|date',
             'tel_parent' => 'required|string',
             'niv' => 'required|string',
             'date_naissance' => 'required|date',
             'offre' => 'required|numeric',
            //  'versement' => 'required|numeric',
         ]);
 
         $eleve->update([
             'nom' => $request->input('nom'),
             'prenom' => $request->input('prenom'),
             'date_inscription' => Carbon::parse($request->input('date_inscription'))->format('Y/m/d'),
             'tel' => $request->input('tel', ''),
             'tel_parent' => $request->input('tel_parent'),
             'niv' => $request->input('niv'),
             'date_naissance' => Carbon::parse($request->input('date_naissance'))->format('Y/m/d'),
             'offre' => $request->input('offre'),
             'versement' => $request->input('versement'),
             'reste' => $request->input('offre') - $request->input('versement'),
         ]);
 
         return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
     }
 
     public function destroy( $id)
     {
        $eleve=Eleve::find($id);
         $eleve->delete();
         return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès.');
     }
     public function toggleActivation($id)
     {
        $eleve=Eleve::find($id);
         $user->is_active = !$user->is_active;
         $user->save();
         return redirect()->route('users.index')->with('success', 'Statut de l\'utilisateur modifié avec succès.');
     }

    public function filtrer($recherche=null){ 
        $eleves=Eleve::all(); 
          if (empty($recherche)) {
            return view('Eleve.eleves', compact('eleves'));
        }else{
         
          $eleves = Eleve::where(function ($query) use ($recherche) {
              $query->where('prenom', 'like', '%' . $recherche . '%')
                  ->orWhere('nom', 'like', '%' . $recherche . '%')
                  ->orWhere('tel', 'like', '%' . $recherche . '%')
                  ->orWhere('tel_parent', 'like', '%' . $recherche . '%')
                  ->orWhere('niv', 'like', '%' . $recherche . '%')
                  ->orWhere('date_naissance', 'like', '%' . $recherche . '%')
                  ->orWhere('date_inscription', 'like', '%' . $recherche . '%')
                  ->orWhere('offre', 'like', '%' . $recherche . '%')
                  ->orWhere('versement', 'like', '%' . $recherche . '%')
                  ->orWhere('reste', 'like', '%' . $recherche . '%');
          })->get();
          return view('Eleve.eleves', compact('eleves'));
      }
      }
      public function generatePDF()
{
    $eleves = Eleve::all(); 
  
    $data = [
        'title' => 'Liste des Eleves ',
        'date' => date('m/d/Y'),
        'eleves' => $eleves,
     
    ]; 
          
    $pdf = PDF::loadView('Eleve.elevesPdf', $data);

    
    return $pdf->download('eleves.pdf');
}
public function exportEleves()
{
    return Excel::download(new ElevesExport, 'eleves.xlsx');
}

}
