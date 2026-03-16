<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-900 leading-tight">Modifier une alternance</h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumbs :links="['Modifier une alternance' => '#']" />

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-5 text-sm">
                        <ul class="list-disc ml-4 space-y-1">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('alternances.update', $alternance) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="entreprise_id" class="block text-sm font-medium text-gray-700 mb-1">Entreprise</label>
                        <select name="entreprise_id" id="entreprise_id" required
                                class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            @foreach($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}" {{ old('entreprise_id', $alternance->entreprise_id) == $entreprise->id ? 'selected' : '' }}>{{ $entreprise->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="border-t border-gray-100 pt-5 mb-5">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4">Étudiant</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nom_etudiant" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <input type="text" name="nom_etudiant" id="nom_etudiant" value="{{ old('nom_etudiant', $alternance->nom_etudiant) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                            <div>
                                <label for="prenom_etudiant" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                <input type="text" name="prenom_etudiant" id="prenom_etudiant" value="{{ old('prenom_etudiant', $alternance->prenom_etudiant) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-5 mb-5">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4">Informations</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                <select id="type" name="type" class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                                    <option value="stage" {{ old('type', strtolower($alternance->type)) == 'stage' ? 'selected' : '' }}>Stage</option>
                                    <option value="alternance" {{ old('type', strtolower($alternance->type)) == 'alternance' ? 'selected' : '' }}>Alternance</option>
                                </select>
                            </div>
                            <div>
                                <label for="mois_annee" class="block text-sm font-medium text-gray-700 mb-1">Période (mm/AAAA)</label>
                                <input type="text" name="mois_annee" id="mois_annee" value="{{ old('mois_annee', $alternance->mois_annee) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                            <div>
                                <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée (mois)</label>
                                <input type="text" name="duree" id="duree" value="{{ old('duree', $alternance->duree) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                            <div>
                                <label for="prof_referent" class="block text-sm font-medium text-gray-700 mb-1">Professeur référent</label>
                                <input type="text" name="prof_referent" id="prof_referent" value="{{ old('prof_referent', $alternance->prof_referent) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                            <div>
                                <label for="qualite_travail" class="block text-sm font-medium text-gray-700 mb-1">Qualité du travail</label>
                                <input type="text" name="qualite_travail" id="qualite_travail" value="{{ old('qualite_travail', $alternance->qualite_travail) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                            <div>
                                <label for="technos" class="block text-sm font-medium text-gray-700 mb-1">Technologies <span class="text-gray-400 font-normal">(séparées par virgules)</span></label>
                                <input type="text" name="technos" id="technos" value="{{ old('technos', $alternance->technos) }}" required
                                       class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="descriptif" class="block text-sm font-medium text-gray-700 mb-1">Descriptif</label>
                            <textarea name="descriptif" id="descriptif" rows="3" required
                                      class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm">{{ old('descriptif', $alternance->descriptif) }}</textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition">
                            Annuler
                        </a>
                        <button type="submit" class="px-4 py-2 bg-violet-600 text-white text-sm font-medium rounded-lg hover:bg-violet-700 transition">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
