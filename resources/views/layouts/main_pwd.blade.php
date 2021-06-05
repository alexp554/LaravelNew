<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <style>
    .form-gap {
        padding-top: 120px;
    }
    .bgr {
        background-image: url("{{asset('gambar/login-register.jpg')}}");
        background-size: cover;
    }
 </style>
</head>
<body class="bgr">
    @yield('content')
</body>
</html>