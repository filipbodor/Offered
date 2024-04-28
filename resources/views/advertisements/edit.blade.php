<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center h2">Upraviť Inzerát</h2>
                <form method="POST" action="{{ route('advertisements.update', $advertisement->id) }}" class="p-4 border rounded shadow-sm">
                    @csrf
                    @method('PUT')

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="title" class="form-label">Názov</label>
                            <x-input type="text" class="form-control" id="title" name="title" value="{{ $advertisement->title }}" required/>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="description" class="form-label">Popis</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $advertisement->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="category" class="form-label">Kategória:</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option value="" selected disabled>Vyberte kategóriu</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $advertisement->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="subcategory" class="form-label">Podkategória:</label>
                            <select class="form-control" id="subcategory" name="subcategory_id" required>
                                <!-- Podkategórie sa načítavajú dynamicky -->
                            </select>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-12 form-group" style="position: relative;">
                            <label for="locationInput" class="form-label">Lokalita:</label>
                            <x-input type="text" class="form-control" id="locationInput" name="location" autocomplete="off" value="{{ \App\Models\Location::find($advertisement->location_id)->name}}"/>
                            <x-input type="hidden" id="location_id" name="location_id" value="{{ $advertisement->location_id }}"/>
                            <div id="locationSuggestions" class="suggestions-container"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Služby a Ceny:</label>
                        <div id="pricingTable">
                            <!-- Načítať existujúce služby -->
                            @foreach($advertisement->services as $index => $service)
                                <div class="row mb-2" id="pricingRow{{ $index }}">
                                    <div class="col-xs-12 col-sm-7 mb-2">
                                        <x-input type="text" class="form-control" name="services[]" placeholder="Služba" value="{{ $service->service_name }}" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 mb-2">
                                        <x-input type="number" class="form-control" name="prices[]" placeholder="Cena" value="{{ $service->price }}" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-2 mb-2">
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
                            <button type="submit" class="btn bg-darkgreen w-100">Aktualizovať Inzerát</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

@include('partials._subcategory_loader_script')
@include('partials._locations_loader_script')
@include('partials._pricing_table_script')
