<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('category').addEventListener('change', function() {
            let categoryId = this.value;
            let subcategorySelect = document.getElementById('subcategory');
            subcategorySelect.innerHTML = '<option value="" selected disabled>Select a subcategory</option>';
            fetch(`/categories/${categoryId}/subcategories`)
                .then(response => response.text())
                .then(text => {
                    return JSON.parse(text);
                })
                .then(subcategories => {
                    subcategories.forEach(function(subcategory) {
                        let option = new Option(subcategory.name, subcategory.id);
                        subcategorySelect.add(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
