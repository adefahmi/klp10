<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Booking_Detail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PemesanankuController extends Controller
{
    public function index() {
        $judul = "Pemesananku";
        $kamars = Kamar::orderBy('id','asc')->get();
        $booking_detail = Booking::where('tamu_id', auth()->user()->id)
        ->join('booking_details', 'booking_details.booking_id', '=', 'bookings.id')
        ->join('kamars', 'booking_details.kamar_id', '=', 'kamars.id')
        ->orderBy('bookings.created_at', 'desc')
        ->select('booking_details.id AS booking_detail_id', 'bookings.*', 'booking_details.*', 'kamars.*')
        ->get();
        return view('pemesananku', compact('judul', 'kamars', 'booking_detail'));
    }

    public function generateOrderNR(){
        $orderObj = Booking::select('kode_booking')->latest('kode_booking')->first();
        if ($orderObj) {
            $orderNr = $orderObj->kode_booking;
            $removed1char = substr($orderNr, 1);
            $generateOrder_nr = $stpad = '#' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = '#' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }
        return $generateOrder_nr;
    }

    public function pesan($kamar_id) {
        $judul = "Pesan";
        $kamar = Kamar::find($kamar_id);
        $kamars = Kamar::orderBy('id','asc')->get();

        // $mytime = Carbon::now()->format('Y-m-d');
        // $booking = new Booking();
        // $booking->kode_booking = $this->generateOrderNR();
        // $booking->tamu_id = auth()->user()->id;
        // $booking->tanggal_booking = $mytime;
        // $booking->save();
        
        return view('pesan', compact('judul', 'kamar', 'kamars'));
    }

    public function simpanpesan(Request $request) {
        $key = $request->validate([
            'tanggal_mulai' => 'required|date|after:yesterday',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'quantity' => 'required|min:1|max:255',
        ]);
        // $kamar = Kamar::find($kamar_id);
        // $kamars = Kamar::orderBy('id','asc')->get();
        $tanggal_mulai = strtotime($request->input('tanggal_mulai'));
        $tanggal_akhir = strtotime($request->input('tanggal_akhir'));
        $hari_menginap = $tanggal_akhir - $tanggal_mulai;
        $hari_menginap = $hari_menginap / 86400;
        $quantity = (int) $request->input('quantity');
        $kamar_harga = (int) $request->input('kamar_harga');
        $transaksi = $kamar_harga * $quantity * $hari_menginap;


        $mytime = Carbon::now()->format('Y-m-d');
        $booking = new Booking();
        $booking->kode_booking = $this->generateOrderNR();
        $booking->tamu_id = auth()->user()->id;
        $booking->tanggal_booking = $mytime;
        $booking->total_transaksi = $transaksi;
        $booking->save();
        
        // $kamars = Kamar::orderBy('id','asc')->get();
        
        $booking_detail = new Booking_Detail();
        $booking_detail->booking_id = $booking->id;
        $booking_detail->tanggal_mulai = date('Y-m-d',strtotime($request->input('tanggal_mulai')));
        $booking_detail->tanggal_akhir = date('Y-m-d',strtotime($request->input('tanggal_akhir')));
        $booking_detail->quantity = $quantity;
        $booking_detail->kamar_id = $request->input('kamar_id');
        $booking_detail->save();

        $kamar = Kamar::find($booking_detail->kamar_id);
        $kamar->stok_tersedia = $kamar->stok_tersedia - $quantity;
        $kamar->save(); 

        
        return redirect()->route('booking-pemesananku')->with('success', 'Pemesanan Sukses, Selesaikan Pembayaran');
    }

    public function bayar(Request $request) {
        $rules = [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:600',
        ];
 
        $messages = [
            'image.required' => 'Image is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $booking_detail = Booking_Detail::find($request->input('booking_id'));
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/bukti'), $imageName);
        $booking_detail->bukti_transfer = $imageName;
        $booking_detail->status = 'Verifikasi';
        $booking_detail->save();

        return redirect()->route('booking-pemesananku')->with(['success'=> 'Pembayaran Sukses']);
    }
}