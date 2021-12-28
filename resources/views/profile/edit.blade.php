@extends('layout.app')

@section('contents')
    <div class="row">
        <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ auth()->user()->nama }}</span><span
                        class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Sunting Akun</h4>
                    </div>
                    <div class="row mt-2">Pengenal</label>
                        <select type="pengenal" name="pengenal" class="form-select @error('pengenal') is-invalid @enderror"
                            aria-label="Default select example">
                            <option selected>{{ old('pengenal', Auth::user()->pengenal) }}</option>
                            <option value="KTP">KTP</option>
                            <option value="Paspor">Paspor</option>
                        </select>
                        @error('pengenal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mt-2"><label class="labels">Nomor Pengenal</label></div>
                    <input type="text" class="form-control @error('nomor_pengenal') is-invalid @enderror"
                        name="nomor_pengenal" id="nomor_pengenal"
                        value="{{ old('nomor_pengenal', Auth::user()->nomor_pengenal) }}">
                    @error('nomor_pengenal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Nama</label></div>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="floatingInput" value="{{ old('nama', Auth::user()->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Alamat</label></div>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        id="floatingInput" value="{{ old('alamat', Auth::user()->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Telepon</label></div>
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                        id="floatingInput" value="{{ old('telepon', Auth::user()->telepon) }}">
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Email</label></div>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="floatingInput" value="{{ old('email', Auth::user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Password</label></div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="floatingInput" value="{{ old('repassword', Auth::user()->repassword) }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="row mt-2"><label class="labels">Re-Password</label></div>
                    <input type="password" class="form-control @error('repassword') is-invalid @enderror" name="repassword"
                        id="floatingInput" value="{{ old('repassword', Auth::user()->repassword) }}">
                    @error('repassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-3 mb-5" id="tombol">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a type="button" class="btn btn-danger" href="{{ route('profile-profile') }}">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
