<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('barang')->get();

        return view('barangMasuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('barangMasuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'nama_barang_masuk' => 'required|string|max:255',
            'jumlah_masuk' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('barangMasuk.index')->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    public function show(BarangMasuk $barangMasuk)
    {
        return view('barangMasuk.show', compact('barangMasuk'));
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::all();

        return view('barangMasuk.edit', compact('barangMasuk', 'barangs'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'nama_barang_masuk' => 'required|string|max:255',
            'jumlah_masuk' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $barangMasuk->update($request->all());

        return redirect()->route('barangMasuk.index')->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();

        return redirect()->route('barangMasuk.index')->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
