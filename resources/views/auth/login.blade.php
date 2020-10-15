@extends('auth.layout')

@section('title','Login')
    
@section('content')
<div class="custom-form">
    <div class="card" style="box-shadow: 5px 10px rgba(0,0,0,.125);">
        <div class="card-header" style="background-color: white">
            <div class="text-center">
                <h3 style="font-weight: 600"><span style="color: #007bff">E-</span><span style="color: #000">STORE</span></h3>
                <strong>~ Login ~</strong>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- GET Success Message -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle"></i> &nbsp; {{ $message }} &nbsp;
                    </div>
                @endif
                <!-- GET Info Message -->
                @if ($message = Session::get('info'))
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> &nbsp; {{ $message }} &nbsp;
                        <a href="{{ url('/user/aktivasi-akun') }}" class="btn btn-sm btn-outline-primary">Aktivasi akun</a>
                    </div>
                @endif
                <!-- GET Error Message -->
                @if ($errors->any())
                    <div class="alert alert-danger" style="padding: .75rem .25rem;">
                        <ul style="margin: 0px 0px 0px -20px;list-style: none">
                            @foreach ($errors->all() as $error)
                                <li><i class="fa fa-exclamation-triangle"></i>&nbsp; {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <div class="input-icon-wrap">
                        <span class="input-icon"><span class="fa fa-user"></span></span>
                        <input type="text" name="username" class="form-control input-with-icon @error('username') is-invalid @enderror" value="{{ old('username') }}" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <div class="input-icon-wrap">
                        <span class="input-icon"><span class="fa fa-lock"></span></span>
                        <input type="password" name="password" class="form-control input-with-icon @error('password') is-invalid @enderror" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success"><i class="fa fa-arrow-circle-right"></i> &nbsp;Submit</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <strong>Klik <a href="{{ url('register') }}">disini</a> untuk mendaftarkan akun anda</strong>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection