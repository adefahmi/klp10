@extends('layout.app')

@section('contents')
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <input type="text" id="quantity_max" value="{{ $kamar->stok_tersedia }}" hidden>
    <a href="{{ route('booking-listkamar') }}" style="text-decoration: none">
        <h4 class="centerTitle"><i class="bi bi-arrow-left"></i> Kembali</h4>
    </a>
    <h1 class="centerTitle" id="pesan" style="text-align:center">Form Pemesanan</h1>
    <hr>
    <h3>Detail Pemesanan</h3>
    <form action="{{ route('booking-simpanpesan') }}" method="POST">
        @csrf
        <input type="text" name="kamar_id" value="{{ $kamar->id }}" hidden>
        <input type="text" name="kamar_harga" value="{{ $kamar->harga }}" hidden>
        <div class="container">
            <div class="row">
                <div class="col-md-6 contentLeft">
                    <img src="/images/{{ $kamar->image }}" width="490" style="align-content: center">
                </div>

                <div class="col-md-5 contentRight">

                    <div class="card">
                        <h2 id="{{ $kamar->tipe }}">&nbsp;{{ $kamar->tipe }}</h2>
                        <div class="card-body">

                            <table>
                                <tr>
                                    <td>Kapasitas : </td>
                                    <td>{{ $kamar->kapasitas_kamar }}</td>
                                </tr>
                                <tr>
                                    <td>Fasilitas : </td>
                                    <td>{{ $kamar->fasilitas }}</td>
                                </tr>
                                <tr>
                                    <td>Harga : </td>
                                    <td>Rp{{ $kamar->harga }},- / malam</td>
                                </tr>
                                <tr>
                                    <td>Ketersediaan : </td>
                                    <td>{{ $kamar->stok_tersedia }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai: </td>
                                    <td><input type="text" id="datepicker1" size="11" name="tanggal_mulai"
                                            autocomplete='off'>
                                        @error('tanggal_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal
                                        Akhir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td><input type="text" id="datepicker2" size="11" name="tanggal_akhir"
                                            autocomplete='off'>
                                        @error('tanggal_akhir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Kamar</td>
                                </tr>
                                <tr>
                                    <td class="cart-product-quantity" width="70px">
                                        @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="input-group quantity">
                                            <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                                <span class="input-group-text">-</span>
                                            </div>
                                            <input type="text" class="qty-input form-control" min="1"
                                                max="{{ $kamar->stok_tersedia }}" value="1" name="quantity">
                                            <div class="input-group-append increment-btn" style="cursor: pointer">
                                                <span class="input-group-text">+</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-2 mx-2">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

@endsection
