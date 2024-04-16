<div class="col-md-3">
    <div class="subcategory-sidebar subcategory-sticky-top">
        <div class="list-group">
            @foreach($categories as $cat)
                <a href="#!" class="list-group-item category-list-group-item-action {{ request()->route('category') == $cat->id && request()->route('subcategory') == null ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#subcategories-{{ $cat->id }}">
                    {{ $cat->name }}
                </a>
                <div id="subcategories-{{ $cat->id }}" class="collapse {{ request()->route('category') == $cat->id ? 'show' : '' }}">

                    <a href="{{ route('advertisements.byCategoryAndSubcategory', ['category' => $cat->id]) }}" class="list-group-item subcategory-list-group-item-action subcategory-link {{ request()->route('subcategory') == null && request()->route('category') == $cat->id ? 'active' : '' }}">
                        Všetko
                    </a>
                    @foreach($cat->subcategories as $subcategory)
                        <a href="{{ route('advertisements.byCategoryAndSubcategory', ['category' => $cat->id, 'subcategory' => $subcategory->id]) }}" class="list-group-item subcategory-list-group-item-action subcategory-link {{ request()->route('subcategory') == $subcategory->id ? 'active' : '' }}">
                            {{ $subcategory->name }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
