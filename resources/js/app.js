import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const entrepriseInput = document.getElementById('entreprise');

    if (entrepriseInput) {
        let currentTimeout = null;
        let suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'absolute z-10 bg-white border border-gray-300 rounded-md shadow-lg mt-1 w-full max-h-60 overflow-auto';
        suggestionsContainer.style.display = 'none';
        entrepriseInput.parentNode.insertBefore(suggestionsContainer, entrepriseInput.nextSibling);

        entrepriseInput.addEventListener('input', function () {
            if (currentTimeout) {
                clearTimeout(currentTimeout);
            }

            const query = entrepriseInput.value;

            if (query.length > 2) { // Only search if more than 2 characters
                currentTimeout = setTimeout(() => {
                    fetch(`/search-entreprises?search=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
                            if (data.length > 0) {
                                data.forEach(entreprise => {
                                    let suggestionItem = document.createElement('div');
                                    suggestionItem.className = 'px-4 py-2 cursor-pointer hover:bg-gray-100';
                                    suggestionItem.textContent = entreprise.nom;
                                    suggestionItem.addEventListener('click', function () {
                                        entrepriseInput.value = entreprise.nom;
                                        suggestionsContainer.style.display = 'none';
                                    });
                                    suggestionsContainer.appendChild(suggestionItem);
                                });
                                suggestionsContainer.style.display = 'block';
                            } else {
                                suggestionsContainer.style.display = 'none';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching company suggestions:', error);
                            suggestionsContainer.style.display = 'none';
                        });
                }, 300); // Debounce time
            } else {
                suggestionsContainer.style.display = 'none';
            }
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', function (event) {
            if (!entrepriseInput.contains(event.target) && !suggestionsContainer.contains(event.target)) {
                suggestionsContainer.style.display = 'none';
            }
        });
    }
});