<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Auth;

class RoomController extends Controller
{
    public function room() {
        $admin = Tamu::all();
        $judul = "List Kamar";
        $kamars = Kamar::orderBy('id','desc')->paginate(3);

        return view('room.index', compact('judul', 'kamars', 'admin'));

    }

    public function addnewroom() {
        $judul = "Tambah Kamar";
        $kamars = Kamar::orderBy('id','asc')->get();
        $tipekamars = TipeKamar::get()->pluck('nama', 'id');
        return view ('room.create', compact('judul', 'kamars', 'tipekamars'));
    }

    public function savenewroom (Request $request) {
        $judul = "Simpan Kamar";
        $kamars = Kamar::orderBy('id','asc')->get();

        $request->validate([
            'nama'=>'required',
            'tipe_kamar_id'=>'required',
            'harga'=>'required|integer',
            'stok_tersedia'=>'required|integer|max:50',
            'fasilitas'=>'required|max:100',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:600',
            'kapasitas_kamar'=>'required|max:50',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $data = $request->except('image');
        $data['image'] = $imageName;

        Kamar::create($data);

        return redirect(route('room.index'))->with([
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
        $tipekamars = TipeKamar::get()->pluck('nama', 'id');

        return view('room.edit', compact('judul','kamar', 'kamars', 'tipekamars'));
    }

    public function saveeditroom (Request $request, Kamar $kamar) {
        $judul = "Simpan Edit Kamar";

        $request->validate([
            'nama'=>'required',
            'tipe_kamar_id'=>'required',
            'harga'=>'required|integer',
            'stok_tersedia'=>'required|integer|max:50',
            'fasilitas'=>'required|max:100',
            'image'=>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:600',
            'kapasitas_kamar'=>'required|max:50',
        ]);

        $data = $request->except('image');

        // dd($kamars);
        //mengecek image, apakah user memasukan image yang baru
        //jika image baru tidak dimasukkan, gunakan image lama yang disimpan di hidden field
        if($request->has('image')) {
            //jika user memasukan image baru, proses image ini dan simpan di folder server
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;

            //hapus image lama dari server karena  user telah memasukan image yang baru
            if(File::exists(public_path('images/'.$request->imageHide))){
                File::delete(public_path('images/'.$request->imageHide));
            }
        }

        $kamar->update($data);

        return redirect(route('room.index'))->with([
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

        return redirect(route('room.index'))->with([
            'successful_message' => 'Room has been removed successfully!',
        ]);
    }

}
