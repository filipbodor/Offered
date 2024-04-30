<x-app-layout>
    <div class="container-fluid">

        <div class="row">
            <!-- Sidebar Column -->
            @include('advertisements.include.sidebar')

            <!-- Advertisements Column -->
            <div class="col-md-9 mt-5">
                @include('advertisements.include.filter_form')
                <div class="row">
                    @foreach ($advertisements as $advertisement)
                        @include('advertisements.include.advertisement_card')
                    @endforeach
                </div>
                <div class="row mt-4 mb-4 col-xl-10">
                    <div class="pagination-slider">
                        {{ $advertisements->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials._clickable_card_script')
