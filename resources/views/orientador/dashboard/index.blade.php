@extends('layouts.painel')

@section('title', "- Home")

@section('pre-assets')

@endsection


@section('content')
<style>
  .controle {
    max-width: 800px;
    margin: 0 auto;
    padding-bottom: 80px;
  }

  .nav li {
    margin: 0 70px;
    width: 20%;
  }

  .nav li a {
    background-color: #8257E5;
  }

  .nav li a:hover {
    background-color: #eee;
    color: #8257E5 !important;
  }

  @media only screen and (max-width: 768px) {
    body {
      display: block;
    }

    .teacher-item {
      margin: 2.4rem 20px;
    }

    .nav li {
      margin: 0 0px;
      width: 30%;
      float: inherit;
      display: inline-block;
    }

    .nav {
      text-align: center;
    }
  }
</style>
<div class="controle">
  @if(Auth::user()->type == "super_admin")
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{route('admin.profPainel.lista')}}" class="nav-link">
        <i class="fas fa-chalkboard-teacher"></i>
        <p>
          Professores
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.equipes.lista')}}" class="nav-link">
        <i class="fas fa-users"></i>
        <p>
          Equipes
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fas fa-life-ring"></i>
        <p>Suporte</p>
      </a>
    </li>
  </ul>
  @endif
  @if($equipesCount>0)
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
  @else
  <p> Nenhuma Equipe cadastrada</p>
  @endif
</div>

@endsection
