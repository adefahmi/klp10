<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanDataTable;
use App\Models\Booking_Detail;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(LaporanDataTable $dataTable)
    {
        $judul = "Home";
        $tipekamars = TipeKamar::get()->pluck('nama', 'id');
        $kamars = Kamar::get()->pluck('nama', 'id');
        $statuss = [
            'Verifikasi',
            'Selesai',
            'Terbayar',
            'Gagal',
            'Verifikasi Ditolak',
            'Belum Terbayar',
        ];

        return $dataTable->render('laporan.index', compact(
            'judul',
            'tipekamars',
            'kamars',
            'statuss',
        ));
    }
}
