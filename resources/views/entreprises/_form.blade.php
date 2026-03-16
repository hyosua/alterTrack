<div class="space-y-5">
    <div>
        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom de l'entreprise</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $entreprise->nom ?? '') }}" required
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="domaine" class="block text-sm font-medium text-gray-700 mb-1">Domaine</label>
        <input type="text" name="domaine" id="domaine" value="{{ old('domaine', $entreprise->domaine ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-1">Code Postal</label>
        <input type="text" name="code_postal" id="code_postal" value="{{ old('code_postal', $entreprise->code_postal ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="contact" class="block text-sm font-medium text-gray-700 mb-1">Personne à contacter</label>
        <input type="text" name="contact" id="contact" value="{{ old('contact', $entreprise->contact ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $entreprise->email ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="tel" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
        <input type="text" name="tel" id="tel" value="{{ old('tel', $entreprise->tel ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
    <div>
        <label for="siteweb" class="block text-sm font-medium text-gray-700 mb-1">Site Web</label>
        <input type="text" name="siteweb" id="siteweb" value="{{ old('siteweb', $entreprise->siteweb ?? '') }}"
               class="block w-full border-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-lg text-sm shadow-none">
    </div>
</div>
