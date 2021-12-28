<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $judul = "Home";
        $kamars = Kamar::orderBy('id','asc')->get();
        
        return view('home', compact('judul', 'kamars'));
    }    
    
    public function listkamar() {
        $judul = "List Kamar";
        $kamars = Kamar::orderBy('id','asc')->get();
        
        return view('listkamar', compact('judul', 'kamars'));
    }

    public function about() {
        $judul = "About";
        $kamars = Kamar::orderBy('id','asc')->get();
        
        return view('about', compact('judul', 'kamars'));
    }
}