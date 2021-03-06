@extends ('layout.app')

@section('contents')

    <main class="px-3">
        <form action="{{ route('saveeditroom', $kamar->id) }}" id="form-kamar" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        </form>

        @include('room.form')

        <button type="submit" class="btn btn-primary" form="form-kamar">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('room.index') }}">Back</a>
        <main>

        @endsection
