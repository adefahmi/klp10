@extends ('layout.app')

@section('contents')
    @if (session()->has('successful_message'))
        <div class="alert alert-success">
            {{ session()->get('successful_message') }}
        </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-header card-header-primary">
                    <h1 class="alert alert-secondary text-center mt-3" style="text-center">List Kamar
                    </h1>
                </div>
                @foreach ($kamars as $kamar)
                    <div class="col-md-3 justify-content-center">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="card-img py-2"><a href="{{ route('detailroom', $kamar->id) }}"><img
                                            src="/images/{{ $kamar->image }}" width="200"></a></div>
                                <div class="tipe">{{ $kamar->tipe }}</div>
                                <div class="btn btn-success my-2 mt-3"><a style="color: white"
                                        href="{{ route('editroom', $kamar->id) }}" id="btnEdit">Edit</a></div>
                                <!--
                                <div class="btn btn-danger my-2 mt-3"><a style="color: white"
                                        onclick="return confirm('Are you sure?')"
                                        href=" route('deleteroom', $kamar->id) }}">Delete</a></div>
                                -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h1 class="alert alert-secondary text-center mt-3" style="text-center">List Pemesanan Berjalan
                            </h1>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-secondary">
                                    <th>
                                        Nama Tamu
                                    </th>
                                    <th>
                                        Telepon
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Jenis Kamar
                                    </th>
                                    <th>
                                        Subtotal
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($booking_current as $booking)
                                        <tr>
                                            <td>
                                                {{ $booking->nama }}
                                            </td>
                                            <td>
                                                {{ $booking->telepon }}
                                            </td>
                                            <td>
                                                {{ $booking->email }}
                                            </td>
                                            <td>
                                                {{ $booking->tipe }}
                                            </td>
                                            <td style="text-align: right">
                                                @php
                                                    $booking->total_transaksi = 'Rp' . number_format($booking->total_transaksi, 2, '.', ',');
                                                    echo $booking->total_transaksi;
                                                @endphp
                                            </td>
                                            <td>
                                                @if ($booking->status == 'Belum Terbayar')
                                                    <button class="btn btn-secondary" disabled>
                                                        {{ $booking->status }}
                                                    </button>

                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-bs-id="{{ $booking->booking_detail_id }}"
                                                        data-bs-tipe="{{ $booking->tipe }}"
                                                        data-bs-tanggal_mulai="{{ $booking->tanggal_mulai }}"
                                                        data-bs-tanggal_akhir="{{ $booking->tanggal_akhir }}"
                                                        data-bs-quantity="{{ $booking->quantity }}"
                                                        @php
                                                            $booking->harga = 'Rp' . number_format($booking->harga, 2, '.', ',');
                                                        @endphp
                                                        data-bs-harga="{{ $booking->harga }}"
                                                        data-bs-total-transaksi="{{ $booking->total_transaksi }}"
                                                        data-bs-bukti-transfer="{{ $booking->bukti_transfer }}">{{ $booking->status }}</button>
                                                @endif
                                                <a href="{{ route('admin-gagal', $booking->booking_detail_id) }}"
                                                    class="btn btn-warning">Batalkan Booking</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
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

                                                        </table>
                                                    </div>
                                                    <div class="col">
                                                        <a href="" id="link-bukti-transfer" target="_blank">
                                                            <img src="" id="bukti-transfer" alt="" width="100%">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form id="verifikasiDiterima" action="{{ route('admin-verifikasi') }}"
                                            method="POST">
                                            @csrf
                                            <input type="text" name="booking_id" id="booking_id" hidden>
                                        </form>
                                        <form id="verifikasiDitolak" action="{{ route('admin-tolakverifikasi') }}"
                                            method="POST">
                                            @csrf
                                            <input type="text" name="booking_id" id="booking_ids" hidden>
                                        </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" form="verifikasiDitolak"
                                                class="btn btn-danger">Tolak</button>
                                            <button type="submit" form="verifikasiDiterima"
                                                class="btn btn-success">Terima</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h1 class="alert alert-secondary text-center mt-3" style="text-center">List Riwayat Pemesanan
                            </h1>
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
                                        Nama Tamu
                                    </th>
                                    <th>
                                        Telepon
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Jenis Kamar
                                    </th>
                                    <th>
                                        Subtotal
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($booking_history as $booking)
                                        <tr>
                                            <td>
                                                {{ $booking->nama }}
                                            </td>
                                            <td>
                                                {{ $booking->telepon }}
                                            </td>
                                            <td>
                                                {{ $booking->email }}
                                            </td>
                                            <td>
                                                {{ $booking->tipe }}
                                            </td>
                                            <td style="text-align: right">
                                                @php
                                                    $booking->total_transaksi = 'Rp' . number_format($booking->total_transaksi, 2, '.', ',');
                                                    echo $booking->total_transaksi;
                                                @endphp
                                            </td>
                                            <td>
                                                @if ($booking->status == 'Gagal')
                                                    <button class="btn btn-secondary" disabled>
                                                        {{ $booking->status }}
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalRiwayat"
                                                        data-bs-id="{{ $booking->booking_detail_id }}"
                                                        data-bs-tipe="{{ $booking->tipe }}"
                                                        data-bs-tanggal_mulai="{{ $booking->tanggal_mulai }}"
                                                        data-bs-tanggal_akhir="{{ $booking->tanggal_akhir }}"
                                                        data-bs-quantity="{{ $booking->quantity }}"
                                                        @php
                                                            $booking->harga = 'Rp' . number_format($booking->harga, 2, '.', ',');
                                                        @endphp
                                                        data-bs-harga="{{ $booking->harga }}"
                                                        data-bs-total-transaksi="{{ $booking->total_transaksi }}"
                                                        data-bs-bukti-transfer="{{ $booking->bukti_transfer }}">{{ $booking->status }}</button>
                                                @endif
                                                @if ($booking->status == 'Terbayar')
                                                    <a href="{{ route('admin-selesai', $booking->booking_detail_id) }}"
                                                        class="btn btn-warning">Selesaikan Pemesanan</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModalRiwayat" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Selesaikan Pemesanan</h5>
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
                                                                    <h5 id="riwayat-tipe"></h5>
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
                                                                    <h5 id="riwayat-tanggal-mulai"></h5>
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
                                                                    <h5 id="riwayat-tanggal-akhir"></h5>
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
                                                                    <h5 id="riwayat-quantity"></h5>
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
                                                                    <h5 id="riwayat-harga"></h5>
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
                                                                    <h5 id="riwayat-total-transaksi"></h5>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="col">
                                                        <a href="" id="riwayat-link-bukti-transfer" target="_blank">
                                                            <img src="" id="riwayat-bukti-transfer" alt="" width="100%">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('admin-selesai', $booking->booking_detail_id) }}"
                                                class="btn btn-warning">Selesaikan Pemesanan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection
