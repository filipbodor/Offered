<form action="{{ route('advertisements.filter') }}" method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-4 mb-3">
            <select name="rating_sort" id="ratingSort" class="form-select custom-select">
                <option value="" selected>Vyberte...</option>
                <option value="rating_asc" {{ request('rating_sort') == 'rating_asc' ? 'selected' : '' }}>Hodnotenie (od najnižšieho k najvyššiemu)</option>
                <option value="rating_desc" {{ request('rating_sort') == 'rating_desc' ? 'selected' : '' }}>Hodnotenie (od najvyššieho k najnižšiemu)</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <select name="newest_sort" id="newestSort" class="form-select custom-select">
                <option value="" selected>Vyberte...</option>
                <option value="newest" {{ request('newest_sort') == 'newest' ? 'selected' : '' }}>Od najnovšieho</option>
                <option value="oldest" {{ request('newest_sort') == 'oldest' ? 'selected' : '' }}>Od najstaršieho</option>
            </select>
        </div>

        <div class="col-md-4">
            <button type="submit" id="submit" class="btn bg-darkgreen">Použiť zoradenie</button>
        </div>
    </div>
</form>
