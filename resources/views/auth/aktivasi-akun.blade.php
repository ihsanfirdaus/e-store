@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="width: 30em">
                        <div class="card-header">
                            <h4 class="mb-0">Aktivasi akun</h4>
                        </div>
                        <div class="card-body">
                           <form action="{{ route('aktivasi.akun') }}" method="POST">
                            @csrf
                               <div class="form-group">
                                   <label for="username" class="control-label">Masukan Username anda</label>
                                   <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
                                    
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