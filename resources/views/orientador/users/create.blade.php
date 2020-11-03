@extends('layouts.painel')

@section('title')

Home | Novo Usuário

@stop



@section('content')



<section class="content-header">

  <h1>Cadastro de Usuário<small></small></h1>

  <hr>

  <div class="row">

    <div class="col-md-8">

      @if($errors->any())



      <div class="alert alert-warning alert-dismissible">
cadastro.aluno
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <h4><i class="icon fa fa-warning"></i> Alert!</h4>

        <ul>

         @foreach($errors->all() as $error)

         <li>{{$error}}</li>   

         @endforeach

       </ul>

     </div>

     @endif



     <div class="card card-primary">

      <!-- /.card-header -->

      <!-- form start -->

      {!! Form::open(['route'=>'admin.users.store', 'class'=>'form']) !!}

        @include('orientador.users._form')

      {!! Form::close() !!}

  

  </div>

</div>







@endsection



@section('pos-script')



  <script type="text/javascript">

   

   

    $("select[name='categoria_curso']").on('change',function(){

    

      if($(this).val() == "online"){

        $("#valorLotes").removeClass("hidden");

      }else{

        $("#valorLotes").addClass("hidden");

      }

    })

  </script>

@endsection