<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Barang::create([
            'nama_barang' => 'Laptop',
            'id_jenis' => 1,
            'harga_barang' => 10000000,
            'stok_barang' => 10,
        ]);
    }
}
