@php
    $this->title = 'Buat Kategori';
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
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="control-label">Nama Kategori</label>
                            <input type="text" name="kategori" class="form-control" required>
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