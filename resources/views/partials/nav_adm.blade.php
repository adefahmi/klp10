<li class="nav-item">
    <a class="nav-link @if ($judul == 'Dashboard') active @endif" aria-current="page"
        href="{{ route('admin-dashboard') }}">Dashboard</a>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
        role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Master Data
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('tipekamar.index') }}">Tipe Kamar</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('room.index') }}">Kamar</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('laporan.index') }}">Laporan</a>
        </li>
    </ul>
</li>
