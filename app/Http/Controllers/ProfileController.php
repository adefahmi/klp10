<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $judul = "Profile";
        $tamus = Tamu::where('nama','=','{{ auth()->user()->nama }}');
        $kamars = Kamar::orderBy('id','asc')->get();
        return view('profile.profile', compact('judul', 'tamus', 'kamars'));
    }

    public function edit(){
        $judul = "Profile";
        $kamars = Kamar::orderBy('id','asc')->get();
        return view('profile.edit',compact('judul', 'kamars'));
    }
    
    public function update(Request $request) {
        $key = $request->validate([
            'pengenal' => ['required','max:255'],
            'nomor_pengenal' => ['required','integer',\Illuminate\Validation\Rule::unique('tamus')->ignore(auth()->user()->id)],
            'nama' => ['required','min:2','max:255'],
            'alamat' => ['required','min:10'],
            'telepon' => ['required','numeric'],
            'email' => ['required','min:5',\Illuminate\Validation\Rule::unique('tamus')->ignore(auth()->user()->id),'email:dns'],
            'password' => ['required','min:5'],
            'repassword' => ['required','same:password'],
        ]);

        $key['password'] = bcrypt($key['password']);
        $hashedpass = $key['password'];

        auth()->user()->update([
            'pengenal' => $request-> pengenal,
            'nomor_pengenal' => $request-> nomor_pengenal,
            'nama' => $request-> nama,
            'alamat' => $request-> alamat,
            'telepon' => $request-> telepon,
            'email' => $request-> email,
            'password' => $hashedpass,
            'repassword' => $request-> repassword,
        ]);

        return redirect()->route('profile-profile')->with('success', 'Success!');
    }
}