<?php

namespace App\Http\Controllers;

use App\Models\Alternance;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Imports\AlternanceImport;
use App\Imports\EntrepriseImport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Alternance::with('entreprise');

        if ($request->filled('type')) {
            $query->whereRaw('LOWER(type) = ?', [strtolower($request->type)]);
        }

        if ($request->filled('technos')) {
            $query->where('technos', 'like', '%' . $request->technos . '%');
        }

        if ($request->filled('entreprise')) {
            $query->whereHas('entreprise', function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->entreprise . '%');
            });
        }

        $alternances = $query->get();

        return view('dashboard', compact('alternances'));
    }

    public function importEntreprises(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new EntrepriseImport, $request->file('file'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Erreur lors de l\'importation du fichier des entreprises.');
        }

        return redirect()->route('dashboard')->with('success', 'Importation des entreprises réussie.');
    }

    public function importAlternances(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new AlternanceImport, $request->file('file'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Erreur lors de l\'importation du fichier des alternances.');
        }

        return redirect()->route('dashboard')->with('success', 'Importation des alternances réussie.');
    }

    public function searchEntreprises(Request $request)
    {
        $search = $request->get('search');
        $entreprises = Entreprise::where('nom', 'like', '%' . $search . '%')
            ->limit(10)
            ->get(['id', 'nom']);

        return response()->json($entreprises);
    }

    public function getUniqueTechnos()
    {
        $technos = Alternance::pluck('technos')->map(function ($item) {
            return explode(',', $item);
        })->flatten()->map(function ($item) {
            return trim($item);
        })->unique()->values()->all();

        return response()->json($technos);
    }
}