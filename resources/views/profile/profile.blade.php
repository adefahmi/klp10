@extends('layout.app')

@section('contents')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px"
                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                    class="font-weight-bold">{{ auth()->user()->nama }}</span><span
                    class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-9">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Akun Saya</h4>
                </div>

                <div class="row mt-1"><label class="labels">Pengenal</label></div>
                <input type="text" class="form-control @error('pengenal') is-invalid @enderror" name="pengenal"
                    id="floatingInput" value="{{ auth()->user()->pengenal }}" readonly>
                @error('pengenal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Nomor Pengenal</label></div>
                <input type="text" class="form-control @error('nomor_pengenal') is-invalid @enderror" name="nomor_pengenal"
                    id="floatingInput" value="{{ auth()->user()->nomor_pengenal }}" readonly>
                @error('nomor_pengenal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Nama</label></div>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="floatingInput"
                    value="{{ auth()->user()->nama }}" readonly>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Alamat</label></div>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    id="floatingInput" value="{{ auth()->user()->alamat }}" readonly>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Telepon</label></div>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                    id="floatingInput" value="{{ auth()->user()->telepon }}" readonly>
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Email</label></div>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput"
                    value="{{ auth()->user()->email }}" readonly>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="row mt-2"><label class="labels">Password</label></div>
                <input type="password" class="form-control @error('repassword') is-invalid @enderror" name="repassword"
                    id="floatingInput" value="{{ auth()->user()->repassword }}" readonly>
                @error('repassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <a type="button" class="btn btn-primary mt-5" href="{{ route('profile-edit') }}">Sunting Akun</a>
            </div>
        </div>
    </div>
@endsection
