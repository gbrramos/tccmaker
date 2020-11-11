<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TCCMAKER @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}">

  <meta name="msapplication-TileColor" content="#01a8ec">

  <meta name="theme-color" content="#01a8ec">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/estilo.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/styles.css')}}">

  <link rel="stylesheet" href="{{asset('/min/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/header.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/forms.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/page-professor.css')}}">
  @yield('pre-assets')


  <style>
    .color-white {
      color: white;
      margin: 0 10px;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
      font-size: 14px !important;
      text-decoration: none;
      padding: 5px;
      border-radius: 10px;
    }

    .color-white:hover {
      color: #8257e5;
      background-color: #fff;
      text-decoration: none;
      opacity: 1 !important;
      transition: none !important;

    }

    .dNone {
      display: none;
    }

    .btn-bicolor {
      background: #fff;
      border: 1px solid #000;
      border-radius: 10px 10px 0 0;
    }

    .main-header .nav-link {
      height: auto;
    }

    .navbar {
      margin-bottom: 0;
      background: #8257e5;
      border-radius: 0;
      color: #fff;
    }

    .navbar-light .navbar-nav .nav-link {
      color: #fff;
    }

    .btn-bicolor:hover {
      background: #c9c3c3;
      color: #000;
    }

    .content-wrapper {
      background: #fff;
    }

    .list-group-flush .list-group-item {
      border-right: 1px solid #ddd;
      border-left: 1px solid #ddd;
    }

    .list-group-flush:last-child .list-group-item:last-child {
      margin-bottom: 0;
      border-bottom: 1px solid #ddd;
    }

    .navbar-nav {
      margin: 0;
    }

    [class*=sidebar-dark-] {
      background-color: #8257e5;
    }

    a.nav-link {
      color: #fff !important;
    }

    .main-header .nav-link:hover {
      color: rgba(0, 0, 0, .7) !important;
    }

    .main-sidebar {
      height: 100vh;
      overflow-y: hidden;
      z-index: 1038;
    }

    .wrapper {
      width: 100%;
    }

   
  </style>

</head>

<body id="page">
  <div class="loadingimg" style="display:none; position: fixed;
    z-index: 999999999;
    background: #ffffff9e;
    height: 100vh;
    width: 100vw;
    text-align: center;
    overflow: hidden;">
    <img src="{{asset('min/img/loading.gif')}}" alt="" style="margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);"></div>


  <div id="container">
    <header class="page-header">


      <div class="top-bar-container">

        <a href="{{route('admin.index')}}" class="color-white">
          <i class="fas fa-home"></i> Home
        </a>

        <a href="{{ route('logout') }}" class="color-white">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <img src="{{asset('min/img/logo.png')}}" alt="Proffy" style="float: right;">
      </div>
      @yield('in-header')
    </header>


    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content -->
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.14/jquery.mask.min.js"></script>
  <script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('adminLTE/plugins/iCheck/icheck.min.js')}}"></script>
  <script src="{{asset('adminLTE/plugins/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-.4min.js">
  </script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"
    integrity="sha256-QN6KDU+9DIJ/9M0ynQQfw/O90ef0UXucGgKn0LbUtq4=" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {

      $("body").on('click', '.btnPrint', function (e) {
        e.preventDefault();
        window.print();
      })

      $('.DataTable').DataTable();
    });
    $('.timepicker').timepicker({
      timeFormat: 'HH:mm',
      interval: 15,
      dynamic: false,
      dropdown: true,
      scrollbar: true
    });

    $('.dataPicker').datepicker({
      language: "pt-BR"
    });

    $('.multipleDate').datepicker({
      language: "pt-BR",
      multidate: true,
      toggleActive: true
    });


    $('.summernote-basic').summernote({
      height: 150,

      placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptatem praesentium natus temporibus vel. Quos nulla, odit. Optio, earum, delectus perferendis soluta dicta dolorem, ex enim omnis nulla sed consequuntur.',
      addclass: {
        debug: false,
        classTags: [{
            title: "Button",
            value: "btn btn-success"
          }, "jumbotron", "lead", "img-rounded", "img-circle", "img-responsive", "btn", "btn btn-success",
          "btn btn-danger", "text-muted", "text-primary", "text-warning", "text-danger", "text-success",
          "table-bordered", "table-responsive", "alert", "alert alert-success", "alert alert-info",
          "alert alert-warning", "alert alert-danger", "visible-sm", "hidden-xs", "hidden-md", "hidden-lg",
          "hidden-print"
        ]
      },
      toolbar: [
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],

      ],
      buttons: {

        Arquivos: blockQuoteButton
      },
      callbacks: {
        onImageUpload: function (image) {
          uploadImage(image[0]);
        }
      }
    })




    $('.timeMask').mask('00:00');
    $('.dataMask').mask('00/00/0000');
    $('.dateTimeMask').mask('00/00/0000 00:00:00');
    $('.cepMask').mask('00000-000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpfMask').mask('000.000.000-00', {
      reverse: true
    });
  </script>


  @yield('pos-script')
</body>

</html>
