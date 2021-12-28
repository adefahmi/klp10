@extends('layout.app')
{{-- @dd($booking_detail) --}}
@section('contents')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h1 class="alert alert-secondary text-center mt-3" style="text-center">PEMESANAN ANDA</h1>
                        </div>
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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-secondary">
                                    <th>
                                        Jenis Kamar
                                    </th>
                                    <th>
                                        Kuantitas
                                    </th>
                                    <th>
                                        Harga
                                    </th>
                                    <th>
                                        Lamanya Menginap
                                    </th>
                                    <th>
                                        Subtotal
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($booking_detail as $booking)
                                        <tr>
                                            <td>
                                                {{ $booking->tipe }}
                                            </td>
                                            <td>
                                                {{ $booking->quantity }}
                                            </td>
                                            <td>
                                                @php
                                                    $booking->harga = 'Rp' . number_format($booking->harga, 2, '.', ',');
                                                    echo $booking->harga;
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    $tanggal_mulai = strtotime($booking->tanggal_mulai);
                                                    $tanggal_akhir = strtotime($booking->tanggal_akhir);
                                                    $hari_menginap = $tanggal_akhir - $tanggal_mulai;
                                                    $hari_menginap = $hari_menginap / 86400;
                                                    echo $hari_menginap . ' Malam';
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    $booking->total_transaksi = 'Rp' . number_format($booking->total_transaksi, 2, '.', ',');
                                                    echo $booking->total_transaksi;
                                                @endphp
                                            </td>
                                            <td>
                                                @if ($booking->status == 'Belum Terbayar' || $booking->status == 'Verifikasi Ditolak')
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-id="{{ $booking->booking_detail_id }}"
                                                        data-bs-tipe="{{ $booking->tipe }}"
                                                        data-bs-tanggal_mulai="{{ $booking->tanggal_mulai }}"
                                                        data-bs-tanggal_akhir="{{ $booking->tanggal_akhir }}"
                                                        data-bs-quantity="{{ $booking->quantity }}"
                                                        data-bs-harga="{{ $booking->harga }}"
                                                        data-bs-total-transaksi="{{ $booking->total_transaksi }}">{{ $booking->status }}</button>
                                                @else
                                                    {{ $booking->status }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <table>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Jenis Kamar
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-tipe"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Tanggal Mulai
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-tanggal-mulai"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Tanggal Akhir
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-tanggal-akhir"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Quantity
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-quantity"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Harga
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-harga"></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:50%">
                                                                    <h5>
                                                                        Subtotal
                                                                    </h5>
                                                                </td>
                                                                <td style="width:10%">
                                                                    <h5>=</h5>
                                                                </td>
                                                                <td>
                                                                    <h5 id="booking-total-transaksi"></h5>
                                                                </td>
                                                            </tr>
                                                            <form id="formBayar" action="{{ route('booking-bayar') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="text" name="booking_id" id="booking_id" hidden>
                                                                <tr>
                                                                    <td style="width:50%">
                                                                        <h5>
                                                                            Upload Bukti
                                                                        </h5>
                                                                    </td>
                                                                    <td style="width:10%">
                                                                        <h5>=</h5>
                                                                    </td>
                                                                    <td>
                                                                        <input type="file" class="form-control" id="image"
                                                                            name="image" required>
                                                                    </td>
                                                                </tr>
                                                            </form>

                                                        </table>
                                                    </div>
                                                    <div class="col">
                                                        <img src="/img/qr_code.jpeg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="formBayar" class="btn btn-primary">Kirim Bukti
                                                Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('booking-home') }}"><button type="button"
                                class="btn btn-outline-dark">Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
