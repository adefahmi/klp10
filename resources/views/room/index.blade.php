@extends ('layout.app')

@section('contents')


    @if (session()->has('successful_message'))
        <div class="alert alert-success">
            {{ session()->get('successful_message') }}
        </div>
    @endif

    <div class="row mb-5">
        <div class="col-sm-3">
            <a class="btn btn-primary" href="{{ route('addnewroom') }}">Add Room</a>
        </div>
    </div>

    <div class="row">
        @foreach ($kamars as $kamar)
            <div class="col-md-3 justify-content-center">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img py-2"><a href="{{ route('detailroom', $kamar->id) }}"><img
                                    src="/images/{{ $kamar->image }}" width="200"></a></div>
                        <div class="tipe">{{ $kamar->nama ?? '-' }}</div>
                        <div class="btn btn-success my-2 mt-3"><a style="color: white"
                                href="{{ route('editroom', $kamar->id) }}" id="btnEdit">Edit</a></div>
                        <div class="btn btn-danger my-2 mt-3"><a style="color: white"
                                onclick="return confirm('Are you sure?')"
                                href="{{ route('deleteroom', $kamar->id) }}">Delete</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="d-flex justify-content-center">
            {!! $kamars->links() !!}
        </div>
    </div>

    <br>
    <br>

@endsection
