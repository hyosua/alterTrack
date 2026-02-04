<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight">
            {{ $entreprise->nom }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="p-8">
                    <!-- Enterprise Details -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Détails de l'entreprise</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Domaine</p>
                                <p class="text-lg text-gray-900">{{ $entreprise->domaine }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Code Postal</p>
                                <p class="text-lg text-gray-900">{{ $entreprise->code_postal }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Contact</p>
                                <p class="text-lg text-gray-900">{{ $entreprise->contact }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="text-lg text-gray-900">{{ $entreprise->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                <p class="text-lg text-gray-900">{{ $entreprise->tel }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Site Web</p>
                                <a href="{{ $entreprise->siteweb }}" target="_blank" class="text-lg text-indigo-600 hover:underline">{{ $entreprise->siteweb }}</a>
                            </div>
                        </div>
                    </div>

                    <!-- Alternances Table -->
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Alternances associées</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Etudiant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type / Période</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Technologies</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qualité du Travail</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prof Référent</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($entreprise->alternances as $alternance)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $alternance->prenom_etudiant }} {{ $alternance->nom_etudiant }}</div>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Aucune alternance trouvée pour cette entreprise.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <a href="{{ route('entreprises.index') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Retour à la liste des entreprises
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
