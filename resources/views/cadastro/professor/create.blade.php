@extends('layouts.cadastro')

@section('title')



@stop

@section('pre-assets')
<link rel="stylesheet" href="{{asset('min/css/partials/forms.css')}}">
<link rel="stylesheet" href="{{asset('min/css/partials/page-cadastro.css')}}">

@endsection

@section('content')

@section('in-header')
<div id="page-cadastro">

  <div class="header-content">
    <strong>Preencha o formulário para se cadastrar.</strong>
  </div>
</div>
@endsection


<div id="page-cadastro">
  <style>
    input[type="file"] {
      display: none;
    }

    .container-upload {
      cursor: pointer;
    }

    #preview li {
      list-style: none;
    }

    #preview li img {
      max-width: 100%;
    }

    .red{ color: red; padding-left: 10px}
    .green{ color: green;  padding-left: 10px }
  </style>


  <main>

    {!! Form::model(null,['route'=>['professor.store'],'id'=>'form']) !!}
    <fieldset>

      <div class="input-block">
        <label for="name-tcc">Nome</label>
        <input name="name" id="name-tcc" required>
      </div>

      <div class="input-block">
        <label for="">Logo</label>
        <div id="carregandoForm" class="carregandoDestaque" style="display: none">
        </div>

        <label for="uploadArquivos" class="uploadFileInput"
          style="font-family: Poppins;text-align: center;padding: 1em;display: block;">Selecione</label>
        <input id="uploadArquivos" type="file" name="imagePath">

        <div id="preview">
          <ul></ul>
        </div>

      </div>


      <div class="select-block">
        <label for="subject">Curso</label>
        <select name="curso_id" id="subject">
          <option value="0" disabled selected>Selecione uma opção</option>
          @foreach($cursos as $curso)
          <option value="{{$curso->id}}">{{$curso->nome}}</option>
          @endforeach
        </select>
      </div>
      <div class="input-block">
        <label for="login">Email</label>
        <input name="email" id="login" type="email" onkeyup="checklogin()" required>
        <span id="name_status"></span>
      </div>
      <div class="input-block">
        <label for="senha">Senha</label>
        <input name="senha" id="senha" type="password" required>
      </div>

    </fieldset>
    <footer>
      <p>
        <img src="{{asset('min/img/icons/warning.svg')}}" alt="Aviso importante">
        Importante! <br>Preencha todos os dados
      </p>
      <div class="list-action ">
        <div class="row">
          <button type="button" class="btn btn-flat btn-success" data-action="salvar">Salvar</button>

        </div>
      </div>
</div>

</footer>
{!! Form::close() !!}

</main>
</div>

@endsection



@section('pos-script')
<script>
  $('#uploadArquivos').on('change', function () {
    $(".loadingimg").fadeIn('fast');
    var data = new FormData();
    console.log($("input[id='uploadArquivos']")[0].files);
    $.each($("input[id='uploadArquivos']")[0].files, function (i, file) {
      data.append('imagePath', file);
    });
    data.append('_token', '{{ csrf_token() }}');

    $.ajax({
      url: '{{route("upload-profile")}}',
      type: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      data: data,
      success: function (result) {
        $.each(result, function (index, value) {
          var html = '';
          html += '<li>';
          html += '<input type="hidden" name="arquivo" value="' + value + '" />';
          html += '<br>';
          html += `<img src="{{asset("uploads/img/profiles")}}/` + value + `" alt="">`;
          html += '</li>';
          $('#preview ul').html(html);
          //console.log(value);


        });
      }
    });
    $(".loadingimg").fadeOut('slow');


  });

  function checklogin() {
    var loginText = document.getElementById("login").value;
    $.ajax({
      type: 'post',
      url: '{{route("verifica-login")}}',
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      data: {
        user_name: loginText,
      },
      success: function (response) {
        if(response == 'True'){
          $('#name_status').html('<p class="red">Este Email já existe</p>');
        }else{
          $('#name_status').html('<p class="green">Email válido</p>');

        }
        if (response == "OK") {
          return true;
        } else {
          return false;
        }
      }
    });
    // $.ajax({
    //   url: '{{route("verifica-login")}}',
    //   type: 'POST',
    //   cache: false,
    //   contentType: false,
    //   processData: false,
    //   headers: {
    //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
    //   },
    //   data: data,
    //   success: function (result) {
    //     $.each(result, function (index, value) {
    //       var html = '';
    //       html += '<li>';
    //       html += '<input type="hidden" name="arquivo" value="' + value + '" />';
    //       html += '<br>';
    //       html += `<img src="{{asset("uploads/img/profiles")}}/` + value + `" alt="">`;
    //       html += '</li>';
    //       $('#preview ul').html(html);
    //       //console.log(value);


    //     });
    //   }
    // });
  }
</script>

<script>
  $(document).ready(function () {
    $(".list-action").on('click', 'button', function (e) {
      e.preventDefault();
      var action = $(this).data('action');
      var form = $(this).closest('form');

      if (action == 'salvar') {
        $.post($(form).attr('action'), $(form).serialize(), function (data, error) {

          if (data.erro == '0') {
            swal({
              title: "Sucesso!",
              text: data.msg,
              icon: "success",
              button: false,
              timer: 3000,
            });
            document.getElementById("form").reset();
            window.location.replace("{{route('login')}}");
          } else {
            swal("Atenção!", data.msg, "info");
          }

        })
      }
    });
  });
</script>

<script>


</script>

@endsection