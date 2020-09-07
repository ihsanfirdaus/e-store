@php
    $this->title = 'Buat Produk';
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
    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="control-label">Nama produk</label>
                            <input type="text" name="produk" class="form-control" required>
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