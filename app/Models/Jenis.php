<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    //
    protected $table = 'jenis';

    protected $fillable = [
        'jenis_barang',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_jenis', 'id');
    }
}
