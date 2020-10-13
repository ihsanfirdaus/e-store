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
                                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-name="' + row.nama + '" data-toggle="tooltip" title="Hapus" class="btnDelete"><i class="fa fa-trash-alt"></i></a>'+
                                    '</div>';
                        }
                    }
                ]
            });


            // When button add on click
            $("#btnAdd").on("click", function() {
                $("#nama").val('');
                $("#gambar").val('');
                $("#preview").html('');
                $("#warna").val('');
                $("#berat").val('');
                $("#harga").val('');
                $("#deskripsi").val('');
                $("#product_id").val('');
                $("#selectCategory").val(0);
                $("#process").val('create');
                $("#modal-success").modal('show');
                $(".modal-title").html("Tambah Produk");
            });

            let dropdown = $('#selectCategory');

            dropdown.empty();

            dropdown.append('<option value="0" selected="true" disabled>- Pilih -</option>');
            dropdown.prop('selectedIndex', 0);

            const url = '{{ url('api/get-kategori') }}';

            // Populate dropdown with list of categories
            $.getJSON(url, function (response) {
                $.each(response, function (key, data) {
                    dropdown.append($('<option id="option"></option>').attr('value', data.id).text(data.nama));
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
                    },
                    error: function(message){
                        console.log(message);
                        // $("#modal-success").modal('show');
                        // table.ajax.reload();
                        // Swal.fire({
                        //     position: 'top',
                        //     icon: 'warning',
                        //     title: message,
                        //     showConfirmButton: false,
                        //     timer: 2000
                        // });
                    }
                })
            });

            // When button edit on click
            $("body").on("click",".btnEdit", function() {
                var product_id = $(this).data('id');
                var html = ''
                $.get("{{ route('produk.index') }}" +'/edit' + '/' + product_id +'/', function (data) {
                    $("#process").val('edit');
                    $("#btnSave").html("Simpan");
                    $(".modal-title").html("Ubah Produk");
                    $("#modal-success").modal('show');
                    $("#produk_id").val(data.id);
                    $("#nama").val(data.nama);
                    $("#selectCategory").val(data.id_kategori).change();
                    $("#warna").val(data.warna);
                    $("#berat").val(data.berat);
                    $("#harga").val(data.harga);
                    $("#deskripsi").val(data.deskripsi);
                    if(data.gambar != null){
                        html += '<img class="img-center" width="50%" src="{{ asset('assets/gambar') }}'+'/'+data.gambar+'">'; 
                    }
                    $("#preview").html(html);
                });

            });

            // When button delete on click
            $("body").on("click",".btnDelete", function() {
                var product_id = $(this).data('id');
                var product_name = $(this).data('name');

                const swalWithBootstrapButtons = Swal.mixin({
                    buttonsStyling: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#e74a3b"
                });

                swalWithBootstrapButtons.fire({
                    title: 'Anda ingin menghapus produk <br> '+product_name+' ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                })
                .then(result => {
                    if(result.value){
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
                        });
                    } else if(result.dismiss == Swal.DismissReason.cancel){
                        Swal.fire({
                            position: 'top',
                            icon: 'error',
                            title: 'Proses penghapusan data produk dibatalkan',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                })
                
                //UploadFileWithPreview
                var upload = new FileUploadWithPreview('myUploadMultiple', {
                    showDeleteButtonOnImages: true,
                    text: {
                        chooseFile: 'Pilih File ...',
                        browse: 'Browse',
                    },            
                })

                
            });

        });
    </script>
@endsection