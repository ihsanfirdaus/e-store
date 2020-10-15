@extends('auth.layout')

@section('title','Register')
    
@section('content')
<div class="custom-form" style="width: 50em">
    <div class="card" style="box-shadow: 5px 10px rgba(0,0,0,.125);">
        <div class="card-header" style="background-color: white">
            <div class="text-center">
                <h3 style="font-weight: 600"><span style="color: #007bff">E-</span><span style="color: #000">STORE</span></h3>
                <strong>~ Register ~</strong>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- GET Error Message -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0;list-style: none">
                            @foreach ($errors->all() as $error)
                                <li><i class="fa fa-exclamation-triangle"></i>&nbsp; {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><span class="fa fa-user"></span></span>
                                <input type="text" name="username" class="form-control input-with-icon @error('username') is-invalid @enderror" value="{{ old('username') }}" autofocus required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="control-label">E-Mail</label>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><span class="fa fa-envelope"></span></span>
                                <input type="email" name="email" class="form-control input-with-icon @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="control-label">No HP</label>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><span class="fa fa-phone "></span></span>
                                <input type="text" id="no_hp" name="no_hp" class="form-control input-with-icon @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><span class="fa fa-lock"></span></span>
                                <input type="password" name="password" class="form-control input-with-icon @error('password') is-invalid @enderror" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password (Konfirmasi)</label>
                            <div class="input-icon-wrap">
                                <span class="input-icon"><span class="fa fa-lock"></span></span>
                                <input type="password" name="password_confirmation" class="form-control input-with-icon" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-success" style="margin-top: 30px" type="submit"><i class="fa fa-arrow-circle-right"></i> &nbsp;Register</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <strong>Kamu sudah mempunyai akun ? Silahkan klik <a href="{{ url('login') }}">disini</a> untuk masuk</strong>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection