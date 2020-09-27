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
                            <th style="text-align: center">Nama Produk</th>
                            <th style="text-align: center">Kategori</th>
                            <th style="text-align: center">Deskripsi</th>
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

            // Get Image Preview
            $('#gambar').on('change', function(){ 
                   
                var data = $(this)[0].files; 
                
                $.each(data, function(index, file){ 
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ 
                        var fRead = new FileReader(); 
                        fRead.onload = (function(file){ 
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result); 
                            $('#img-preview').append(img); 
                        };
                        })(file);
                        fRead.readAsDataURL(file); 
                    }
                });
                     
            });

            //

        });
    </script>
@endsection