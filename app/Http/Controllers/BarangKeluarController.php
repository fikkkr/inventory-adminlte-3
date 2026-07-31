<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('barang')->get();

        return view('barangKeluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('barangKeluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'jumlah_keluar' => 'required|numeric|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        BarangKeluar::create($request->all());

        return redirect()->route('barangKeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    public function show(BarangKeluar $barangKeluar)
    {
        return view('barangKeluar.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();

        return view('barangKeluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'jumlah_keluar' => 'required|numeric|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar->update($request->all());

        return redirect()->route('barangKeluar.index')->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();

        return redirect()->route('barangKeluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
