<div class="col-md-10 mb-1 clickable-card" data-href="{{ route('advertisements.show', $advertisement->id) }}" style="cursor: pointer">
    <div class="card position-relative card-shadow rounded-4 ">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title pb-2 border-bottom">{{ $advertisement->title }}</h5>
                    <p class="card-text">{{ $advertisement->description }}</p>
                </div>
            </div>
            <div class="col-md-4 bg-light">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Kategória: {{ \App\Models\Category::find($advertisement->category_id)->name }}</li>
                    <li class="list-group-item">Lokalita: {{ \App\Models\Location::find($advertisement->location_id)->name }}</li>
                    <li class="list-group-item">
                        Hodnotenie:
                        @php $rating = round($advertisement->ratings->avg('rating') * 2) / 2; @endphp
                        @foreach(range(1,5) as $i)
                            @if($rating > 0.5)
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                            @elseif($rating === 0.5)
                                <i class="fas fa-star-half-alt" style="color: #ffc107;"></i>
                            @else
                                <i class="far fa-star" style="color: #ffc107;"></i>
                            @endif
                            @php $rating--; @endphp
                        @endforeach
                        ({{ round($advertisement->ratings->avg('rating') * 10) / 10}})
                    </li>
                </ul>
                <div class="card-body">
                    <div class="flex-row align-items-center justify-content-start">
                        <a href="{{ route('advertisements.show', $advertisement->id) }}" class="btn bg-darkgreen btn-sm me-2 mb-2">Zobraziť</a>
                        @auth
                            @if(auth()->user()->id !== $advertisement->user_id)
                                <form action="{{ auth()->user()->favoriteAdvertisements->contains($advertisement) ? route('advertisements.unfavorite', $advertisement->id) : route('advertisements.favorite', $advertisement->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @if (auth()->user()->favoriteAdvertisements->contains($advertisement))
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm me-2 mb-2">Odstrániť z obľubených</button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-sm me-2 mb-2">Pridať do obľubených</button>
                                    @endif
                                </form>
                            @else
                                <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-secondary btn-sm me-2 mb-2">Upraviť</a>
                            @endif
                            @//if(auth()->user()->role->name === 'admin')
                                <!-- <form action="{//{ route('advertisements.destroy', $advertisement->id) }}" method="POST">
                                    @//csrf
                                    @//method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm me-2 mb-2" onclick="return confirm('Are you sure?')">Zmazať</button>
                                </form> -->
                            @//endif
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('partials._clickable_card_script')
