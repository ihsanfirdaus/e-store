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
        <form action="{{route('produk.update', $produk->id)}}" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="control-label">Nama produk</label> 
                                <input type="text" value="{{$produk->nama}}" name="produk" class="form-control">  
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection