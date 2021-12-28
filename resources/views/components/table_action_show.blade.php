<a href="{{ $route }}" class="btn btn-sm btn-secondary">
    @if (! isset($icon))
    <i class="fa fa-eye"></i>
    @else
        {!! $icon !!}
    @endif
    {{ $text ?? null }}
</a>
