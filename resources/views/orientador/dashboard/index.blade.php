@extends('layouts.painel')

@section('title', "- Home")

@section('pre-assets')

@endsection


@section('content')
<style>
  .controle{
    max-width: 800px;
    margin: 0 auto;
    padding-bottom: 80px;
  }
  @media only screen and (max-width: 768px) {
    body{
      display: block;
    }
    .teacher-item{
      margin: 2.4rem 20px;
    }
  }
</style>
<div class="controle">
@foreach($equipes as $equipe)
    <article class="teacher-item">
      <header>
        <img src="{{$equipe->logo->fullpatchLogo()}}" alt="">
        <div>
          <strong>{{$equipe->titulo}}</strong>
          <span>{{$equipe->integrantes}}</span>
        </div>
      </header>

      <p>{{$equipe->sobre}}</p>

      <footer>
        <p>Estado:<strong>Em desenvolvimento</strong>
        </p>
        <a href="{{route('admin.equipe.view',['id'=>$equipe->id])}}" class="btn btn-success">Exibir detalhes
        </a>
      </footer>
    </article>
   @endforeach
    </div>

@endsection
