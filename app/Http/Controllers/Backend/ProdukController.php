<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function getData()
    {
        $model = Produk::with('kategori')->latest()->get();

        return response()->json($model);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/produk/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if ($req->post('process') == 'create') {

            $model = new Produk();
            $message = 'Berhasil menambahkan data produk';

        } elseif ($req->post('process') == 'edit') {

            $model = Produk::find($req->produk_id);
            $message = 'Berhasil mengubah data produk';
            
        }

        $model->nama = $req->nama;
        $model->id_kategori = $req->id_kategori;
        $model->slug = Str::slug($req->nama . '-');
        $model->deskripsi = $req->deskripsi;
        $model->warna = $req->warna;
        $model->harga = str_replace('.','',$req->harga);
        $model->berat = $req->berat;

        $gambar = $req->file('gambar');

        if ($gambar != null) {
            $filename = date("d-M-Y") . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('/assets/gambar/'), $filename);
            $model->gambar = $filename;
        }

        if ($model->save()) {
            return response()->json($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Produk::findOrFail($id);

        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Produk::with('kategori')->findOrFail($id);
        
        return response()->json($model);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Produk::find($id);

        if($model->delete()){
            return response()->json('Berhasil menghapus data produk');
        }
    }
}
