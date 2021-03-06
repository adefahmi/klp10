<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <a class="navbar-brand disabled" href="#"><img src="{{ asset('img/Hotel_Icon_1.png') }}"> HotelKu.com</a>
            <div class="container" id="navbarSupportedContent">
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Halo, {{ auth()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->admin != 1)
                            <li><a class="dropdown-item" href="{{ route('profile-profile') }}"><i class="bi bi-person"></i>
                                    Akun</a></li>
                            <li><a class="dropdown-item" href="/booking/pemesananku"><i class="bi bi-bell"></i>
                                    Pemesananku</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('booking-logout') }}" class="dropdown-item"><i
                                    class="bi bi-box-arrow-right"
                                    onclick="return confirm('Are you sure?')?saveandsubmit(event):'';"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-outline-primary btn-sm" aria-current="page" href="{{ route('booking-login') }}"><i
                            class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @auth
                    @if (auth()->user()->admin === 1)
                        @include('partials.nav_adm')
                    @else
                        @include('partials.nav_default')
                    @endif
                @endauth

                @guest
                    @include('partials.nav_default')
                @endguest

            </ul>
        </div>
    </ul>
    </div>
</nav>
