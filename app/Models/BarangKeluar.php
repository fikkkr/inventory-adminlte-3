<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    //
    protected $table = 'barangKeluars';

    protected $fillable = [
        'id_barang',
        'jumlah_keluar',
        'tanggal_keluar',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
