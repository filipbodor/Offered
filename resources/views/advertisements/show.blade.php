<x-app-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">{{ $advertisement->title }}</h2>
                        <div class="average-rating d-flex align-items-center">
                            <h5 class="mb-0 me-2"><span class="text-warning">{{ $averageRating }}</span></h5>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($averageRating >= $i)
                                    <i class="fas fa-star text-warning"></i> {{-- Full Star --}}
                                @elseif ($averageRating >= ($i - 0.5))
                                    <i class="fas fa-star-half-alt text-warning"></i> {{-- Half Star --}}
                                @else
                                    <i class="far fa-star text-warning"></i> {{-- Empty Star --}}
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $advertisement->description }}</p>
                        <div class="mb-3">
                            <strong>Meno:</strong>
                            <a href="{{ route('profile.show', $advertisement->user->id) }}">{{ $advertisement->user->name }}</a>
                            <!-- Chat Icon -->
                            <button type="button" class="btn ms-2 start-chat-icon" data-bs-toggle="modal" data-bs-target="#chatModal" data-user-id="{{ $advertisement->user->id }}">
                                <i class="fas fa-comments"></i>
                            </button>
                        </div>
                        <div class="mb-3"><strong>Kategória:</strong> {{ \App\Models\Category::find($advertisement->category_id)->name }}</div>
                        <div class="mb-3"><strong>Lokalita:</strong> {{ \App\Models\Location::find($advertisement->location_id)->name }}</div>
                        <div class="mb-3 pt-2 border-top">
                            <h3 class="mb-3">Cenník</h3>
                            @if($advertisement->services->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Služba</th>
                                        <th scope="col">Cena</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advertisement->services as $service)
                                        <tr>
                                            <td>{{ $service->service_name }}</td>
                                            <td>{{ number_format($service->price, 2) }}€</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No services listed.</p>
                            @endif
                        </div>
                        <div class="mb-3"><strong>Inzerát vytvorený:</strong> {{ $advertisement->created_at->format('F j, Y h:i A') }}</div>
                        @auth
                            <div class="d-flex justify-content-start">
                                @if(auth()->user()->id === $advertisement->user_id)
                                    <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-primary me-2">Upraviť</a>
                                @else
                                    <form action="{{ auth()->user()->favoriteAdvertisements->contains($advertisement) ? route('advertisements.unfavorite', $advertisement->id) : route('advertisements.favorite', $advertisement->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @if (auth()->user()->favoriteAdvertisements->contains($advertisement))
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Odstrániť z obľubených</button>
                                        @else
                                            <button type="submit" class="btn btn-success">Pridať do obľubených</button>
                                        @endif
                                    </form>
                                @endif
                            </div>
                        @endauth
                    </div>
                    @auth
                        @if(auth()->user()->id !== $advertisement->user_id)
                            <div class="card-footer">
                                <form action="{{ route('ratings.store', $advertisement->id) }}" method="POST" id="ratingForm">
                                    @csrf
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button" class="star" data-value="{{ $i }}" {{ $userRating && $userRating->rating >= $i ? 'style=color:#ffc107;' : '' }}>☆</button>
                                        @endfor
                                        <input type="hidden" name="rating" id="ratingInput" value="{{ $userRating->rating ?? '' }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Odoslať hodnotenie</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('partials._star_rating_script')


