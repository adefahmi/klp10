<form action="{{ $action }}" method="post">
    @csrf
    @method('DELETE')
    <div class="btn-group items-push">
        <a href="{{ $route }}"
            class="btn btn-sm btn-primary"
            data-toggle="tooltip"
            data-placement="top"
            title="Edit">
            Edit
        </a>

        <button
            class="btn btn-sm btn-danger delete-confirm"
            data-toggle="tooltip"
            data-placement="top"
            title="Delete"
            data-name="{{ $data ?? 'Ini' }}" >
            Delete
        </button>
    </div>

</form>
