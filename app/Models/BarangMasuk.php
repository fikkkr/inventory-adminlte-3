<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //
    protected $table = 'barang_masuks';

    protected $fillable = [
        'id_barang',
        'jumlah_masuk',
        'tanggal_masuk',
    ];
}
