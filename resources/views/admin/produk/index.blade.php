@php
    $this->title = 'Daftar Produk';
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
                    <a href="{{ route('produk.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table_produk">
                        <thead>
                            <th>No</th>
                            <th style="text-align: center">Gambar</th>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">Deskripsi</th>
                            <th style="text-align: center">Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($produk as $data)
                                <tr>
                                    <td width="10px">{{ $no++ }}</td>
                                    <td style="text-align: center"> 
                                        <img src="{{ asset('assets/gambar/'.$data->gambar) }}" alt="" class="rounded" width="70px" height="70px">
                                    </td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kategori->nama }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('produk.edit',$data->id) }}" title="Edit" class="btn btn-sm btn-outline-warning"><i class="fa fa-pen"></i></a> &nbsp;
                                        <a href="{{ url('/admin/produk/delete/'.$data->id) }}" title="Hapus" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
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
            $("#table_produk").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
        })
    </script>
@endsection