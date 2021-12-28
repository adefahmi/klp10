<form action="{{ $action }}" method="post">
    @csrf
    @method('DELETE')
    <div class="btn-group items-push">
        <a href="{{ $show }}"
            class="btn btn-sm btn-success"
            data-toggle="tooltip"
            data-placement="top"
            title="Edit">
            <i class="fa fa-eye"></i>
        </a>

        <a href="{{ $route }}"
            class="btn btn-sm btn-primary"
            data-toggle="tooltip"
            data-placement="top"
            title="Edit">
            <i class="fa fa-pencil-alt"></i>
        </a>

        <button
            class="btn btn-sm btn-danger delete-confirm"
            data-toggle="tooltip"
            data-placement="top"
            title="Delete"
            data-name="{{ $data ?? 'Ini' }}" >
            <i class="fa fa-times"></i>
        </button>
    </div>

</form>
