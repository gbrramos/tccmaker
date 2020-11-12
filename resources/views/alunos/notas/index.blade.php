@extends('layouts.painel')

@section('title') - Notas @stop

@section('pre-assets')
<style>
    .coments {
        margin: 0 auto;
        display: block;
        width: 50%;
    }

    @media only screen and (max-width: 768px) {
        .coments {
            width: 100%;
        }
    }
</style>
@endsection
@section('content')
<div class="coments">
    <div class="card-body">
        <div class="">
            @foreach($comentarios as $c)
            <ul class="list-group-item">
                <li>Postado em: {{$c->created}}</li>
                <li><small>
                        <bold> Por: {{$c->autor->name}}</bold>
                    </small></li>
                <br>
                <li>{!!$c->comentario!!}</li>
                <br>
                @if($c->nota)
                <li>Nota: {{$c->nota}}</li>
                @else
                <li>Nota não atribuída</li>
                @endif
            </ul>
            @endforeach
            <div class="controle"><br><br><br><br><br><br></div>
        </div>
    </div>
</div>
@endsection
