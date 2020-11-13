<section class="col-sm-12">

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group ">
        {!! Form::label('introducao','Introdução') !!}
        {!! Form::textarea('introducao',null,['class'=>'form-control summernote']) !!}
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group ">
        {!! Form::label('objetivo_geral','Objetivo Geral') !!}
        {!! Form::textarea('objetivo_geral',null,['class'=>'form-control summernote']) !!}

      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group ">
        {!! Form::label('resumo','Resumo') !!}
        {!! Form::textarea('resumo',null,['class'=>'form-control summernote']) !!}
      </div>
    </div>

    <div class="col-sm-6">
      {!! Form::label('objetivos_especificos','Objetivos Específicos') !!}

      <ul class="inputList">
        <span class="add btn btn-primary btn-md m-bottom-xs col-sm-10 col-xs-8" style="width: 100%;"><i class="fas fa-plus"></i></span>

        <style>
          input.form-control {
            width: 90%;
          }

          @media only screen and (max-width: 768px) {
            input.form-control{
              width: 80%;
            }
            .inputList{
              text-align: center;
            }

            li.element{
              display: inline-block;
            }
            span.btn-danger{
              float: right;
            }
          }
        </style>
        @if(count($objetivosEspecificos)>0)
        @foreach(@$objetivosEspecificos as $objetivo)
        <li class='element col-sm-12 col-xs-12' id='div_{{$objetivo->id}}' style='padding: 0;'>
          <input type='text' id='txt_{{$objetivo->id}}' class="m-bottom-xs form-control col-sm-10 col-xs-10"
            name='objetivo_especifico[{{$objetivo->id}}]' value="{{@$objetivo->descricao}}">
          <span id='remove_{{$objetivo->id}}' class='remove btn btn-danger btn-md m-left-sm m-bottom-xs'><i
              class='fas fa-trash'></i></span>
        </li>
        @endforeach
        @endif
      </ul>
    </div>
  </div>

  <div class="list-action col-sm-12">
    <div class="row  m-top-md" style="position:relative;background:#e9e9e9;padding:10px;">
      <a href="{{route('admin.index')}}" class="btn btn-flat btn-danger" data-action="exit">Sair</a>

      <button type="submit" class="btn btn-flat btn-success" data-action="salvar"
        style="position:absolute;right:10px;">Salvar</button>

    </div>
  </div>

</section>
