<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelector = document.getElementById('category');
        const subcategorySelector = document.getElementById('subcategory');
        const selectedSubcategoryId = "{{ $advertisement->subcategory_id }}";

        function loadSubcategories(categoryId, selectedSubcategoryId = null) {
            fetch(`/categories/${categoryId}/subcategories`)
                .then(response => response.json())
                .then(subcategories => {
                    subcategorySelector.innerHTML = '';
                    subcategories.forEach(subcategory => {
                        const selectedAttribute = subcategory.id == selectedSubcategoryId ? 'selected' : '';
                        subcategorySelector.innerHTML += `<option value="${subcategory.id}" ${selectedAttribute}>${subcategory.name}</option>`;
                    });
                });
        }

        // Initial load for the current category
        loadSubcategories(categorySelector.value, selectedSubcategoryId);

        // Event listener for category changes
        categorySelector.addEventListener('change', (e) => {
            loadSubcategories(e.target.value);
        });
    });
</script>
