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
        max-width: 800px;
        margin: 0 auto;
        padding-bottom: 80px;
    }


   
</style>

<div class="controle">
<div class="list-group list-group-flush">
            <h3>Equipe:</h3>
            <p class="list-group-item">{{$equipeMain->titulo}}</p>
        </div>
        <div class="list-group list-group-flush">
            <h3>Integrantes:</h3>
            <p class="list-group-item">{{$equipeMain->integrantes}}</p>
        </div>
        <div class="list-group list-group-flush">
            <h3>Sobre:</h3>
            <div class="list-group-item">
                <p>{{$equipeMain->sobre}}</p>
            </div>
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