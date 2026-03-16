<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-900 leading-tight">{{ $entreprise->nom }}</h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <x-breadcrumbs :links="['Entreprises' => route('entreprises.index'), $entreprise->nom => '#']" />

            {{-- Details --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Détails</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Domaine</p>
                        <p class="text-sm text-gray-900">{{ $entreprise->domaine ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Code Postal</p>
                        <p class="text-sm text-gray-900">{{ $entreprise->code_postal ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Contact</p>
                        <p class="text-sm text-gray-900">{{ $entreprise->contact ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Email</p>
                        <p class="text-sm text-gray-900">{{ $entreprise->email ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Téléphone</p>
                        <p class="text-sm text-gray-900">{{ $entreprise->tel ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1">Site Web</p>
                        @if($entreprise->siteweb)
                            <a href="{{ $entreprise->siteweb }}" target="_blank" class="text-sm text-violet-600 hover:underline">{{ $entreprise->siteweb }}</a>
                        @else
                            <p class="text-sm text-gray-900">—</p>
                        @endif
                    </div>
                </div>
                <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                    <a href="{{ route('entreprises.edit', $entreprise) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-violet-600 text-white text-sm font-medium rounded-lg hover:bg-violet-700 transition">
                        Modifier
                    </a>
                    <a href="{{ route('entreprises.index') }}" class="inline-flex items-center px-3.5 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition">
                        Retour à la liste
                    </a>
                </div>
            </div>

            {{-- Alternances Table --}}
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="text-sm font-semibold text-gray-900">Alternances associées</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Étudiant</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Type / Période</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Technologies</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Qualité</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Référent</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($entreprise->alternances as $alternance)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3.5 text-sm font-semibold text-gray-900">{{ $alternance->prenom_etudiant }} {{ $alternance->nom_etudiant }}</td>
                                    <td class="px-5 py-3.5">
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ strtolower($alternance->type) == 'alternance' ? 'bg-emerald-100 text-emerald-700' : 'bg-violet-100 text-violet-700' }}">
                                            {{ ucfirst($alternance->type) }}
                                        </span>
                                        <div class="text-xs text-gray-400 mt-1">{{ $alternance->mois_annee }} · {{ $alternance->duree }} mois</div>
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach(explode(',', $alternance->technos) as $tech)
                                                <span class="text-[10px] px-1.5 py-0.5 bg-gray-100 text-gray-600 rounded font-medium">{{ trim($tech) }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-5 py-3.5 text-xs text-gray-500 italic max-w-[160px]">{{ $alternance->qualite_travail }}</td>
                                    <td class="px-5 py-3.5 text-sm text-gray-500">{{ $alternance->prof_referent }}</td>
                                    <td class="px-5 py-3.5 text-sm">
                                        <a href="{{ route('alternances.edit', $alternance) }}" class="text-violet-600 hover:text-violet-800 font-medium transition">Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <x-empty-state title="Aucune alternance pour cette entreprise" />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
