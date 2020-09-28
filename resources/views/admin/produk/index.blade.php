@php
    $this->title = 'Daftar Produk';
@endphp

@extends('layouts.backend.main')

@push('title')
    {{ $this->title }}
@endpush

@push('breadcump-title')
    <i class="fa fa-shopping-bag"></i> Produk
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="btnAdd" data-toggle="modal" class="btn btn-success btn-md"><i class="fa fa-plus-circle"></i> Tambah Produk</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <th style="text-align: center">Gambar</th>
                            <th style="text-align: center">Nama Produk</th>
                            <th style="text-align: center">Kategori</th>
                            <th style="text-align: center">Harga</th>
                            <th style="text-align: center">Aksi</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Modal-->
    @include('admin.produk._form')
<!-- /Include Modal-->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $(".rupiah").mask("000.000.000",{reverse: true});
            
            var table = $("#datatable").DataTable({
                "processing": true,
                "ajax": {
                    "url": '{{ url('api/get-produk') }}',
                    "dataSrc": ""
                },
                "columns": [
                    {
                        "orderable": false,
                        mRender: function(data, type, row) {
                            return '<img class="img-center" width="50%" src="{{ asset('assets/gambar') }}'+'/'+row.gambar+'">';
                        }
                    },
                    {"data" : "nama"},
                    {"data" : "kategori.nama"},
                    {
                        mRender: function(data, type, row) {
                            return '<div class="align-center">Rp '+row.harga+'</div>';
                        }
                    },
                    {
                        mRender: function (data, type, row) {
                            return '<div class="align-center">'+
                                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" title="Ubah" class="btnEdit"><i class="fa fa-edit"></i></a> &nbsp;'+ 
                                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" title="Hapus" class="btnDelete"><i class="fa fa-trash-alt"></i></a>'+
                                    '</div>';
                        }
                    }
                ]
            });


            // When button add on click
            $("#btnAdd").on("click", function() {
                $("#process").val('create');
                $("#modal-success").modal('show');
                $(".modal-title").html("Tambah Produk");
            });

            let dropdown = $('#selectCategory');

            dropdown.empty();

            dropdown.append('<option selected="true" disabled>- Pilih -</option>');
            dropdown.prop('selectedIndex', 0);

            const url = '{{ url('api/get-kategori') }}';

            // Populate dropdown with list of categories
            $.getJSON(url, function (response) {
                $.each(response, function (key, data) {
                    dropdown.append($('<option></option>').attr('value', data.id).text(data.nama));
                })
            });

            // When button submit or save on click
            $("#formProduk").on("submit", function(event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    url: '{{ route('produk.store') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(message){
                        $("#formProduk").trigger("reset");
                        $("#modal-success").modal('hide');
                        table.ajax.reload();
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                })
            });

            // When button delete on click
            $("body").on("click",".btnDelete", function() {
                var product_id = $(this).data('id');

                $.ajax({
                    url: "{{ route('produk.index') }}" + '/delete'+ '/' + product_id + '/',
                    type: 'GET',
                    success: function(message) {
                        table.ajax.reload();
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            });

        });
    </script>
@endsection