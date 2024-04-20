<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(auth()->check())
            <meta name="user-id" content="{{ auth()->user()->id }}">
        @endif

        <title>@yield('title','Custom Auth Laravel')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        @include('include.css_links')
    </head>


    <body>
        @include('navigation-menu')

        @yield('content')

        @include('include.chat.chat')

        @include('include.footer')

        @auth
            <button type="button" class="btn bg-darkgreen chat-icon" data-bs-toggle="modal" data-bs-target="#chatModal">
                <i class="fas fa-comments"></i>
            </button>

        @endauth

        <div class="overlay"></div>


    </body>

</html>
