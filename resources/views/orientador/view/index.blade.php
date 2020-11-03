@extends('layouts.painel')

@section('title')

Home

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
        max-width: 1240px;
        margin: 0 auto;
        padding-bottom: 80px;
    }

    h3 {
        margin-bottom: 10px !important;
    }

    .note-editing-area {
        height: 200px;
        font-family: inherit;
    }
</style>

<div class="controle">
    <div class="col-sm-6">
        <div class="list-group list-group-flush">
            <h3>Equipe:</h3>
            <p class="list-group-item">{{$equipe->equipe->titulo}}</p>
        </div>

        <div class="list-group list-group-flush">
            <h3>Sobre:</h3>
            <div class="list-group-item">
                <p>{{$equipe->equipe->sobre}}</p>
            </div>
        </div>


        <div class="list-group list-group-flush">
            <h3>Resumo:</h3>
            <div class="list-group-item">
                @if($equipe->resumo)
                <p>{!!$equipe->resumo!!}</p>
                @else
                <p>Resumo ainda não escrito</p>
                @endif
            </div>
        </div>

        <div class="list-group list-group-flush">
            <h3>Introdução:</h3>
            <div class="list-group-item">
                @if($equipe->introducao)
                <p>{!!$equipe->introducao!!}</p>
                @else
                <p>Introdução ainda não escrita</p>
                @endif
            </div>
        </div>


        <div class="list-group list-group-flush">
            <h3>Objetivo Geral:</h3>
            <div class="list-group-item">

                @if($equipe->objetivo_geral)
                <p>{!!$equipe->objetivo_geral!!}</p>
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
                    <li style="list-style: disc; margin-left: 20px;"><p>{{$objetivo->descricao}}</p></li>
                    <hr>
                    @endforeach
                </ul>
                @else
                <p>Objetivos Específicos ainda não escritos</p>
                @endif
            </div>
        </div>



    </div>
    <div class="col-sm-5">
        <h3>Escreva um comentário:</h3>
        <!-- Montar controller dessa rota -->
        {!!
        Form::model($equipe,['route'=>['admin.equipe.comentarioStore',$equipe->id],'class'=>'form-group','id'=>'form'])
        !!}
        <div class="row">

            <div class="col-sm-12">
                <textarea name="comentario" id="summernote" class="col-sm-12"></textarea>
            </div>
            <div class="col-sm-12">
                <label for="nota">Avaliação (Nota/Menção)</label>
                <input type="text" name="nota" class="col-sm-12 form-control">
            </div>
            <div class="list-action" style="width: 100%;">
                <div class="col-sm-6   m-top-lg">
                    <a href="{{route('admin.index')}}" class="btn btn-danger col-sm-12">Sair</a>
                </div>
                <div class="col-sm-6  m-top-lg">
                    {!! Form::submit('Enviar',['class'=>"btn btn-success col-sm-12"])!!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <hr>
    @if(count($coments) > 0)
    <div class="col-sm-5">
        <div class="card-header" id="headingTwo">
            <button class="btn btn-bicolor" id="btnCollapse" type="button" data-toggle="collapse"
                data-target="#collapseTwo" style="width: 100%;" aria-expanded="false" aria-controls="collapseTwo">
                <p class="openAd" style="margin: 0">Abrir comentários</p>
                <p class="closeAd dNone" style="margin: 0">Fechar comentários</p>
            </button>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach($coments as $c)
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

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-sm-5">
        <hr>
        <p>Nenhum comentario adicionado até o momento</p>
        <hr>
    </div>
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
                        window.location.replace(
                            "{{route('admin.equipe.view',['id'=>$equipe->id])}}");
                    } else {
                        swal("Atenção!", data.msg, "info");
                    }

                })
            }
        });
    });
</script>

<script>
    $('#btnCollapse').click(function (e) {
        e.preventDefault();
        $('.openAd').toggleClass('dNone');
        $('.closeAd').toggleClass('dNone');
    });
</script>
@endsection