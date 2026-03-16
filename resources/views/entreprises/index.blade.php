<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-base text-gray-900 leading-tight">Entreprises</h2>
            <a href="{{ route('entreprises.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-violet-600 text-white text-sm font-medium rounded-lg hover:bg-violet-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Ajouter
            </a>
        </div>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumbs :links="['Entreprises' => '#']" />

            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Domaine</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($entreprises as $entreprise)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-3.5">
                                        <a href="{{ route('entreprises.show', $entreprise) }}" class="text-sm font-semibold text-violet-600 hover:text-violet-800 transition">{{ $entreprise->nom }}</a>
                                        <div class="text-xs text-gray-400 mt-0.5">{{ $entreprise->code_postal }}</div>
                                    </td>
                                    <td class="px-5 py-3.5 text-sm text-gray-600">{{ $entreprise->domaine }}</td>
                                    <td class="px-5 py-3.5">
                                        <div class="text-sm text-gray-900">{{ $entreprise->contact }}</div>
                                        <div class="text-xs text-gray-400">{{ $entreprise->email }}</div>
                                    </td>
                                    <td class="px-5 py-3.5 whitespace-nowrap text-sm">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('entreprises.show', $entreprise) }}" class="text-gray-400 hover:text-gray-700 transition">Voir</a>
                                            <a href="{{ route('entreprises.edit', $entreprise) }}" class="text-violet-600 hover:text-violet-800 transition">Modifier</a>
                                            <form action="{{ route('entreprises.destroy', $entreprise) }}" method="POST" onsubmit="return confirm('Supprimer cette entreprise ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transition">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <x-empty-state
                                            title="Aucune entreprise enregistrée"
                                            description="Ajoutez votre première entreprise ou importez un fichier Excel depuis le tableau de bord."
                                            action-label="Ajouter une entreprise"
                                            action-url="{{ route('entreprises.create') }}"
                                        />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($entreprises->hasPages())
                    <div class="px-5 py-3 border-t border-gray-100">
                        {{ $entreprises->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
