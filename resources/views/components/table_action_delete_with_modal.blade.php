<button type="button" data-toggle="modal" formaction="{{ $action }}"
        @foreach ($data as $key => $datum)
            {{ "$key=$datum" }}
        @endforeach
        class="btn btn-sm btn-danger js-tooltip-enabled" data-original-title="Delete">
        <i class="fa fa-trash"></i>
</button>
