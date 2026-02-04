<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une alternance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('alternances.update', $alternance) }}">
                        @csrf
                        @method('PUT')

                        <!-- Entreprise -->
                        <div class="mt-4">
                            <label for="entreprise_id" class="block text-sm font-medium text-gray-700">Entreprise</label>
                            <select name="entreprise_id" id="entreprise_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                                @foreach($entreprises as $entreprise)
                                    <option value="{{ $entreprise->id }}" {{ old('entreprise_id', $alternance->entreprise_id) == $entreprise->id ? 'selected' : '' }}>{{ $entreprise->nom }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Etudiant -->
                        <h3 class="text-lg font-medium text-gray-900 mt-8">Etudiant</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="nom_etudiant" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom_etudiant" id="nom_etudiant" value="{{ old('nom_etudiant', $alternance->nom_etudiant) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="prenom_etudiant" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="prenom_etudiant" id="prenom_etudiant" value="{{ old('prenom_etudiant', $alternance->prenom_etudiant) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                        </div>

                        <!-- Alternance -->
                        <h3 class="text-lg font-medium text-gray-900 mt-8">Alternance</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="stage" {{ old('type', strtolower($alternance->type)) == 'stage' ? 'selected' : '' }}>Stage</option>
                                    <option value="alternance" {{ old('type', strtolower($alternance->type)) == 'alternance' ? 'selected' : '' }}>Alternance</option>
                                </select>
                            </div>
                           <div>
                                <label for="mois_annee" class="block text-sm font-medium text-gray-700">Période (Mois/Année)</label>
                                <input type="text" name="mois_annee" id="mois_annee" value="{{ old('mois_annee', $alternance->mois_annee) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="duree" class="block text-sm font-medium text-gray-700">Durée</label>
                                <input type="text" name="duree" id="duree" value="{{ old('duree', $alternance->duree) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                             <div>
                                <label for="prof_referent" class="block text-sm font-medium text-gray-700">Professeur Référent</label>
                                <input type="text" name="prof_referent" id="prof_referent" value="{{ old('prof_referent', $alternance->prof_referent) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="qualite_travail" class="block text-sm font-medium text-gray-700">Qualité du travail</label>
                                <input type="text" name="qualite_travail" id="qualite_travail" value="{{ old('qualite_travail', $alternance->qualite_travail) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="technos" class="block text-sm font-medium text-gray-700">Technologies</label>
                                <input type="text" name="technos" id="technos" value="{{ old('technos', $alternance->technos) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="descriptif" class="block text-sm font-medium text-gray-700">Descriptif</label>
                            <textarea name="descriptif" id="descriptif" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('descriptif', $alternance->descriptif) }}</textarea>
                        </div>


                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                                {{ __('Annuler') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Modifier') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>