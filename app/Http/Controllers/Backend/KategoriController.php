<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

    public function getData()
    {
        $model = Kategori::orderBy('nama','asc')->get();

        return response()->json($model);
    }
    
    public function index()
    {
        return view('admin/kategori/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/kategori/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if($request->post('process') == 'create'){

            $model = new Kategori();
            $message = 'Berhasil menambahkan data';

        }elseif($request->post('process') == 'edit'){

            $model = Kategori::find($request->kategori_id);
            $message = 'Berhasil mengubah data';

        }
        $model->nama = $request->nama;
        $model->slug = Str::slug($request->nama.'-');
        
        if($model->save()){
            return response()->json($message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Kategori::findOrFail($id);
    
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
        $model = Kategori::findOrFail($id);

        if($model->delete()){
            return response()->json('Berhasil menghapus data');
        }
    }
}
