<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Tamu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Auth;

class RoomController extends Controller
{
    public function room() {
        $admin = Tamu::all();
        $judul = "List Kamar";
        $kamars = Kamar::orderBy('id','desc')->get();

        return view('room.index', compact('judul', 'kamars', 'admin')); 

    }

    public function addnewroom() {
        $judul = "Tambah Kamar";
        $kamars = Kamar::orderBy('id','asc')->get();
        $formdata = [
            'tipe' => ['select', "Room Type", ['Standar', 'Suite', 'Deluxe']],
            'harga'=> ['text', "Room Price"],
            'stok_tersedia'=> ['text', "Room Availability"],
            'fasilitas'=> ['text', "Room Facility"],
            'image'=> ['file', "Room Image"],
            'kapasitas_kamar'=> ['text', "Room Capacity"],
        ];
        return view ('room.add', compact('judul', 'kamars', 'formdata'));
    }

    public function savenewroom (Request $request) {
        $judul = "Simpan Kamar";
        $kamars = Kamar::orderBy('id','asc')->get();
        $rules = [
            'tipe'=>'required',
            'harga'=>'required|integer|max:50',
            'stok_tersedia'=>'required|integer|max:50',
            'fasilitas'=>'required|max:100',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:600',
            'kapasitas_kamar'=>'required|max:50',
        ];
 
        $messages = [
            'tipe.required' => 'Name is required.',
            'harga.required' => 'Price is required.',
            'stok_tersedia.required' => 'Availability is required.',
            'fasilitas.required' => 'Facility is required.',
            'image.required' => 'Image is required.',
            'kapasitas_kamar.required'=>'Capacity is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);

        $kamars = new Kamar;
        $kamars->tipe = $request->tipe;
        $kamars->harga = $request->harga;
        $kamars->stok_tersedia = $request->stok_tersedia;
        $kamars->fasilitas = $request->fasilitas;
        $kamars->image = $imageName;
        $kamars->kapasitas_kamar = $request->kapasitas_kamar;
        
        $kamars->save();

        return redirect(route('booking-hotel'))->with([
            'successful_message' => 'New room has been added successfully!',
        ], compact('judul', 'kamars'));
    }

    public function detailroom ($id) {
        $judul = "Detail Kamar";
        $kamar = Kamar::find($id);
        $kamars = Kamar::orderBy('id','asc')->get();
        return view('room.detail', compact('judul','kamar', 'kamars')); 
    }

    public function editroom ($id) {
        $judul = "Edit Kamar";
        $kamar = Kamar::find($id);
        $kamars = Kamar::orderBy('id','asc')->get();
        $formdata = [
            'tipe' => ['select', "Room Type", ['Standar', 'Suite', 'Deluxe']],
        ];
        return view('room.edit', compact('judul','kamar', 'kamars', 'formdata')); 
    }

    public function saveeditroom (Request $request, $id) {
        $judul = "Simpan Edit Kamar";

        $kamars = Kamar::find($id);
        $kamars->tipe = $request->tipe;
        $kamars->harga = $request->harga;
        $kamars->stok_tersedia = $request->stok_tersedia;
        $kamars->fasilitas = $request->fasilitas;
        $kamars->kapasitas_kamar = $request->kapasitas_kamar;

        // dd($kamars);
        //mengecek image, apakah user memasukan image yang baru
        //jika image baru tidak dimasukkan, gunakan image lama yang disimpan di hidden field
        if($request->image=='') {
            $kamars->image = $request->imageHide;
        } else {
            //jika user memasukan image baru, proses image ini dan simpan di folder server
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $kamars->image = $imageName;

            //hapus image lama dari server karena  user telah memasukan image yang baru
            if(File::exists(public_path('images/'.$request->imageHide))){
                File::delete(public_path('images/'.$request->imageHide));
            }
        }

        $kamars->save();

        return redirect(route('admin-dashboard'))->with([
            'successful_message' => 'Room has been edited successfully!',
        ], compact('judul'));

    }

    public function deleteroom($id){
        $kamars = Kamar::find($id);

        //mencari nama image dari animal yang dimasukan di database
        $imageName = Kamar::find($id, ['image']);

        //jika image ditemukan di folder server, hapus gambar!
        if(File::exists(public_path('images/'.$imageName['image']))){
            File::delete(public_path('images/'.$imageName['image']));
        }

        //hapus data di database
        $kamars->delete();

        return redirect(route('booking-hotel'))->with([
            'successful_message' => 'Room has been removed successfully!',
        ]);
    }

}