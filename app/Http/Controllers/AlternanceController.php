<?php

namespace App\Http\Controllers;

use App\Models\Alternance;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class AlternanceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entreprises = Entreprise::orderBy('nom')->get();
        return view('alternances.create', compact('entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'nom_etudiant' => 'required|string|max:255',
            'prenom_etudiant' => 'required|string|max:255',
            'type' => 'required|string|in:stage,alternance',
            'mois_annee' => 'required|string|max:255',
            'duree' => 'required|string|max:255',
            'descriptif' => 'required|string',
            'prof_referent' => 'required|string|max:255',
            'qualite_travail' => 'required|string|max:255',
            'technos' => 'required|string|max:255',
        ]);

        $alternance = new Alternance($request->all());
        $alternance->save();

        return redirect()->route('dashboard')->with('success', 'Alternance ajoutée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternance $alternance)
    {
        $alternance->delete();

        return redirect()->route('dashboard')->with('success', 'Alternance supprimée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternance $alternance)
    {
        $entreprises = Entreprise::orderBy('nom')->get();
        return view('alternances.edit', compact('alternance', 'entreprises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternance $alternance)
    {
        $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'nom_etudiant' => 'required|string|max:255',
            'prenom_etudiant' => 'required|string|max:255',
            'type' => 'required|string|in:stage,alternance',
            'mois_annee' => 'required|string|max:255',
            'duree' => 'required|string|max:255',
            'descriptif' => 'required|string',
            'prof_referent' => 'required|string|max:255',
            'qualite_travail' => 'required|string|max:255',
            'technos' => 'required|string|max:255',
        ]);

        $alternance->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Alternance mise à jour avec succès.');
    }
}