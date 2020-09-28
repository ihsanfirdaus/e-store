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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->post('process') == 'create') {
            $model = new Produk();
            $message = 'Berhasil menambahkan data produk';
        } elseif ($request->post('process') == 'edit') {
            $model = Produk::find($request->produk_id);
            $message = 'Berhasil mengubah data produk';
        }
        $model->nama = $request->nama;
        $model->id_kategori = $request->id_kategori;
        $model->slug = Str::slug($request->nama . '-');
        $model->deskripsi = $request->deskripsi;
        $model->warna = $request->warna;
        $model->harga = str_replace('.','',$request->harga);
        $model->berat = $request->berat;

        $gambar = $request->file('gambar');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Produk::FindOrFail($id);

        return view('/admin/produk/edit', [
            'produk' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Produk::FindOrFail($id);
        $model->nama = $request->nama;
        $model->slug = Str::slug($request->nama . '-');
        $model->deskripsi = $request->deskripsi;
        $model->warna = $request->warna;
        $model->harga = $request->harga;
        $model->berat = $request->berat;

        $gambar = $request->file('gambar');

        if ($gambar != null) {
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('/assets/gambar/'), $filename);
            $model->gambar = $filename;
        }

        $model->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diedit');
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
