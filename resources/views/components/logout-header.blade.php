<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
    <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i>  Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
