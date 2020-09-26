@php
    $this->title = 'Daftar Kategori';
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('kategori.create') }}" class="btn btn-success btn-md"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">Slug</th>
                            <th style="text-align: center">Aksi</th>
                        </thead>
                        <tbody id="tableBody">
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $("#datatable").DataTable({
                "processing": true,
                "ajax": {
                    "url": '{{ url('api/get-kategori') }}',
                    "dataSrc": ""
                },
                "columns": [
                    {"data" : "nama"},
                    {"data" : "slug"},
                    {
                        mRender: function (data, type, row) {
                            return '<div style="text-align:center">'+
                                        '<a href="" data-id="' + row.id + '" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a> &nbsp;'+ 
                                        '<a href="" data-id="' + row.id + '"><i class="fa fa-trash-alt" data-toggle="tooltip" title="Hapus"></i></a>'+
                                    '</div>';
                        }
                    }
                ]
                
            });

        })
    </script>
@endsection