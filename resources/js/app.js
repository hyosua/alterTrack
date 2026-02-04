import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    // Existing autocomplete logic for 'entreprise' removed here
    // as it will be replaced by a generic Alpine.js searchable select component.
});

Alpine.data('searchableSelect', (optionsUrl, initialValue = '', initialText = '') => ({
    open: false,
    searchTerm: initialText,
    selectedValue: initialValue,
    selectedText: initialText,
    options: [],
    filteredOptions: [],
    isLoading: false,
    currentTimeout: null,

    init() {
        this.fetchOptions(this.searchTerm);
        this.$watch('searchTerm', (value) => this.debouncedFetchOptions(value));
        if (this.selectedValue) {
            this.selectedText = this.searchTerm;
        }
    },

    debouncedFetchOptions(value) {
        if (this.currentTimeout) {
            clearTimeout(this.currentTimeout);
        }
        this.currentTimeout = setTimeout(() => {
            this.fetchOptions(value);
        }, 300); // Debounce time
    },

    fetchOptions(query) {
        this.isLoading = true;
        this.options = []; // Clear previous options before fetching new ones

        // If no query and not pre-selecting an initial value, fetch all or a default set
        const url = query ? `${optionsUrl}?search=${query}` : optionsUrl;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (optionsUrl.includes('search-entreprises')) {
                    this.options = data.map(item => ({ value: item.nom, text: item.nom }));
                } else if (optionsUrl.includes('get-unique-technos')) {
                    this.options = data.map(item => ({ value: item, text: item }));
                } else {
                    this.options = data; // Assume data is already in {value, text} format
                }
                this.filterOptions(); // Filter based on current search term
                this.isLoading = false;
            })
            .catch(error => {
                console.error('Error fetching options:', error);
                this.isLoading = false;
            });
    },

    filterOptions() {
        if (!this.searchTerm) {
            this.filteredOptions = this.options;
            return;
        }
        this.filteredOptions = this.options.filter(option =>
            option.text.toLowerCase().includes(this.searchTerm.toLowerCase())
        );
    },

    selectOption(option) {
        this.selectedValue = option.value;
        this.selectedText = option.text;
        this.searchTerm = option.text; // Update search term to selected text
        this.open = false;
        // Dispatch an input event on the hidden input so form submission works
        this.$refs.hiddenInput.dispatchEvent(new Event('input'));
    },

    toggleOpen() {
        this.open = !this.open;
        if (this.open) {
            // When opening, reset searchTerm to selectedText to allow re-filtering
            this.searchTerm = this.selectedText;
            this.$nextTick(() => this.$refs.searchInput.focus());
        } else {
            // When closing, if nothing selected, reset searchTerm and selectedText
            if (!this.selectedValue) {
                this.searchTerm = '';
                this.selectedText = '';
            } else {
                // If a value is selected, ensure search term matches selected text
                this.searchTerm = this.selectedText;
            }
        }
        this.filterOptions();
    },

    clearSelection() {
        this.selectedValue = '';
        this.selectedText = '';
        this.searchTerm = '';
        this.open = false;
        this.fetchOptions(''); // Fetch all options again
        this.$refs.hiddenInput.dispatchEvent(new Event('input'));
    },

    handleBlur() {
        // Delay closing to allow click event on options to register
        setTimeout(() => {
            if (!this.filteredOptions.some(option => option.value === this.selectedValue)) {
                // If the selected value is not in the filtered options (e.g., user typed something and blurred without selecting)
                // Revert search term to selected text or clear if no selection
                this.searchTerm = this.selectedText;
            }
            this.open = false;
        }, 100);
    }
}));
