@php
    $this->title = 'Edit Produk';
@endphp

@extends('layouts.backend.main')

@push('title')
    {{ $this->title }}
@endpush

@push('breadcump-title')
    {{ $this->title }}
@endpush

@section('content')
    <div class="container">
        <form action="{{route('produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="control-label">Nama produk</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="control-label">Gambar</label>
                                <input type="file" name="gambar" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="control-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="warna" class="control-label">Warna</label>
                                <input type="text" name="warna" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="harga" class="control-label">Harga</label>
                                <input type="text" name="harga" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="berat" class="control-label">Berat</label>
                                <input type="text" name="berat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection