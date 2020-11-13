@extends('layouts.painel')

@section('title')

- Sua documentação

@stop
@section('pre-assets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')
<style>
    .controle {
        max-width: 800px;
        margin: 0 auto;
        padding-bottom: 80px;
    }

    @media only screen and (max-width: 768px) {
        .controle {
            padding: 0 20px;
        }

        .list-group {
            padding-left: 15px;
        }

        .row {
            margin: 0 !important;
        }

        .list-group.img{
            text-align: center;
        }

        .list-group.img img {
            display: inline-block;
        }
    }
</style>

<div class="controle">
    <h3 class="text-center"><u>Informações da Equipe</u></h3>
    <br><br>
    <div class="row infos">
        <div class="list-group list-group-flush col-sm-2 img">
            <img src="{{$equipe->logo->fullpatchLogo()}}" alt="">
        </div>
        <div class="list-group list-group-flush col-sm-offset-1 col-sm-9">
            <h3>Equipe:</h3>
            <p class="list-group-item">{{$equipe->titulo}}</p>
        </div>
        <div class="list-group list-group-flush col-sm-12">
            <h3>Integrantes:</h3>
            <p class="list-group-item">{{$equipe->integrantes}}</p>
        </div>
        <div class="list-group list-group-flush col-sm-12">
            <h3>Sobre:</h3>
            <div class="list-group-item">
                <p>{{$equipe->sobre}}</p>
            </div>
        </div>
        <hr>

    </div>
    <div class="row">
        @if($documentacao != null)
        <h3 class="text-center col-sm-12"><u>Textos da Documentação</u></h3>
        <div class="list-group list-group-flush col-sm-12">
            <h3>Resumo:</h3>
            <div class="list-group-item">
                @if($documentacao->resumo)
                <p>{!!$documentacao->resumo!!}</p>
                @else
                <p>Resumo ainda não escrito</p>
                @endif
            </div>
        </div>

        <div class="list-group list-group-flush col-sm-12">
            <h3>Introdução:</h3>
            <div class="list-group-item">
                @if($documentacao->introducao)
                <p>{!!$documentacao->introducao!!}</p>
                @else
                <p>Introdução ainda não escrita</p>
                @endif
            </div>
        </div>


        <div class="list-group list-group-flush col-sm-12">
            <h3>Objetivo Geral:</h3>
            <div class="list-group-item">

                @if($documentacao->objetivo_geral)
                <p>{!!$documentacao->objetivo_geral!!}</p>
                @else
                <p>Objetivo Geral ainda não escrito</p>
                @endif
            </div>
        </div>


        <div class="list-group list-group-flush col-sm-12">
            <h3>Objetivos Específicos:</h3>

            <div class="list-group-item">
                @if(count($objetivosEspecificos)>0)
                <ul class="objetivosEspecificos">
                    <hr>

                    @foreach($objetivosEspecificos as $objetivo)
                    <li style="list-style: disc; margin-left: 20px;">
                        <p>{{$objetivo->descricao}}</p>
                    </li>
                    <hr>
                    @endforeach
                </ul>
                @else
                <p>Objetivos Específicos ainda não escritos</p>
                @endif
            </div>
        </div>
        @else
        <h3 class="text-center">Nenhuma documentação adicionada até agora</h3>
        @endif
    </div>
</div>
@endsection
@section('pos-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>
@endsection