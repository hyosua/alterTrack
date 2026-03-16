<?php

namespace App\Http\Controllers;

use App\Models\Alternance;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class AlternanceController extends Controller
{
    private array $rules = [
        'entreprise_id'   => 'required|exists:entreprises,id',
        'nom_etudiant'    => 'required|string|max:255',
        'prenom_etudiant' => 'required|string|max:255',
        'type'            => 'required|string|in:stage,alternance',
        'mois_annee'      => 'required|string|max:255',
        'duree'           => 'required|string|max:255',
        'descriptif'      => 'required|string',
        'prof_referent'   => 'required|string|max:255',
        'qualite_travail' => 'required|string|max:255',
        'technos'         => 'required|string|max:255',
    ];

    public function create()
    {
        $entreprises = Entreprise::orderBy('nom')->get();
        return view('alternances.create', compact('entreprises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);

        $alternance = new Alternance($validated);
        $alternance->save();

        return redirect()->route('dashboard')->with('success', 'Alternance ajoutée avec succès.');
    }

    public function destroy(Alternance $alternance)
    {
        $alternance->delete();

        return redirect()->route('dashboard')->with('success', 'Alternance supprimée avec succès.');
    }

    public function edit(Alternance $alternance)
    {
        $entreprises = Entreprise::orderBy('nom')->get();
        return view('alternances.edit', compact('alternance', 'entreprises'));
    }

    public function update(Request $request, Alternance $alternance)
    {
        $validated = $request->validate($this->rules);

        $alternance->update($validated);

        return redirect()->route('dashboard')->with('success', 'Alternance mise à jour avec succès.');
    }
}
