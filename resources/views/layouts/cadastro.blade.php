<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{env('SITE_NAME')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/estilo.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="{{asset('vendors/summernote/dist/summernote-bs4.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/header.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/forms.css')}}">
  <link rel="stylesheet" href="{{asset('/min/css/partials/page-professor.css')}}">
  @yield('pre-assets')

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
  <style>
    .color-white {
      color: white;
    }
  </style>
<!-- a -->
</head>

<body id="page">
  <div class="loadingimg" style="display:none; position: fixed;
    z-index: 999999999;
    background: #ffffff9e;
    height: 100vh;
    width: 100vw;
    text-align: center;
    overflow: hidden;"><img src="{{asset('min/img/loading.gif')}}" alt="" style="    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);"></div>

  <div id="container">
    <header class="page-header">
      <div class="top-bar-container">
        <a href="/new-user" class="color-white">
        <i class="fas fa-door-open"></i> Sair
        </a>
        <img src="{{asset('min/img/logo.png')}}" style="float: right;">
      </div>
      @yield('in-header')
    </header>


    @yield('content')

    <!-- /.content -->
  </div>
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

  <script src="{{asset('vendors/summernote/dist/summernote-bs4.js')}}"></script>
  <script src="{{asset('vendors/summernote/addclass/summernote-ext-addclass.js')}}"></script>
  <script src="{{asset('vendors/summernote/templates/summernote-templates.js')}}"></script>
  <script src="{{asset('/vendors/summernote/dist/plugin/hello/summernote-ext-hello.js')}}"></script>
  <script
    src="{{asset('/vendors/summernote/dist/plugin/summernote-image-attributes-master/summernote-image-attributes.js')}}">
  </script>
  <script src="{{asset('/vendors/summernote/dist/plugin/summernote-image-attributes-master/lang/pt-BR.js')}}"></script>
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
    // Module Name is AutoLink
    // @param {Object} context - states of editor
    var AutoLink = function (context) {
      // you can get current editor's elements from layoutInfo
      var layoutInfo = context.layoutInfo;
      var $editor = layoutInfo.editor;
      var $editable = layoutInfo.editable;
      var $toolbar = layoutInfo.toolbar;
      // ui is a set of renderers to build ui elements.
      var ui = $.summernote.ui;
      // this method will be called when editor is initialized by $('..').summernote();
      // You can attach events and created elements on editor elements(eg, editable, ...).
      this.initialize = function () {
        // create button
        var button = ui.button({
          className: 'note-btn-bold',
          contents: '<i class="fa fa-bold">',
          click: function (e) {
            context.invoke('editor.bold'); // invoke bold method of a module named editor
          }
        });
        var buttonGroup = ui.buttonGroup({
          className: 'note-btn-group btn-group note-font',
          contents: button.render()
        });
        // generate jQuery element from button instance.
        this.$buttonGroup = buttonGroup.render();
        $toolbar.append(this.$buttonGroup);
      }
      // this method will be called when editor is destroyed by $('..').summernote('destroy');
      // You should detach events and remove elements on `initialize`.
      this.destroy = function () {
        this.$button.remove();
        this.$button = null;
      }
    };


    var HelloButton = function (context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="fa fa-child"/> Hello',
        tooltip: 'hello',
        click: function () {
          context.invoke('editor.insertText', 'hello');
        }
      });
      return button.render(); // return button as jquery object
    };
    var blockQuoteButton = function (itemId) {
      var ui = $.summernote.ui;
      var button = ui.button({
        className: 'note-btn-blockquote',
        contents: '<i class="fas fa-folder-open"></i>',
        tooltip: 'Imagens e Documentos',
        click: function () {
          localStorage.setItem("media_target", 'conteudo');
          openPopUpMedia('conteudo')
        }
      });
      return button.render();
    }
    $('#summernote').summernote({
      height: 300,

      popover: {
        image: [
          ['custom', ['imageAttributes']],
          ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
      },
      lang: 'en-US', // Change to your chosen language
      imageAttributes: {
        icon: '<i class="note-icon-pencil"/>',
        removeEmpty: false, // true = remove attributes | false = leave empty if present
        disableUpload: false // true = don't display Upload Options | Display Upload Options
      },
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
          "hidden-print",
          {
            title: "Margem Imagem",
            value: "m-all-md"
          }

        ]
      },
      toolbar: [
        ['style', ['style', 'addclass']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['media', 'link', 'hr', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview']],
        ['misc', ['undo', 'redo', ]],
        ['mybutton', ['Arquivos']],
        ['custom', ['pageTemplates', 'blocks']], // Custom Buttons
      ],
      templates: {
        templates: '{{asset("/vendors/summernote/templates/page-templates")}}/', // The folder where the templates are stored.
        insertDetails: true, // true|false This toggles whether the below options are automatically filled when inserting the 
      },
      blocks: {
        icon: '<i class="far fa-address-card"></i>',
        templates: '{{asset("/vendors/summernote/templates/bootstrap-templates")}}/'
      },
      buttons: {

        Arquivos: blockQuoteButton()
      },
      callbacks: {
        onImageUpload: function (image) {
          uploadImage(image[0]);
        }
      },
    })
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


    function uploadImage(image) {
      var data = new FormData();
      console.log(image);
      data.append("file[]", image);
      $.ajax({
        url: "{{route('admin.ajax.upload-foto')}}",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function (url) {
          var image = $('<img>').attr('src', "{{URL::to('img')}}/" + url);
          image.attr('style', 'margin:20px')
          $('#summernote').summernote("insertNode", image[0]);
        },
        error: function (data) {
          console.log(data);
        }
      });
    }

    function sendFile(file, editor, welEditable) {
      data = new FormData();
      data.append("file", file);
      $.ajax({
        data: data,
        type: "POST",
        url: "{{route('admin.ajax.upload-foto')}}",
        cache: false,
        contentType: false,
        processData: false,
        success: function (url) {
          editor.insertImage(welEditable, url);
        }
      });
    }
    $('[data-toggle="tooltip"]').tooltip();
    $(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.timeMask').mask('00:00');
      $('.dataMask').mask('00/00/0000');
      $('.dateTimeMask').mask('00/00/0000 00:00:00');
      $('.cepMask').mask('00000-000');
      $('.mixed').mask('AAA 000-S0S');
      $('.cpfMask').mask('000.000.000-00', {
        reverse: true
      });
      $('.moneyMask').mask('000.000.000.000.000,00', {
        reverse: true
      });
      var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
        };

      $('.telMask').mask(SPMaskBehavior, spOptions);
      //Initialize Select2 Elements
      $(".select2").select2();

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-orange, input[type="radio"].flat-orange').iCheck({
        checkboxClass: 'icheckbox_flat-orange',
        radioClass: 'iradio_flat-orange'
      });
      $('.abrir').on('click', function (e) {
        e.preventDefault();

        var target = $(this).data('alvo');
        $(this).fadeOut('500', 'linear', function () {
          $('.fecharSidebar').show('fast', 'linear');
        });

        $(target).animate({
          left: '0',
        })
      });
      $('.fecharSidebar').on('click', function (e) {
        e.preventDefault();
        $(this).fadeOut('500', 'linear', function () {
          $('.abrir').show('fast', 'linear');
        });

        var x = screen.width;
        var target = $(this).data('alvo');
        $(target).animate({
          left: '-100%',
        }, 500)
      })
      $(".btn-destroy").click(function (e) {
        var url = $(this).attr('href');
        e.preventDefault();
        $(this).closest('tr').addClass("remove-row");
        //$(this).closest('.box').addClass("remove-row");
        swal({
          title: "Tem certeza?",
          text: "Você irá remover definitivamente este item",
          icon: "warning",
          dangerMode: true,
          buttons: {
            cancel: {
              text: "Cancel",
              value: null,
              visible: true,
              className: "",
              closeModal: true,
            },
            confirm: {
              text: "OK",
              value: true,
              visible: true,
              className: "",
              closeModal: true
            }
          }
        }).then(willDelete => {
          if (willDelete) {
            $.get(url, function (data) {
              $(".remove-row").remove();
              if (willDelete) {
                swal("Sucesso!", "Item removido com sucesso.", "success");
              }
            });
          }
        });
      })
      $(".openPopUpMedia").click(function (e) {
        e.preventDefault();

        var target = $(this).data('target');
        openPopUpMedia(target)
      })
    });

    function openPopUpMedia(target) {
      if (target) {
        localStorage.setItem("media_target", target);
      } else {
        localStorage.setItem("media_target", 'conteudo');
      }
      if ($("#contentMedia").html() == "") {
        $.get('{{route("admin.media.popUp")}}', function (data) {
          $("#contentMedia").html(data);
          $('#modalMedia').modal('show')
        })
      } else {
        $('#modalMedia').modal('show')
      }
    }

    function string_to_slug(str) {
      str = str.replace(/^\s+|\s+$/g, ""); // trim
      str = str.toLowerCase();
      // remove accents, swap ñ for n, etc
      var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
      var to = "aaaaaaeeeeiiiioooouuuunc------";
      for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
      }
      str = str
        .replace(/[^a-z0-9 -]/g, "") // remove invalid chars
        .replace(/\s+/g, "-") // collapse whitespace and replace by -
        .replace(/-+/g, "-"); // collapse dashes
      return str;
    }
  </script>
  <div class="modal fade" id="modalMedia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content" style="padding: 10px;">
        <div id="contentMedia"></div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

  </script>
  @yield('pos-script')
</body>

</html>
