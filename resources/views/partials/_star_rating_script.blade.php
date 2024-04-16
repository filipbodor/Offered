<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', () => updateHoverStars(index + 1));
            star.addEventListener('mouseleave', () => clearHoverStars());
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;
                updateStars(rating);
            });
        });

        function updateHoverStars(rating) {
            stars.forEach((star, idx) => {
                star.style.color = idx < rating ? '#ffc107' : '#e4e5e9';
            });
        }

        function clearHoverStars() {
            const currentRating = ratingInput.value;
            stars.forEach((star, idx) => {
                star.style.color = idx < currentRating ? '#ffc107' : '#e4e5e9';
            });
        }

        function updateStars(rating) {
            stars.forEach((star, idx) => {
                star.textContent = idx < rating ? '★' : '☆';
            });
        }
    });

</script>
