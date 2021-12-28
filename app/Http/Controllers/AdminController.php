<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Booking_Detail;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $judul = "Dashboard";
        $kamars = Kamar::orderBy('id','asc')->get();
        $booking_current = Booking_Detail::where('status', 'Belum Terbayar')
        ->orWhere('status', 'Verifikasi')
        ->join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
        ->join('kamars', 'booking_details.kamar_id', '=', 'kamars.id')
        ->join('tamus', 'bookings.tamu_id', '=', 'tamus.id')
        ->orderBy('booking_details.created_at', 'desc')
        ->select('booking_details.id AS booking_detail_id', 'bookings.*', 'booking_details.*', 'kamars.*', 'tamus.*')
        ->get();
        
        
        $booking_history = Booking_Detail::where('status', 'Terbayar')
        ->orWhere('status', 'Gagal')
        ->orWhere('status', 'Selesai')
        ->join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
        ->join('kamars', 'booking_details.kamar_id', '=', 'kamars.id')
        ->join('tamus', 'bookings.tamu_id', '=', 'tamus.id')
        ->orderBy('booking_details.created_at', 'desc')
        ->select('booking_details.id AS booking_detail_id', 'bookings.*', 'booking_details.*', 'kamars.*', 'tamus.*')
        ->get();

        
        return view('admin', compact('judul', 'kamars', 'booking_current', 'booking_history'));
    }

    public function verifTerima(Request $request)
    {
        $booking_detail = Booking_Detail::find($request->input('booking_id'));
        $booking = Booking::find($request->input('booking_id'));
        $booking_detail->status = 'Terbayar';
        $booking_totaltransaksi = $booking->total_transaksi;
        $booking->total_berbayar = $booking_totaltransaksi;
        $booking_detail->save();
        $booking->save();
        return redirect()->route('admin-dashboard')->with(['successful_message'=> 'Penerimaan Verifikasi Sukses']);
    }

    public function verifTolak(Request $request)
    {
        $booking_detail = Booking_Detail::find($request->input('booking_id'));
        $booking_detail->status = 'Verifikasi Ditolak';
        if(File::exists(public_path('images/bukti/'.$booking_detail->bukti_transfer))){
            File::delete(public_path('images/bukti/'.$booking_detail->bukti_transfer));
        }
        $booking_detail->save();
        
        return redirect()->route('admin-dashboard')->with(['successful_message'=> 'Penolakan Verifikasi Sukses']);
    }

    public function gagal($booking_detail_id)
    {
        $booking_detail = Booking_Detail::find($booking_detail_id);
        $booking_detail->status = 'Gagal';
        if(File::exists(public_path('images/bukti/'.$booking_detail->bukti_transfer))){
            File::delete(public_path('images/bukti/'.$booking_detail->bukti_transfer));
        }
        $booking_detail->save();
        
        $kamar = Kamar::find($booking_detail->kamar_id);
        $kamar->stok_tersedia = $kamar->stok_tersedia + $booking_detail->quantity;
        $kamar->save();

        return redirect()->route('admin-dashboard')->with(['successful_message'=> 'Penggagalan Booking Sukses']);
    }

    public function selesai($booking_detail_id)
    {
        $booking_detail = Booking_Detail::find($booking_detail_id);
        $booking_detail->status = 'Selesai';
        $booking_detail->save();
        
        $kamar = Kamar::find($booking_detail->kamar_id);
        $kamar->stok_tersedia = $kamar->stok_tersedia + $booking_detail->quantity;
        $kamar->save();

        return redirect()->route('admin-dashboard')->with(['successful_message'=> 'Penyelesaian Booking Sukses']);
    }
}