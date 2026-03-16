<nav x-data="{ open: false, userMenu: false }" class="bg-white border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            {{-- Logo + nav links --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 flex-shrink-0">
                    <div class="w-7 h-7 bg-violet-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-900">AlterTrack</span>
                </a>

                <div class="hidden sm:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-1.5 text-sm rounded-md transition
                           {{ request()->routeIs('dashboard') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                        Tableau de bord
                    </a>
                    <a href="{{ route('entreprises.index') }}"
                       class="px-3 py-1.5 text-sm rounded-md transition
                           {{ request()->routeIs('entreprises.*') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                        Entreprises
                    </a>
                    <a href="{{ route('alternances.create') }}"
                       class="px-3 py-1.5 text-sm rounded-md transition
                           {{ request()->routeIs('alternances.create') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                        Ajouter
                    </a>
                </div>
            </div>

            {{-- User dropdown --}}
            <div class="flex items-center gap-3">
                <div class="relative hidden sm:block">
                    <button @click="userMenu = !userMenu" @click.outside="userMenu = false"
                            class="flex items-center gap-2 px-2.5 py-1.5 rounded-lg hover:bg-gray-50 transition text-sm">
                        <div class="w-6 h-6 bg-violet-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="text-gray-700 max-w-[120px] truncate font-medium">{{ Auth::user()->name }}</span>
                        <svg class="w-3.5 h-3.5 text-gray-400 transition-transform" :class="userMenu ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="userMenu" x-transition
                         class="absolute right-0 mt-1 w-44 bg-white rounded-xl border border-gray-200 shadow-lg py-1 z-50">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Mon profil
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Mobile hamburger --}}
                <button @click="open = !open" class="sm:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition class="sm:hidden border-t border-gray-100 bg-white px-4 py-3 space-y-1">
        <a href="{{ route('dashboard') }}" @click="open=false"
           class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('dashboard') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
            Tableau de bord
        </a>
        <a href="{{ route('entreprises.index') }}" @click="open=false"
           class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('entreprises.*') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
            Entreprises
        </a>
        <a href="{{ route('alternances.create') }}" @click="open=false"
           class="block px-3 py-2 text-sm rounded-lg {{ request()->routeIs('alternances.create') ? 'text-violet-700 bg-violet-50 font-medium' : 'text-gray-700 hover:bg-gray-50' }}">
            Ajouter une alternance
        </a>
        <div class="border-t border-gray-100 pt-3 mt-2 space-y-1">
            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-gray-50">Mon profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50">Déconnexion</button>
            </form>
        </div>
    </div>
</nav>
