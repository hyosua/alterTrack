<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Stats cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                    <div class="w-11 h-11 bg-indigo-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-gray-900">{{ $stats['total'] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Dossiers au total</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                    <div class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-gray-900">{{ $stats['stages'] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Stages</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                    <div class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-gray-900">{{ $stats['alternances'] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Alternances</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-gray-900">{{ $stats['entreprises'] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Entreprises</div>
                    </div>
                </div>
            </div>

            {{-- Main card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="p-6 lg:p-8">

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
                            <p class="font-semibold mb-1">Oups ! Il y a un problème :</p>
                            <ul class="list-disc ml-5 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Import + Actions --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        {{-- Import Section --}}
                        <div class="border border-gray-100 rounded-xl p-6 bg-gray-50">
                            <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                Importer par Excel
                            </h3>
                            <div class="space-y-4">
                                {{-- Import Entreprises --}}
                                <div class="bg-white rounded-lg border border-gray-200 p-4" x-data="{ show: false }">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-sm font-semibold text-gray-700">Entreprises</h4>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('templates.entreprises') }}" class="inline-flex items-center gap-1 text-xs text-indigo-600 hover:text-indigo-800 font-medium">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                Modèle .xlsx
                                            </a>
                                            <button @click="show = !show" class="inline-flex items-center gap-1 text-xs text-gray-400 hover:text-gray-600">
                                                <svg class="w-3.5 h-3.5 transition-transform" :class="show ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                                Format
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="show" x-transition class="mb-3 rounded-lg border border-gray-100 overflow-hidden">
                                        <table class="w-full text-xs">
                                            <thead class="bg-indigo-50">
                                                <tr>
                                                    <th class="px-3 py-2 text-left font-semibold text-indigo-700">Colonne</th>
                                                    <th class="px-3 py-2 text-left font-semibold text-indigo-700">Requis</th>
                                                    <th class="px-3 py-2 text-left font-semibold text-indigo-700">Exemple</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-50">
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">nom_entreprise</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">Capgemini</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">domaine</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">Informatique</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">code_postal</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">75008</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">contact</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">Jean Martin</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">email</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">j@capgemini.com</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">tel</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">0102030405</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">siteweb</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">https://capgemini.com</td></tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <form action="{{ route('import.entreprises') }}" method="POST" enctype="multipart/form-data" x-data="{ fileSelected: false }">
                                        @csrf
                                        <div class="flex items-end gap-3">
                                            <div class="flex-1">
                                                <input type="file" name="file" @change="fileSelected = $event.target.value.length > 0"
                                                       class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required/>
                                            </div>
                                            <button type="submit" :disabled="!fileSelected" :class="{ 'opacity-50 cursor-not-allowed': !fileSelected }"
                                                    class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                                                Importer
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Import Alternances --}}
                                <div class="bg-white rounded-lg border border-gray-200 p-4" x-data="{ show: false }">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-sm font-semibold text-gray-700">Alternances</h4>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('templates.alternances') }}" class="inline-flex items-center gap-1 text-xs text-green-600 hover:text-green-800 font-medium">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                Modèle .xlsx
                                            </a>
                                            <button @click="show = !show" class="inline-flex items-center gap-1 text-xs text-gray-400 hover:text-gray-600">
                                                <svg class="w-3.5 h-3.5 transition-transform" :class="show ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                                Format
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="show" x-transition class="mb-3 rounded-lg border border-gray-100 overflow-hidden">
                                        <table class="w-full text-xs">
                                            <thead class="bg-green-50">
                                                <tr>
                                                    <th class="px-3 py-2 text-left font-semibold text-green-700">Colonne</th>
                                                    <th class="px-3 py-2 text-left font-semibold text-green-700">Requis</th>
                                                    <th class="px-3 py-2 text-left font-semibold text-green-700">Exemple</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-50">
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">nom_entreprise</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">Capgemini</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">nom_etudiant</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">Martin</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">prenom_etudiant</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">Lucas</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">type</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">stage <span class="text-gray-400">ou</span> alternance</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">mois_annee</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">09/2024</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">duree</td><td class="px-3 py-1.5 text-green-600 font-semibold">✓</td><td class="px-3 py-1.5 text-gray-500">12 <span class="text-gray-400">(mois)</span></td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">descriptif</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">Développement web</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">prof_referent</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">M. Dupont</td></tr>
                                                <tr class="bg-white"><td class="px-3 py-1.5 font-mono text-gray-700">qualite_travail</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">Excellent</td></tr>
                                                <tr class="bg-gray-50"><td class="px-3 py-1.5 font-mono text-gray-700">technos</td><td class="px-3 py-1.5 text-gray-400">optionnel</td><td class="px-3 py-1.5 text-gray-500">PHP,Laravel,Vue.js</td></tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <form action="{{ route('import.alternances') }}" method="POST" enctype="multipart/form-data" x-data="{ fileSelected: false }">
                                        @csrf
                                        <div class="flex items-end gap-3">
                                            <div class="flex-1">
                                                <input type="file" name="file" @change="fileSelected = $event.target.value.length > 0"
                                                       class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required/>
                                            </div>
                                            <button type="submit" :disabled="!fileSelected" :class="{ 'opacity-50 cursor-not-allowed': !fileSelected }"
                                                    class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                                                Importer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Manual Actions --}}
                        <div class="border border-gray-100 rounded-xl p-6 bg-gray-50">
                            <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Ajouter manuellement
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('entreprises.index') }}" class="flex items-center gap-3 w-full px-4 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                                    </svg>
                                    Gérer les entreprises
                                </a>
                                <a href="{{ route('entreprises.create') }}" class="flex items-center gap-3 w-full px-4 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Ajouter une entreprise
                                </a>
                                <a href="{{ route('alternances.create') }}" class="flex items-center gap-3 w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Ajouter une alternance
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Filter Form --}}
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-6">
                        <div class="flex flex-wrap gap-4 items-end">
                            <div>
                                <label for="type" class="block text-xs font-semibold text-gray-600 mb-1">Type</label>
                                <select id="type" name="type" class="block pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg">
                                    <option value="">Tous</option>
                                    <option value="stage" {{ request('type') == 'stage' ? 'selected' : '' }}>Stage</option>
                                    <option value="alternance" {{ request('type') == 'alternance' ? 'selected' : '' }}>Alternance</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">Technos</label>
                                <div x-data="searchableSelect('{{ route('get.unique.technos') }}', '{{ request('technos') }}', '{{ request('technos') }}')" @click.outside="handleBlur()" class="relative">
                                    <input type="text" x-model="searchTerm" @focus="open = true" @input="filterOptions()" @keydown.escape="open = false"
                                           class="block w-44 pl-3 pr-3 py-2 text-sm border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg"
                                           placeholder="Rechercher...">
                                    <input type="hidden" name="technos" x-ref="hiddenInput" :value="selectedValue">
                                    <div x-show="open && filteredOptions.length > 0" class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 overflow-auto">
                                        <ul class="py-1 text-sm focus:outline-none">
                                            <template x-for="option in filteredOptions" :key="option.value">
                                                <li @click="selectOption(option)" x-text="option.text"
                                                    class="cursor-default select-none py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white"></li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1">Entreprise</label>
                                <div x-data="searchableSelect('{{ route('search.entreprises') }}', '{{ request('entreprise') }}', '{{ request('entreprise') }}')" @click.outside="handleBlur()" class="relative">
                                    <input type="text" x-model="searchTerm" @focus="open = true" @input="filterOptions()" @keydown.escape="open = false"
                                           class="block w-44 pl-3 pr-3 py-2 text-sm border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-lg"
                                           placeholder="Rechercher...">
                                    <input type="hidden" name="entreprise" x-ref="hiddenInput" :value="selectedValue">
                                    <div x-show="open && filteredOptions.length > 0" class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-xl ring-1 ring-black ring-opacity-5 overflow-auto">
                                        <ul class="py-1 text-sm focus:outline-none">
                                            <template x-for="option in filteredOptions" :key="option.value">
                                                <li @click="selectOption(option)" x-text="option.text"
                                                    class="cursor-default select-none py-2 pl-3 pr-9 hover:bg-indigo-600 hover:text-white"></li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                                    Filtrer
                                </button>
                                @if(request('type') || request('technos') || request('entreprise'))
                                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                                        Réinitialiser
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-xl border border-gray-100">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Étudiant</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Entreprise</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Type / Période</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Technologies</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Qualité du travail</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Prof référent</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse ($alternances as $alternance)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $alternance->prenom_etudiant }} {{ $alternance->nom_etudiant }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $alternance->entreprise->nom }}</div>
                                            <div class="text-xs text-gray-400">{{ $alternance->entreprise->domaine }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ strtolower($alternance->type) == 'alternance' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($alternance->type) }}
                                            </span>
                                            <div class="text-xs text-gray-400 mt-1">{{ $alternance->mois_annee }} · {{ $alternance->duree }} mois</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                @foreach(explode(',', $alternance->technos) as $tech)
                                                    <span class="bg-blue-50 text-blue-700 text-[10px] px-2 py-0.5 rounded-md border border-blue-100 font-medium">
                                                        {{ trim($tech) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-xs p-2 rounded-lg bg-amber-50 border-l-4 border-amber-400 text-gray-700 italic max-w-[200px]">
                                                "{{ $alternance->qualite_travail }}"
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $alternance->prof_referent }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('alternances.edit', $alternance) }}" class="text-indigo-600 hover:text-indigo-900 font-medium mr-3">Modifier</a>
                                            <form action="{{ route('alternances.destroy', $alternance) }}" method="POST" onsubmit="return confirm('Supprimer cette alternance ?');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <x-empty-state
                                                title="Aucune alternance trouvée"
                                                description="Importez un fichier Excel ou ajoutez une alternance manuellement pour commencer."
                                                action-label="Ajouter une alternance"
                                                action-url="{{ route('alternances.create') }}"
                                            />
                                        </td>
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
