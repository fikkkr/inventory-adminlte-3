<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangKeluar = BarangKeluar::all();
        return view('barangKeluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barangKeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_barang' => 'required',
            'jumlah_keluar' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
        return view('barangKeluar.show', compact('barangKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
        return view('barangKeluar.edit', compact('barangKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
        $request->validate([
            'id_barang' => 'required',
            'jumlah_keluar' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
        $barangKeluar->delete();
        return redirect()->route('barangKeluar.index')->with('success', 'Barang Keluar deleted successfully');
    }
}
