@extends('auth.layout')

@section('title','Aktivasi Akun')
    
@section('content')
<div class="container">
    <div class="custom-form">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="width: 30em">
                    <div class="card-header">
                        <h4 class="mb-0">Aktivasi akun</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aktivasi.akun') }}" method="POST">
                        @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <i class="fa fa-check-circle"></i> &nbsp;{{ $message }}
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="username" class="control-label">Masukan Username anda</label>
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" autofocus>
                                
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection