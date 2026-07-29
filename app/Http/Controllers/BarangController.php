<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis; // Panggil model Jenis di atas
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $jenis_barang = Jenis::all(); // Ambil data jenis
        // Kirim variabel $jenis_barang ke view menggunakan compact()
        return view('barang.create', compact('jenis_barang')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jenis_id' => 'required', // Sebaiknya gunakan jenis_id (foreign key)
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|numeric',
        ]);

        Barang::create($request->all()); // Simpan data ke database

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
    $jenis = Jenis::all(); 
    return view('barang.edit', compact('barang', 'jenis'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jenis_id' => 'required',
            'harga_barang' => 'required|numeric',
            'stok_barang' => 'required|numeric',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully');
    }
}