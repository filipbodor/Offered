<div class="container">
    <div class="row">
        @foreach($categories as $category)
            <div class="col-6 col-sm-6 col-md-4 mb-4">
                <div class="card position-relative text-center category-card-wrapper">
                    <a class="category-card d-flex flex-column align-items-center justify-content-center p-4" href="{{ route('advertisements.byCategoryAndSubcategory', ['category' => $category->id]) }}">
                        <h4 class="mb-3 category-name small-sm">{{ $category->name }}</h4>
                        @if($category->image_path)
                            <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }}" class="img-fluid category-image smaller-image small-sm">
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
