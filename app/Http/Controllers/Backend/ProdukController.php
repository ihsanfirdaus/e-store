<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use File;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::orderBy('created_at','desc')->get();

        return view('admin/produk/index',[
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listKategori = Kategori::latest()->get();

        return view('admin/produk/create',[
            'listKategori' => $listKategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->slug = Str::slug($request->nama.'-');
        $produk->id_kategori = $request->id_kategori;
        $produk->deskripsi = $request->deskripsi;
        $produk->warna = $request->warna;
        $produk->harga = $request->harga;
        $produk->berat = $request->berat;

        $gambar = $request->file('gambar');
        
        if($gambar != null){
            $filename = Str::random(3).$gambar->getClientOriginalName();
            $gambar->move(public_path('/assets/gambar/'),$filename);
            $produk->gambar = $filename;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success','Produk berhasil disimpan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
