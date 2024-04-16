<script>
    document.addEventListener('DOMContentLoaded', function() {
        var locationInput = document.getElementById('locationInput');
        if (locationInput) {
            locationInput.addEventListener('input', function() {
                var query = this.value;
                if (query.length < 2) {
                    document.getElementById('locationSuggestions').innerHTML = '';
                    return;
                }

                fetch(`/location-search?query=${query}`)
                    .then(response => response.json())
                    .then(locations => {
                        var suggestionsHtml = '';
                        locations.forEach(location => {
                            suggestionsHtml += `<div onclick="selectLocation('${location.name.replace("'", "\\'")}')">${location.name}</div>`;
                        });
                        document.getElementById('locationSuggestions').innerHTML = suggestionsHtml;
                    })
                    .catch(error => console.error('Error fetching location suggestions:', error));
            });
        }

        window.selectLocation = function(name) {
            document.getElementById('locationInput').value = name;
            document.getElementById('locationSuggestions').innerHTML = '';
        };
    });
</script>
