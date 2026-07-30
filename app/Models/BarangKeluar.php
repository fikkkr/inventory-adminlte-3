<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    //
    protected $table = 'barang_keluars';

    protected $fillable = [
        'id_barang',
        'jumlah_keluar',
        'tanggal_keluar',
    ];
}
