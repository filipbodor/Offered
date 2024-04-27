<div class="search-con">
    <section class="search-sec">
        <div class="container-fluid">
            <div>
                <h1 class="font-weight h3 ">Nájdi ponuku</h1>
            </div>

            <form action="{{ route('advertisements.search') }}" method="get" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12 p-1">
                                <input type="text" class="form-control search-slt border-3" placeholder="Kľucové slová" name="keywords">
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 p-1 form-group" style="position: relative;">
                                <input type="text" class="form-control search-slt border-3" placeholder="Lokalita" name="location" id="locationInput" autocomplete="off">
                                <div id="locationSuggestions" class="suggestions-container"></div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <select class="form-control search-slt border-3" name="distance">
                                    <option value="0">0km</option>
                                    <option value="10">10km</option>
                                    <option value="20" selected>20km</option>
                                    <option value="30">30km</option>
                                    <option value="50">50km</option>
                                    <option value="100">100km</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-12 col-sm-12 p-1">
                                <button type="submit" class="btn wrn-btn rounded-3 bg-darkgreen">Hľadať</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@include('partials._locations_loader_script')
