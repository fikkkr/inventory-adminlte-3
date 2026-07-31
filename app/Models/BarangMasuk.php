<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //
    protected $table = 'barangMasuks';

    protected $fillable = [
        'id_barang',
        'jumlah_masuk',
        'tanggal_masuk',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
