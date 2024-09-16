<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Formateur;

class FormationController extends Controller
{
    public function search(Request $request)    {
        $query = $request->input('search');
        $formations = Formation::search($query)->get();
        return view('formations.index', compact('formations'));
    } 
    public function index()
    {
        $formations = Formation::with('formateur')->get();
        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        $formateurs = Formateur::all();
        return view('formations.create', compact('formateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'duree' => 'required|integer',
            'niveau' => 'required|string',
            'cout' => 'required|numeric',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);

        Formation::create($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation créée avec succès.');
    }

    public function show($id)
    {
        $formation = Formation::with('formateur')->findOrFail($id);
        return view('formations.show', compact('formation'));
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        $formateurs = Formateur::all();
        return view('formations.edit', compact('formation', 'formateurs'));
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'duree' => 'required|integer',
            'niveau' => 'required|string',
            'cout' => 'required|numeric',
            'formateur_id' => 'required|exists:formateurs,id',
        ]);

        $formation->update($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();

        return redirect()->route('formations.index')->with('success', 'Formation supprimée avec succès.');
    }
}

