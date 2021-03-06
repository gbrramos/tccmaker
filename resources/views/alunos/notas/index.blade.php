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

        .content{
            padding: 0 20px;
        }
    }
</style>
@endsection
@section('content')
<div class="coments">
    <div class="card-body">
    <h3 class="text-center"><u>Comentários atribuídos a sua equipe</u></h3>
        <div class="">
        @if(count($comentarios) == 0)
        <p class="text-center">Nenhum comentario atribuído a sua equipe</p>

        @else
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

            
        
            @endif
            <div class="controle"><br><br><br><br><br><br></div>
        </div>
    </div>
</div>
@endsection
