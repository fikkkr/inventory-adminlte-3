<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalJenis  = Jenis::count();
        $totalStok   = Barang::sum('stok_barang');

        $barangTerbaru = Barang::latest()->take(5)->get();

        $jenisTerbaru = Jenis::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalBarang',
            'totalJenis',
            'totalStok',
            'barangTerbaru',
            'jenisTerbaru'
        ));
    }
}