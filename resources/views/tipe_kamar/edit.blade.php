@extends('layout.app')

@section('contents')
<div class="content">
    <div class="card">
        <form action="{{route('tipekamar.update', $tipekamar->id)}}" id="form-tipekamar" method="post">
            @csrf
            @method('PATCH')
        </form>

        <div class="card-header ">
            <h5 class="d-flex justify-content-between align-items-center">
                Edit Tipe Kamar
                <a class="btn btn-primary" href="{{route('tipekamar.index')}}" > Back</a>
              </h5>
        </div>
        <div class="card-body">

            @include('tipe_kamar.form')
        </div>
        <div class="card-footer">
            <div class="col-lg-12 text-right">
                <button type="submit" class="btn btn-primary" form="form-tipekamar">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

