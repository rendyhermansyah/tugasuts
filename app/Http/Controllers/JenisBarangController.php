<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Jenis Barang',
            'data_jenis' => JenisBarang::all()
        );
        return view('admin.master.jenisbarang.list', $data);
    }

    public function store(Request $request)
    {
        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect('/jenisbarang')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        JenisBarang::where('id', $id)
            ->update([
                'nama_jenis' => $request->nama_jenis,
            ]);
        return redirect('/jenisbarang')->with('success', 'Berhasil update Data');
    }

    public function delete($id)
    {
        JenisBarang::where('id', $id)->delete();
        return redirect('/jenisbarang')->with('success', 'Data berhasil dihapus');
    }
}
