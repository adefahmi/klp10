<li class="nav-item">
    <a class="nav-link @if ($judul == 'Home') active @endif" aria-current="page"
        href="{{ route('booking-home') }}">Home</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('booking-listkamar') ? 'active' : '' }}"" href="{{ route('booking-listkamar') }}">List Kamar</a>
</li>

<li class="nav-item">
    <a class="nav-link @if ($judul == 'About') active @endif" href="{{ route('booking-about') }}">Tentang Kami</a>
</li>
