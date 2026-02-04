<div class="space-y-6">
    <div>
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'entreprise</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $entreprise->nom ?? '') }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="domaine" class="block text-sm font-medium text-gray-700">Domaine</label>
        <input type="text" name="domaine" id="domaine" value="{{ old('domaine', $entreprise->domaine ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="code_postal" class="block text-sm font-medium text-gray-700">Code Postal</label>
        <input type="text" name="code_postal" id="code_postal" value="{{ old('code_postal', $entreprise->code_postal ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="contact" class="block text-sm font-medium text-gray-700">Personne à contacter</label>
        <input type="text" name="contact" id="contact" value="{{ old('contact', $entreprise->contact ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $entreprise->email ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="tel" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="text" name="tel" id="tel" value="{{ old('tel', $entreprise->tel ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <div>
        <label for="siteweb" class="block text-sm font-medium text-gray-700">Site Web</label>
        <input type="text" name="siteweb" id="siteweb" value="{{ old('siteweb', $entreprise->siteweb ?? '') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
</div>
