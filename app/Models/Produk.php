<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama','slug','id_kategori','deskripsi','gambar','warna','harga','berat'];
}
