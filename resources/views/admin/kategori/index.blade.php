@php
    $this->title = 'Daftar Kategori';
@endphp

@extends('layouts.backend.main')

@push('title')
    {{ $this->title }}
@endpush

@push('breadcump-title')
    <i class="fa fa-list"></i> Kategori
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="btnAdd" data-toggle="modal" class="btn btn-success btn-md"><i class="fa fa-plus-circle"></i> Tambah Kategori</button>
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

<!-- Include Modal -->
    @include('admin.kategori._form')
<!-- /Include Modal -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // When button add on click
            $("#btnAdd").on("click", function() {
                $("#nama").val('');
                $("#kategori_id").val('');
                $("#process").val('create');
                $("#modal-success").modal('show');
                $(".modal-title").html("Tambah Kategori");
            });

            var table = $("#datatable").DataTable({
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
                                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" title="Ubah" class="btnEdit"><i class="fa fa-edit"></i></a> &nbsp;'+ 
                                        '<a href="javascript:void(0)" data-id="' + row.id + '" data-toggle="tooltip" title="Hapus" class="btnDelete"><i class="fa fa-trash-alt"></i></a>'+
                                    '</div>';
                        }
                    }
                ]
                
            });
            // When button submit or save on click
            $("#formCategory").on("submit", function(event) {
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
                    url: '{{ route('kategori.store') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(message){
                        $("#formCategory").trigger("reset");
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
            // When button edit on click
            $("body").on("click",".btnEdit", function() {
                var category_id = $(this).data('id');
                
                $.get("{{ route('kategori.index') }}" +'/edit' + '/' + category_id +'/', function (data) {
                    $("#process").val('edit');
                    $("#btnSave").html("Simpan");
                    $(".modal-title").html("Ubah Kategori");
                    $("#modal-success").modal('show');
                    $("#kategori_id").val(data.id);
                    $("#nama").val(data.nama);
                });

            });
            // When button delete on click
            $("body").on("click",".btnDelete", function() {
                var category_id = $(this).data('id');

                $.ajax({
                    url: "{{ route('kategori.index') }}" + '/delete'+ '/' + category_id + '/',
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

            //UploadFileWithPreview
            var upload = new FileUploadWithPreview('myUpload', {
                showDeleteButtonOnImages: true,
                text: {
                    chooseFile: 'Pilih File ...',
                    browse: 'Browse',
                },            
            })

        })
    </script>
@endsection