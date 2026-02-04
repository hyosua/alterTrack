<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AlterTrack') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @auth
            <header class="absolute top-0 right-0 p-6 text-right z-10">
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            </header>
        @endauth
<div class="min-h-screen flex flex-col items-center pt-16 sm:pt-24">
            <main class="flex-grow flex flex-col justify-center items-center text-center px-4 sm:px-6 lg:px-8 py-12">
                <img
                src="/alterTrack-hero.png"
                alt="Alternant serrant la main à une entreprise"
                class="w-48 h-48 mx-auto mb-6 rounded-xl object-cover"
                />
                <h1 class="text-7xl font-bold text-gray-800 mb-4">AlterTrack</h1>
                <p class="text-lg text-gray-600 mb-8">
                    Bienvenue sur AlterTrack, votre solution de suivi d'alternance.
                </p>
                @guest
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Se connecter
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            S'inscrire
                        </a>
                    </div>
                @endguest
            </main>
        </div>
    </body>
</html>