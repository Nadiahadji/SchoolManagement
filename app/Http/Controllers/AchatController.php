<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    public function index()
    {
        $achats = Achat::all();
        return view('achats.index', compact('achats'));
    }

    public function create()
    {
        return view('achats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'date_achat' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Achat::create($request->all());
        return redirect()->route('achats.index')->with('success', 'Achat créé avec succès.');
    }

    public function show(Achat $achat)
    {
        return view('achats.show', compact('achat'));
    }

    public function edit(Achat $achat)
    {
        return view('achats.edit', compact('achat'));
    }

    public function update(Request $request, Achat $achat)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'date_achat' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $achat->update($request->all());
        return redirect()->route('achats.index')->with('success', 'Achat mis à jour avec succès.');
    }

    public function destroy(Achat $achat)
    {
        $achat->delete();
        return redirect()->route('achats.index')->with('success', 'Achat supprimé avec succès.');
    }
}
