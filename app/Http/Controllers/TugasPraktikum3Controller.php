<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Transaksi;
use Illuminate\Http\Request;

class TugasPraktikum3Controller extends Controller
{
    public function index(Request $request)
    {   
        $transaksi = Transaksi::select('pelanggan.nama as nama_pelangagan','barang.nama','barang.harga')
                            ->join('pelanggan', 'pelanggan.id', '=', 'transaksi.id_pelanggan')
                            ->join('barang', 'barang.id', '=', 'transaksi.id_barang')
                            ->get();

        $query = Barang::select('id', 'nama','harga');
        
        if($request->has("search")){
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        
        $tugas_praktikum = $query->get();

        return view('index_0067', compact('tugas_praktikum', 'transaksi'));
    }

    public function create()
    {
        return view('tugas_parktikum3_0067');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'harga'    => 'required|max:6'
        ]);
        
        $tugas_praktikum        = new Barang;
        $tugas_praktikum->nama  = $request->nama;
        $tugas_praktikum->harga = $request->harga;  
        
        if ($tugas_praktikum->save()) {
            alert()->html('Barang', "Berhasil disimpan", 'success');
        } else {
            alert()->html('Barang', "Gagal disimpan", 'error');
        }

        return redirect('tugas_praktikum3');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tugas_praktikum = Barang::find($id);
        return view('tugas_parktikum3_0067', compact('tugas_praktikum'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'harga'    => 'required|max:6'
        ]);

        $tugas_praktikum        = Barang::find($id);
        $tugas_praktikum->nama  = $request->nama;
        $tugas_praktikum->harga = $request->harga;  
        
        if ($tugas_praktikum->save()) {
            alert()->html('Barang', "Berhasil diupdate", 'success');
        } else {
            alert()->html('Barang', "Gagal diupdate", 'error');
        }

        return redirect('tugas_praktikum3');
    }

    public function destroy($id)
    {
        if (Barang::find($id)->delete()) {
            alert()->html('Barang', "Berhasil diupdate", 'success');
        } else {
            alert()->html('Barang', "Gagal diupdate", 'error');
        }

        return redirect()->back();
    }
}
