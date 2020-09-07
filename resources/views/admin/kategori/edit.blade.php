@php
    $this->title = 'Edit Kategori';
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
        <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="" class="control-label">Nama Kategori</label> 
                                <input type="text" value="{{$kategori->nama}}" name="kategori" class="form-control">  
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