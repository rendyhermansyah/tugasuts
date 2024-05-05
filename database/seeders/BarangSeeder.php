<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'id_jenis' => 1,
            'nama_barang' => 'Barang 1',
            'harga' => 10000,
            'stock' => 10,
            'description' => 'Aaaaa'
        ]);

        Barang::create([
            'id_jenis' => 2,
            'nama_barang' => 'Barang 2',
            'harga' => 20000,
            'stock' => 20,
            'description' =>'BBBBbb'
        ]);

    }
}
