<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        document.querySelectorAll('.clickable-card').forEach(card => {
            console.log('Adding click event listener to:', card);
            card.addEventListener('click', function(e) {
                console.log('Card clicked:', this.getAttribute('data-href'));
                if (!e.target.matches('button, a, button *, a *')) {
                    window.location.href = this.getAttribute('data-href');
                }
            });
        });
    });
</script>
