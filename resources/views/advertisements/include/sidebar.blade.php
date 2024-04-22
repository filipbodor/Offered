<div class="col-md-3">
    <div class="subcategory-sidebar subcategory-sticky-top">
        <h1>Categories</h1>
        <ul class="">
            @foreach($categories as $cat)
                <li>
                    <a href="#!" class="custom-list-group-item category-list-group-item category-list-group-item-action {{ request()->route('category') == $cat->id && request()->route('subcategory') == null ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#subcategories-{{ $cat->id }}">
                        {{ $cat->name }}
                    </a>
                    <ul id="subcategories-{{ $cat->id }}" class="collapse {{ request()->route('category') == $cat->id ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('advertisements.byCategoryAndSubcategory', ['category' => $cat->id]) }}" class="custom-list-group-item subcategory-list-group-item subcategory-list-group-item-action subcategory-link {{ request()->route('subcategory') == null && request()->route('category') == $cat->id ? 'active' : '' }}">
                                Všetko
                            </a>
                        </li>
                        @foreach($cat->subcategories as $subcategory)
                            <li>
                                <a href="{{ route('advertisements.byCategoryAndSubcategory', ['category' => $cat->id, 'subcategory' => $subcategory->id]) }}" class="custom-list-group-item subcategory-list-group-item subcategory-list-group-item-action subcategory-link {{ request()->route('subcategory') == $subcategory->id ? 'active' : '' }}">
                                    {{ $subcategory->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@include('partials._side_bar_categories_script')
