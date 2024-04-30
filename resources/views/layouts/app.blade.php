<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(auth()->check())
            <meta name="user-id" content="{{ auth()->user()->id }}">
        @endif

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @include('include.css_links')
        @livewireStyles
    </head>
    <body>
    <div id="app">
        @livewire('navigation-menu')

        <main>
            {{ $slot }}

            @include('include.footer')

            @auth
                @include('include.chat.chat')
                @if(auth()->user()->hasVerifiedEmail())
                    <!-- Button to open chat modal -->
                    <button type="button" class="btn bg-darkgreen chat-icon"
                            data-bs-toggle="modal"
                            data-bs-target="#chatModal">
                        <i class="fas fa-comments"></i>
                    </button>
                @else
                    <!-- Button to open email verification modal -->
                    <button type="button" class="btn bg-darkgreen chat-icon"
                            data-bs-toggle="modal"
                            data-bs-target="#emailVerificationModal">
                        <i class="fas fa-comments"></i>
                    </button>
                @endif

                @include('include.unverified_user_alert')
            @endauth



        </main>
    </div>
    </body>
</html>
