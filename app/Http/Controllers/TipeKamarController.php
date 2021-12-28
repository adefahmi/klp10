<?php

namespace App\Http\Controllers;

use App\DataTables\TipeKamarDataTable;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TipeKamarDataTable $dataTable)
    {
        $judul = 'Tipe Kamar';
        $kamars = Kamar::orderBy('id','asc')->get();
        return $dataTable->render('tipe_kamar.index', compact('judul','kamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tipe Kamar';
        $kamars = Kamar::orderBy('id','asc')->get();

        return view('tipe_kamar.create', compact('judul','kamars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        TipeKamar::create($request->all());

        return redirect()->route('tipekamar.index')
            ->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipekamar
     * @return \Illuminate\Http\Response
     */
    public function show(TipeKamar $tipekamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipekamar
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKamar $tipekamar)
    {
        $judul = 'Tipe Kamar';
        $kamars = Kamar::orderBy('id','asc')->get();

        return view('tipe_kamar.edit', compact('tipekamar','judul','kamars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeKamar  $tipekamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKamar $tipekamar)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $tipekamar->update($request->all());

        return redirect()->route('tipekamar.index')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipeKamar  $tipekamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKamar $tipekamar)
    {
        $tipekamar->delete();

        return redirect()->route('tipekamar.index')
            ->with('success', 'Data deleted successfully');
    }
}
