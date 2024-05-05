<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisBarang;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        JenisBarang::create([
            'nama_jenis' => 'K003',
        ]);

        JenisBarang::create([
            'nama_jenis' => 'K004',
        ]);

        
    }
}
