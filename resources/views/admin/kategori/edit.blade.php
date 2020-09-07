@extends('layouts.frontend.main')

@push('title')
    EDIT KATEGORI
@endpush

@section('content')
    <br>
        <div class="jumbotron">
            <div class="container">
                <h2>EDIT KATEGORI</h2>
            </div>
        </div>
        <div class="container">
            <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Nama Kategori</label> 
                            <input type="text" value="{{$kategori->nama}}" name="kategori" class="form-control">  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-orange" style="margin-top: 25px">Edit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection