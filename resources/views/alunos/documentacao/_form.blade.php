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
      
        <li class='element col-sm-12' id='div_0' style='padding: 0;'>
          <input type='text' name='objetivo_especifico[0]' id='txt_0' class="m-bottom-xs form-control col-sm-10">
          <span class='add btn btn-primary btn-md m-left-sm m-bottom-xs'><i class="fas fa-plus"></i></span>
        </li>
        @if(count($objetivosEspecificos)>0)
        @foreach(@$objetivosEspecificos as $objetivo)
      <li class='element col-sm-12' id='div_{{$objetivo->id}}' style='padding: 0;'>
          <input type='text' id='txt_{{$objetivo->id}}' class="m-bottom-xs form-control col-sm-10" name='objetivo_especifico[{{$objetivo->id}}]' value="{{@$objetivo->descricao}}">
          <span id='remove_{{$objetivo->id}}' class='remove btn btn-danger btn-md m-left-sm m-bottom-xs'><i class='fas fa-trash'></i></span>
        </li>
      @endforeach
      @endif
      </ul>
    </div>
  </div>

  <div class="list-action col-sm-12">
        <div class="row  m-top-md" style="position:relative;background:#e9e9e9;padding:10px;">
        <a href="{{route('admin.index')}}" class="btn btn-flat btn-danger" data-action="exit">Sair</a>

          <button type="submit" class="btn btn-flat btn-success" data-action="salvar" style="position:absolute;right:10px;">Salvar</button>

        </div>
      </div>

</section>


