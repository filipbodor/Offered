<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Vytvoriť ponuku</h2>
                <form method="POST" action="{{ route('advertisements.store') }}" class="p-4 border rounded shadow-sm">
                    @csrf

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="title" class="form-label">Nádpis</label>
                            <x-input type="text" class="form-control" id="title" name="title" required/>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="description" class="form-label">Popis</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Kategória:</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="subcategory" class="form-label">Pod-kategória:</label>
                            <select class="form-control" id="subcategory" name="subcategory_id" required></select>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-12 form-group" style="position: relative;">
                            <label for="locationInput" class="form-label">Lokácia:</label>
                            <x-input type="text" class="form-control" id="locationInput" name="location" autocomplete="off"/>
                            <div id="locationSuggestions" class="suggestions-container"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Služby a ceny:</label>
                        <div id="pricingTable">
                            <div class="row mb-2" id="pricingRow0">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7 mb-2">
                                        <x-input type="text" class="form-control" name="services[]" placeholder="Služba" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-3 mb-2">
                                        <x-input type="number" class="form-control" name="prices[]" placeholder="Cena" required/>
                                    </div>
                                    <div class="col-xs-6 col-sm-2 mb-2">
                                        <button type="button" class="btn btn-primary" onclick="addPricingRow()">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn bg-darkgreen w-100">Vytvoriť ponuku</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

@include('partials._subcategory_loader_without_select')
@include('partials._locations_loader_script')
@include('partials._pricing_table_script')
