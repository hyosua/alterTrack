<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen"> <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Succès</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Erreur</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="p-8">

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm">
                            <p class="font-bold">Oups ! Il y a un problème :</p>
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <!-- Import Section -->
                        <div class="border rounded-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Importer par Excel</h3>
                            <div class="space-y-6">
                                <!-- Import Entreprises -->
                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Importer des entreprises</h4>
                                    <form action="{{ route('import.entreprises') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex space-x-4 items-end">
                                            <div>
                                                <label for="file-entreprises" class="block text-sm font-medium text-gray-700">Fichier Excel</label>
                                                <input type="file" name="file" id="file-entreprises" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required/>
                                            </div>
                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Importer
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Import Alternances -->
                                <div class="bg-gray-50 p-4 rounded-lg border">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">Importer des alternances</h4>
                                    <form action="{{ route('import.alternances') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex space-x-4 items-end">
                                            <div>
                                                <label for="file-alternances" class="block text-sm font-medium text-gray-700">Fichier Excel</label>
                                                <input type="file" name="file" id="file-alternances" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required/>
                                            </div>
                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                Importer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Manual Add Section -->
                        <div class="border rounded-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Ajouter manuellement</h3>
                            <div class="space-y-4">
                                <a href="{{ route('entreprises.index') }}" class="w-full text-center block items-center px-4 py-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Gérer les entreprises
                                </a>
                                <a href="{{ route('entreprises.create') }}" class="w-full text-center block items-center px-4 py-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Ajouter une entreprise
                                </a>
                                <a href="{{ route('alternances.create') }}" class="w-full text-center block items-center px-4 py-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Ajouter une alternance
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-6">
                        <div class="flex space-x-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-900">Type</label>
                                <select id="type" name="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">Tous</option>
                                    <option value="stage" {{ request('type') == 'stage' ? 'selected' : '' }}>Stage</option>
                                    <option value="alternance" {{ request('type') == 'alternance' ? 'selected' : '' }}>Alternance</option>
                                </select>
                            </div>
                            <div>
                                <label for="technos" class="block text-sm font-medium text-gray-900">Technos</label>
                                <input type="text" name="technos" id="technos" value="{{ request('technos') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="entreprise" class="block text-sm font-medium text-gray-900">Entreprise</label>
                                <input type="text" name="entreprise" id="entreprise" value="{{ request('entreprise') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <button type="submit" class="mt-7 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Filtrer
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="flex space-x-4 mb-6">
                    </div>

                    <!-- Alternances Table -->
                    <div class="overflow-x-auto">
                       <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Etudiant</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Entreprise</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type / Période</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Technologies</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qualité du Travail</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prof Référent</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($alternances as $alternance)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="text-sm font-bold text-gray-900">{{ $alternance->prenom_etudiant }} {{ $alternance->nom_etudiant }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-bold text-gray-900">{{ $alternance->entreprise->nom }}</div>
                    <div class="text-xs text-gray-500">{{ $alternance->entreprise->domaine }}</div>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $alternance->type == 'Alternance' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                        {{ $alternance->type }}
                    </span>
                    <div class="text-xs text-gray-500 mt-1">{{ $alternance->mois_annee }} ({{ $alternance->duree }} mois)</div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-1">
                        @foreach(explode(',', $alternance->technos) as $tech)
                            <span class="bg-blue-50 text-blue-700 text-[10px] px-2 py-0.5 rounded border border-blue-100">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm p-2 rounded bg-amber-50 border-l-4 border-amber-400 text-gray-700 italic">
                        "{{ $alternance->qualite_travail }}"
                    </div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ $alternance->prof_referent }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <form action="{{ route('alternances.destroy', $alternance) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette alternance ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Aucune alternance trouvée.</td>
            </tr>
        @endforelse
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>