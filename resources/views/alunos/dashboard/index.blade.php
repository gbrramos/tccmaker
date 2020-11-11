@extends('layouts.painel')
@section('title', "- Home")

@section('pre-assets')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/slick-1.8.1/slick/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/slick-1.8.1/slick/slick-theme.css')}}" />
@endsection


@section('content')
<style>
  .controle {
    max-width: 1110px;
    margin: 0 auto;
    padding-bottom: 80px;
  }

  @media only screen and (max-width: 768px) {
    body {
      display: block;
    }

    .teacher-item {
      margin: 2.4rem 20px;
    }
  }

  .bloco {
    height: 220px;
    border-radius: 15px;
    border: 2px solid #8257e5;
  }

  a.bloco {
    text-align: center;
    font-size: 64px;
    padding: 20px;
    text-decoration: none;
    color: #8257e5;
    transition: 0.2s all linear;
    margin: 0 0 10px 0;

  }

 

  .bloco:hover {
    background-color: #8257e5;
    color: #fff;
    transition: 0.2s all linear;
    border: 2px solid #372267;
  }

  .bloco p {
    font-size: 24px;
  }

  .equipe_doc {
    margin: 0 0 30px 0;
  }

  .equipe_doc img {
    padding: 10px;
    border-radius: 10px;
  }

  body#page{
    margin-bottom: 120px;
  }
</style>

<div class="controle">
  <div class="row equipe_doc">
    <ul class="infos">
      <li>
        <img src="{{$equipe->logo->fullpatchLogo()}}" class="profilePic col-sm-2" alt="">
      </li>
      <li>
        <div class="col-sm-10 m-top-lg"><p style="display: inline-block;font-weight: bold">{{$equipe->titulo}}</p>
        <p style="display: inline-block;"> - {{$equipe->integrantes}}</p></div>
      
        <p class="col-sm-10">{{$equipe->sobre}}</p>
      </li>
    </ul>
  </div>

  <div class="center row col-sm-12">
    <div class="col-sm-4">
      <a href="{{route('admin.doc.lista')}}" class="bloco col-sm-12">
        <i class="fas fa-clipboard"></i>
        <p>Documentação adicionada</p>
      </a>
    </div>
  @if($d==0)
    <div class="col-sm-4">
      <a href="{{route('admin.doc.novo')}}" class="bloco col-sm-12">
        <i class="fas fa-plus"></i>
        <p>Adicionar documentação</p>
      </a>
    </div>
    @else
    <div class="col-sm-4">
      <a href="{{route('admin.doc.editar',['id'=>$doc->id])}}" class="bloco col-sm-12">
      <i class="fas fa-pencil-alt"></i>
        <p>Editar documentação</p>
      </a>
    </div>
    @endif

    <div class="col-sm-4">
      <a href="{{route('admin.doc.notas')}}" class="bloco col-sm-12">
        <i class="fas fa-chalkboard-teacher"></i>
        <p>Notas do Professor</p>
      </a>

    </div>

    




  </div>

</div>

@endsection

@section('pos-script')

<script type="text/javascript" src="{{asset('vendors/slick-1.8.1/slick/slick.min.js')}}"></script>


@endsection
