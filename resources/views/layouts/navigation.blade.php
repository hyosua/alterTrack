<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-indigo-600">
                    AlterTrack
                </a>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="text-gray-900 hover:text-indigo-600 px-3 py-2 text-sm font-medium">
                        Tableau de bord
                    </a>
                </div>
            </div>
            <div class="flex items-center">
                <span class="mr-4 text-sm text-gray-500">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 font-semibold hover:text-red-800">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>