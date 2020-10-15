<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/styles/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <style>
       .custom-form{
            width: 28em;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .input-icon-wrap{
            border: 1px solid #ddd;    
            display: flex;
            flex-direction: row;
        }
        .input-icon{
            background-color:#007bff;
        }
        .input-icon span{
            color: #fff;
        }
        .input-with-icon {
            flex: 1;
        }
        .input-icon, .input-with-icon {
            padding: 5px 15px;
        }
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Content -->
    @yield('content')
    <!-- End Content -->

    <!-- JQuery -->
    <script src="{{ asset('assets/frontend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/jquery-mask/jquery.mask.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('assets/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#no_hp').mask('0000-0000-00000');
        })
    </script>
</body>
</html>