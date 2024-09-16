<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formateur;

class FormateurController extends Controller
{
    public function search(Request $request)    {
        $query = $request->input('search');
        $formateurs = Formateur::search($query)->get();
        return view('formateurs.index', compact('formateurs'));
        } 
    public function index()
    {
        $formateurs = Formateur::all();
        return view('formateurs.index', compact('formateurs'));
    }

    public function create()
    {
        return view('formateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:formateurs',
            'tel' => 'required|string',
            'address' => 'required|string',
            'specialties' => 'required|string',
            'qualifications' => 'required|string',
        ]);

        Formateur::create($request->all());

        return redirect()->route('formateurs.index')->with('success', 'Formateur créé avec succès.');
    }

    public function show($id)
    {
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.show', compact('formateur'));
    }

    public function edit($id)
    {
        $formateur = Formateur::findOrFail($id);
        return view('formateurs.edit', compact('formateur'));
    }

    public function update(Request $request, $id)
    {
        $formateur = Formateur::findOrFail($id);

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:formateurs,email,' . $formateur->id,
            'tel' => 'required|string',
            'address' => 'required|string',
            'specialties' => 'required|string',
            'qualifications' => 'required|string',
        ]);

        $formateur->update($request->all());

        return redirect()->route('formateurs.index')->with('success', 'Formateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $formateur = Formateur::findOrFail($id);
        $formateur->delete();

        return redirect()->route('formateurs.index')->with('success', 'Formateur supprimé avec succès.');
    }
}

