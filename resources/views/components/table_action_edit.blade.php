<a href="{{ $route }}" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" data-placement="top" title="Edit">
    @if (! isset($icon))
    <i class="fa fa-pencil-alt"></i>
    @else
        {!! $icon !!}
    @endif
    {{ $text ?? null }}
</a>
