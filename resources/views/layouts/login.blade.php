<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5">

    <title>TCCMaker</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('min/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('min/css/partials/page-landing.css')}}">
    <link rel="stylesheet" href="{{asset('min/css/partials/forms.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap"
        rel="stylesheet">
</head>
<style>
  .btn{
    font-size: 2.4rem;
    font-weight: 700;
  }
</style>
<body id="page-landing">
<div id="container" style="max-height: 100vh;">
        <div class="logo-container">
            <img src="{{asset('/min/img/logo.png')}}" alt="">
            <h2>Sua plataforma de TCC online.</h2>
        </div>

        <img class="hero-image" src="{{asset('/min/img/landing.gif')}}" alt="Plataforma de estudos"
            style="margin-top: 60px;">

  @yield('content')


  </div>


<!-- /.login-box -->



<!-- jQuery -->

<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->

<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->

<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('adminLTE/plugins/toastr/toastr.min.js')}}"></script>

@yield('pos-script')

</body>

</html>



