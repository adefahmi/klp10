@extends ('layout.app')

@section('contents')

    <main class="px-3">
        <form action="{{ route('savenewroom') }}" id="form-kamar" method="POST" enctype="multipart/form-data">
            @csrf
        </form>

        @include('room.form', [
                'kamar' => new \App\Models\Kamar(),
            ])

        <button type="submit" class="btn btn-primary" form="form-kamar">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('room.index') }}">Back</a>
        <main>

        @endsection
