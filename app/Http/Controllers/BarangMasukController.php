<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangMasuk = BarangMasuk::all();
        return view('barangMasuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barangMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_barang' => 'required',
            'jumlah_masuk' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
        return view('barangMasuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
        return view('barangMasuk.edit', compact('barangMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
        $request->validate([
            'id_barang' => 'required',
            'jumlah_masuk' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
        $barangMasuk->delete();
        return redirect()->route('barangMasuk.index')->with('success', 'Barang Masuk deleted successfully');
    }
}
