<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-900 leading-tight">Mon profil</h2>
    </x-slot>

    <div class="py-6 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
