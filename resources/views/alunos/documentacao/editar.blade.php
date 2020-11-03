@extends('layouts.painel')

@section('title')

- Editar documentação

@stop

@section('pre-assets')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .controle {
        max-width: 1080px;
        margin: 0 auto;
        padding-bottom: 80px;
    }

    .note-editable {
        height: 200px;
    }

    #page #container {
        height: fit-content;
        margin-bottom: 50px;
    }
</style>
@endsection
@section('content')
<div class="controle">
    <h3 class="col-sm-12 text-center">Editar Documentação
        <hr>
    </h3>


    {!! Form::model($doc,['route'=>['admin.doc.update',$doc->id]]) !!}

    @include('alunos.documentacao._form')

  
    {!! Form::close() !!}
</div>
@endsection
@section('pos-script')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

    });
</script>
<script>
    $(document).ready(function () {

        // Add new element
        $(".add").click(function () {

            // Finding total number of elements added
            var total_element = $(".element").length;

            // last <div> with element class id
            var lastid = $(".element:last").attr("id");
            var split_id = lastid.split("_");
            var nextindex = Number(split_id[1]) + 1;

            var max = 99999999999999;
            // Check total number elements
            if (total_element < max) {
                // Adding new div container after last occurance of element class
                $(".element:last").after("<li class='element col-sm-12' id='div_" + nextindex + "' style='padding: 0;'></li>");

                // Adding element to <div>
                $("#div_" + nextindex).append(
                    "<input type='text' class='m-bottom-xs form-control col-sm-10' name='objetivo_especifico["+nextindex+"]' id='txt_" + nextindex +
                    "'><span id='remove_" + nextindex + "' class='remove btn btn-danger btn-md m-left-sm m-bottom-xs'><i class='fas fa-trash'></i></span>");

            }

        });

        // Remove element
        $('.inputList').on('click', '.remove', function () {

            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];

            // Remove <div> with id
            $("#div_" + deleteindex).remove();

        });
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

     
            swal({
              title: "Sucesso!",
              text: data.msg,
              icon: "success",
              button: false,
              timer: 3000,
            });
            window.location.replace("{{route('admin.doc.lista')}}");
        });
        } else {
            swal("Atenção!", data.msg, "info");
          }

      

    });
  });
</script>

@endsection