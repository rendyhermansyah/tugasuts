<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Barang',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => Barang::join('tbl_jenis_barang', 'tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
                ->select('tbl_barang.*', 'tbl_jenis_barang.nama_jenis')->get()
        );
        return view('admin.master.barang.list', $data);
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);

        return view('admin.master.barang.modal_show', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'id_jenis' => 'required',
            'harga' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'id_jenis' => $request->id_jenis,
            'harga' => $request->harga,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'id_jenis' => 'required',
            'harga' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        Barang::where('id', $id)
            ->update([
                'id_jenis' => $request->id_jenis,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'description' => $request->description,
                'stock' => $request->stock,
            ]);

        return redirect('/barang')->with('success', 'Berhasil update Data');
    }

    public function delete($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('/barang')->with('success', 'Data berhasil dihapus');
    }
}
