<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-900 leading-tight">Ajouter une entreprise</h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumbs :links="['Entreprises' => route('entreprises.index'), 'Ajouter' => '#']" />

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 mb-5 text-sm">
                        <ul class="list-disc ml-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('entreprises.store') }}" method="POST">
                    @csrf
                    @include('entreprises._form')
                    <div class="mt-6 flex items-center justify-end gap-3 pt-5 border-t border-gray-100">
                        <a href="{{ route('entreprises.index') }}" class="px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition">
                            Annuler
                        </a>
                        <button type="submit" class="px-4 py-2 bg-violet-600 text-white text-sm font-medium rounded-lg hover:bg-violet-700 transition">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
