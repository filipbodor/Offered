<nav class="navbar navbar-expand-lg navbar-dark shadow header">
    <a class="navbar-brand" href="{{ route('home') }}"><img class="offered-logo" src="{{ asset('images/header_logo3.png') }}" alt="Offered Logo"></a>
    <button class="navbar-toggler first-button" type="button" data-bs-toggle="collapse" data-bs-target="#customNavbarResponsive"
            aria-controls="customNavbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon"><span></span><span></span><span></span></div>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="customNavbarResponsive">
        <ul class="navbar-nav bg-white">
            @auth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Odhlásiť</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('advertisements.create') }}">Ponúknuť</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('profile.show', auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Prihlásiť</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registujte sa</a>
                </li>
            @endauth
        </ul>

    </div>
</nav>
