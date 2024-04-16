@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Edit Advertisement</h2>
                <form method="POST" action="{{ route('advertisements.update', $advertisement->id) }}" class="p-4 border rounded shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $advertisement->title }}" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $advertisement->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $advertisement->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="subcategory" class="form-label">Subcategory:</label>
                            <select class="form-control" id="subcategory" name="subcategory_id" required>
                                <!-- Subcategories are dynamically loaded -->
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-12 form-group" style="position: relative;">
                            <label for="locationInput" class="form-label">Location:</label>
                            <input type="text" class="form-control" id="locationInput" name="location" autocomplete="off" value="{{ \App\Models\Location::find($advertisement->location_id)->name}}">
                            <input type="hidden" id="location_id" name="location_id" value="{{ $advertisement->location_id }}">
                            <div id="locationSuggestions" class="suggestions-container"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Services and Pricing:</label>
                        <div id="pricingTable">
                            <!-- Load existing services -->
                            @foreach($advertisement->services as $index => $service)
                                <div class="row mb-2" id="pricingRow{{ $index }}">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="services[]" placeholder="Service Name" value="{{ $service->service_name }}" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" class="form-control" name="prices[]" placeholder="Price" value="{{ $service->price }}" required>
                                    </div>
                                    <div class="col-md-2">
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" onclick="addPricingRow()">+</button>
                                        @else
                                            <button type="button" class="btn btn-danger" onclick="removePricingRow({{ $index }})">-</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn bg-darkgreen w-100">Update Advertisement</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('partials._subcategory_loader_script')
@include('partials._locations_loader_script')
@include('partials._pricing_table_script')
