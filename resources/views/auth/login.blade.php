@extends('layouts.login')



@section('content')



@yield('pre-assets')

<style>
  #container {
    padding-top: 50px;
  }

  @media only screen and (max-width: 768px) {
    #container {
      padding-top: 100px
    }
  }

  .toast.show {
    display: block;
    opacity: 1;
    /* position: absolute; */
    top: 0px;
    right: 0;
    float: right;
    position: absolute;
  }

  .toast-body {
    color: #fff;
    font-size: 1.6em;
  }

  .toast-header {
    font-size: 18px;
  }

  button.ml-2.mb-1.close {
    font-size: 24px;
  }
</style>


<form action="{{ url('login') }}" method="post">

  {{ csrf_field() }}

  <div class="input-group mb-3 col-sm-9 col-md-12">
    <label for="email">Email</label>

    <input type="text" class="form-control" name="email" style="width: 100%;">

  </div>

  <div class="input-group mb-3 col-sm-9 col-md-12">

    <label for="email">Password</label>

    <input type="password" class="form-control" name="password" style="width: 100%;">

  </div>

  <div class="row">



    <!-- /.col -->

    <div class="buttons-container col-sm-9 col-md-12">

      <button type="submit" class="btn btn-success btn-block">Entrar</button>
      <a class="btn btn-primary col-sm-6" href="/new-user">
        Cadastrar
      </a>
    </div>

    <!-- /.col -->

  </div>

</form>







@endsection

@section('pos-script')

@if($errors->any())


<script>
  $(document).Toasts('create', {

    class: 'bg-danger',

    title: 'Erro',

    subtitle: '',

    body: 'Email e/ou senha não encontrados',


  })
</script>


@endif



@endsection
