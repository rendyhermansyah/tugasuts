<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tbl_barang';
    protected $fillable = ['nama_barang', 'id_jenis', 'stock', 'harga', 'description'];

    public function jenis()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis');
    }
}
