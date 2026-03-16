<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AlterTrack — Suivi d'alternance simplifié</title>
    <meta name="description" content="AlterTrack centralise le suivi de vos stages et alternances. Importez vos données Excel, retrouvez chaque étudiant en un clic. Gratuit pour les établissements.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">

{{-- ===== NAVIGATION ===== --}}
<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <span class="text-lg font-bold text-indigo-700">AlterTrack</span>
            </div>

            {{-- Desktop links --}}
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                <a href="#fonctionnalites" class="hover:text-indigo-600 transition">Fonctionnalités</a>
                <a href="#comment" class="hover:text-indigo-600 transition">Comment ça marche</a>
                <a href="#faq" class="hover:text-indigo-600 transition">FAQ</a>
            </div>

            {{-- Desktop CTAs --}}
            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Se connecter</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition shadow-sm">Commencer gratuitement</a>
                @endauth
            </div>

            {{-- Hamburger --}}
            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition class="md:hidden border-t border-gray-100 bg-white px-4 py-4 space-y-3">
        <a href="#fonctionnalites" @click="open=false" class="block text-sm font-medium text-gray-700 hover:text-indigo-600">Fonctionnalités</a>
        <a href="#comment" @click="open=false" class="block text-sm font-medium text-gray-700 hover:text-indigo-600">Comment ça marche</a>
        <a href="#faq" @click="open=false" class="block text-sm font-medium text-gray-700 hover:text-indigo-600">FAQ</a>
        <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
            @auth
                <a href="{{ url('/dashboard') }}" class="block text-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg">Tableau de bord</a>
            @else
                <a href="{{ route('login') }}" class="block text-center px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50">Se connecter</a>
                <a href="{{ route('register') }}" class="block text-center px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">Commencer gratuitement</a>
            @endauth
        </div>
    </div>
</nav>

{{-- ===== HERO ===== --}}
<section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-20 lg:py-28">
    {{-- Decorative blobs --}}
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-indigo-300 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-purple-300 opacity-15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
        {{-- Left --}}
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-full mb-6">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                Gratuit pour les établissements
            </div>

            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                Suivez chaque alternance,<br>
                <span class="text-indigo-600">sans effort.</span>
            </h1>

            <p class="text-xl text-gray-500 mb-8 max-w-lg leading-relaxed">
                AlterTrack centralise le suivi de vos stages et alternances. Importez vos données Excel, retrouvez chaque étudiant en un clic, et gardez le contrôle de toutes vos entreprises partenaires.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Accéder au tableau de bord
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Commencer gratuitement
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-lg font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                        Se connecter
                    </a>
                @endauth
            </div>

            {{-- Social proof --}}
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-indigo-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">M</div>
                    <div class="w-8 h-8 rounded-full bg-purple-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">T</div>
                    <div class="w-8 h-8 rounded-full bg-blue-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">S</div>
                    <div class="w-8 h-8 rounded-full bg-pink-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">A</div>
                </div>
                <p class="text-sm text-gray-500">Déjà utilisé par des établissements en France</p>
            </div>
        </div>

        {{-- Right: CSS mockup --}}
        <div class="relative">
            <div class="bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden">
                {{-- Browser chrome --}}
                <div class="bg-gray-100 border-b border-gray-200 px-4 py-3 flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    <div class="ml-3 flex-1 bg-white rounded-md px-3 py-1 text-xs text-gray-400 border border-gray-200">altertrack.app/dashboard</div>
                </div>
                {{-- Fake dashboard --}}
                <div class="p-4 bg-gray-50">
                    {{-- Stats mini --}}
                    <div class="grid grid-cols-3 gap-2 mb-4">
                        <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm">
                            <div class="text-lg font-bold text-gray-900">47</div>
                            <div class="text-xs text-gray-400">Dossiers</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm">
                            <div class="text-lg font-bold text-gray-900">23</div>
                            <div class="text-xs text-gray-400">Entreprises</div>
                        </div>
                        <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-sm">
                            <div class="text-lg font-bold text-gray-900">3</div>
                            <div class="text-xs text-gray-400">Promos</div>
                        </div>
                    </div>
                    {{-- Fake table --}}
                    <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden">
                        <div class="px-3 py-2 bg-gray-50 border-b border-gray-100 grid grid-cols-3 gap-2">
                            <div class="text-xs font-semibold text-gray-500">Étudiant</div>
                            <div class="text-xs font-semibold text-gray-500">Entreprise</div>
                            <div class="text-xs font-semibold text-gray-500">Type</div>
                        </div>
                        <div class="divide-y divide-gray-50">
                            <div class="px-3 py-2 grid grid-cols-3 gap-2 items-center">
                                <div class="text-xs text-gray-700 font-medium">Martin L.</div>
                                <div class="text-xs text-gray-500">Capgemini</div>
                                <span class="inline-block text-xs px-1.5 py-0.5 bg-green-100 text-green-700 rounded font-medium w-fit">Alternance</span>
                            </div>
                            <div class="px-3 py-2 grid grid-cols-3 gap-2 items-center">
                                <div class="text-xs text-gray-700 font-medium">Dupont A.</div>
                                <div class="text-xs text-gray-500">Société Générale</div>
                                <span class="inline-block text-xs px-1.5 py-0.5 bg-purple-100 text-purple-700 rounded font-medium w-fit">Stage</span>
                            </div>
                            <div class="px-3 py-2 grid grid-cols-3 gap-2 items-center">
                                <div class="text-xs text-gray-700 font-medium">Bernard S.</div>
                                <div class="text-xs text-gray-500">Thales Group</div>
                                <span class="inline-block text-xs px-1.5 py-0.5 bg-green-100 text-green-700 rounded font-medium w-fit">Alternance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Floating badge --}}
            <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-lg border border-gray-100 px-4 py-3 flex items-center gap-2">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <div class="text-xs font-semibold text-gray-900">Import réussi</div>
                    <div class="text-xs text-gray-400">47 dossiers importés</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS ===== --}}
<section class="bg-indigo-600 py-14">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center text-white">
        <div>
            <div class="text-4xl font-extrabold mb-1">500+</div>
            <div class="text-indigo-200 text-sm font-medium">Alternances suivies</div>
        </div>
        <div>
            <div class="text-4xl font-extrabold mb-1">200+</div>
            <div class="text-indigo-200 text-sm font-medium">Entreprises partenaires</div>
        </div>
        <div>
            <div class="text-4xl font-extrabold mb-1">30+</div>
            <div class="text-indigo-200 text-sm font-medium">Établissements utilisateurs</div>
        </div>
    </div>
</section>

{{-- ===== FONCTIONNALITÉS ===== --}}
<section id="fonctionnalites" class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Tout ce dont vous avez besoin</h2>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">Une solution pensée pour les équipes pédagogiques, sans complexité inutile.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Feature 1 --}}
            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Import Excel en un clic</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Importez vos listes d'étudiants et d'entreprises depuis vos fichiers Excel existants. Aucune ressaisie manuelle.</p>
            </div>

            {{-- Feature 2 --}}
            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Filtres intelligents</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Retrouvez instantanément par type (stage/alternance), technologie ou entreprise grâce à des filtres avec autocomplétion.</p>
            </div>

            {{-- Feature 3 --}}
            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Carnet d'entreprises</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Carnet d'adresses complet de vos partenaires avec historique de tous les accueils d'étudiants.</p>
            </div>

            {{-- Feature 4 --}}
            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Suivi par étudiant</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Technologies maîtrisées, professeur référent, qualité du travail, période — toutes les infos en un seul endroit.</p>
            </div>

            {{-- Feature 5 --}}
            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Sécurisé et privé</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Accès réservé aux membres de votre établissement. Données protégées, vérification d'email obligatoire.</p>
            </div>

            {{-- Feature 6 --}}
            <div class="rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 p-8 hover:shadow-md transition">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Gratuit pour toujours</h3>
                <p class="text-indigo-100 text-sm leading-relaxed">Aucun abonnement, aucune carte de crédit. 100% gratuit pour tous les établissements d'enseignement.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== COMMENT ÇA MARCHE ===== --}}
<section id="comment" class="bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Opérationnel en 3 minutes</h2>
            <p class="text-lg text-gray-500 max-w-xl mx-auto">Pas de formation requise, pas de configuration complexe.</p>
        </div>

        <div class="relative grid lg:grid-cols-3 gap-10">
            {{-- Step 1 --}}
            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center text-2xl font-extrabold mx-auto mb-6 shadow-lg shadow-indigo-200">1</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Créez votre compte</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Inscription en 30 secondes avec votre email professionnel. Vérification automatique pour sécuriser l'accès.</p>
            </div>

            {{-- Divider --}}
            <div class="hidden lg:flex items-start justify-center pt-7">
                <div class="w-full border-t-2 border-dashed border-indigo-200 mt-7 mx-4"></div>
            </div>

            {{-- Step 2 --}}
            <div class="text-center" style="grid-column: 2">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center text-2xl font-extrabold mx-auto mb-6 shadow-lg shadow-indigo-200">2</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Importez vos données</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Glissez votre fichier Excel ou saisissez manuellement vos entreprises et alternants. Quelques secondes suffisent.</p>
            </div>

            {{-- Step 3 --}}
            <div class="text-center">
                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center text-2xl font-extrabold mx-auto mb-6 shadow-lg shadow-indigo-200">3</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Suivez et gérez</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Filtrez, consultez, modifiez à tout moment. Votre tableau de bord centralise tout en temps réel.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== TÉMOIGNAGES ===== --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Ce qu'en disent nos utilisateurs</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 italic text-sm leading-relaxed mb-6">"AlterTrack nous a fait gagner des heures chaque semaine. L'import Excel est une vraie révolution pour notre équipe. On a enfin une vue claire sur tous nos alternants."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-400 rounded-full flex items-center justify-center text-white font-bold text-sm">MD</div>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Marie Dupont</div>
                        <div class="text-xs text-gray-400">Responsable pédagogique — IUT de Lyon</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 italic text-sm leading-relaxed mb-6">"Interface claire, prise en main immédiate. Les filtres par technologie nous permettent de savoir en 2 clics quels étudiants ont travaillé sur des projets React ou Python."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-purple-400 rounded-full flex items-center justify-center text-white font-bold text-sm">TB</div>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Thomas Bernard</div>
                        <div class="text-xs text-gray-400">Coordinateur alternance — BTS SIO, Paris</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 italic text-sm leading-relaxed mb-6">"Gratuit ET performant, c'est rare. Nos données sont centralisées, nos équipes ont toutes le même niveau d'information. Je recommande à tous les établissements."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-pink-400 rounded-full flex items-center justify-center text-white font-bold text-sm">SM</div>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Sophie Martin</div>
                        <div class="text-xs text-gray-400">Directrice des études — ESC Bordeaux</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== FAQ ===== --}}
<section id="faq" class="bg-gray-50 py-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Questions fréquentes</h2>
        </div>

        <div x-data="{ open: null }" class="space-y-3">
            @php
            $faqs = [
                ['q' => 'AlterTrack est-il vraiment gratuit ?', 'a' => 'Oui, AlterTrack est entièrement gratuit pour tous les établissements d\'enseignement. Aucun abonnement, aucune carte de crédit, aucune limite cachée.'],
                ['q' => 'Puis-je importer mes données depuis Excel ?', 'a' => 'Oui ! AlterTrack accepte les fichiers .xlsx pour l\'import en masse de vos entreprises et de vos dossiers d\'alternance. Des templates sont disponibles pour faciliter la mise en forme.'],
                ['q' => 'Mes données sont-elles sécurisées ?', 'a' => 'Absolument. L\'accès est réservé aux utilisateurs vérifiés par email. Les connexions sont chiffrées et les données ne sont jamais partagées avec des tiers.'],
                ['q' => 'Combien d\'utilisateurs peut-on avoir par établissement ?', 'a' => 'Il n\'y a pas de limite. Tous vos collaborateurs pédagogiques peuvent créer un compte et accéder aux données de l\'établissement.'],
                ['q' => 'Existe-t-il une application mobile ?', 'a' => 'Pas encore d\'application native, mais AlterTrack est entièrement responsive et s\'utilise parfaitement depuis un smartphone ou une tablette.'],
                ['q' => 'Comment obtenir de l\'aide ?', 'a' => 'Vous pouvez consulter la documentation ou contacter notre support par email. Nous répondons en général sous 24h ouvrées.'],
            ];
            @endphp

            @foreach($faqs as $i => $faq)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <button
                    @click="open = open === {{ $i }} ? null : {{ $i }}"
                    class="w-full flex items-center justify-between px-6 py-5 text-left text-sm font-semibold text-gray-900 hover:bg-gray-50 transition"
                >
                    <span>{{ $faq['q'] }}</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform duration-200 flex-shrink-0 ml-4"
                         :class="open === {{ $i }} ? 'rotate-45' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </button>
                <div x-show="open === {{ $i }}" x-transition class="px-6 pb-5 text-sm text-gray-500 leading-relaxed border-t border-gray-50 pt-4">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA FINALE ===== --}}
<section class="bg-gradient-to-r from-indigo-600 to-purple-700 py-20">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Prêt à simplifier votre suivi d'alternance ?</h2>
        <p class="text-indigo-100 text-lg mb-10">Rejoignez les établissements qui font confiance à AlterTrack. Gratuit, sans engagement.</p>
        @auth
            <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 px-8 py-4 text-lg font-bold text-indigo-700 bg-white rounded-xl hover:bg-indigo-50 transition shadow-xl">
                Accéder au tableau de bord
            </a>
        @else
            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-4 text-lg font-bold text-indigo-700 bg-white rounded-xl hover:bg-indigo-50 transition shadow-xl">
                Commencer gratuitement
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        @endauth
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="bg-gray-900 text-gray-400 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 lg:grid-cols-4 gap-10">
        <div class="col-span-2 lg:col-span-1">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <span class="text-white font-bold">AlterTrack</span>
            </div>
            <p class="text-sm leading-relaxed mb-4">Votre solution de suivi d'alternance, simple et gratuite.</p>
            <p class="text-xs text-gray-600">© {{ date('Y') }} AlterTrack. Tous droits réservés.</p>
        </div>

        <div>
            <h4 class="text-white font-semibold text-sm mb-4">Produit</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#fonctionnalites" class="hover:text-white transition">Fonctionnalités</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-white transition">Connexion</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-white transition">Inscription</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold text-sm mb-4">Support</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#faq" class="hover:text-white transition">FAQ</a></li>
                <li><a href="mailto:contact@altertrack.app" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold text-sm mb-4">Légal</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition">Mentions légales</a></li>
                <li><a href="#" class="hover:text-white transition">Politique de confidentialité</a></li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>
