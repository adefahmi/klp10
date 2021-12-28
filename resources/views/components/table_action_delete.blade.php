<form action="{{ $action }}" method="post">
    @csrf
    @method('DELETE')

    <button
        class="btn btn-sm btn-danger js-tooltip-enabled delete-confirm"
        title="Delete"
        data-name="{{ $data ?? 'Ini' }}" >
        <i class="fa fa-times"></i>
    </button>

</form>
