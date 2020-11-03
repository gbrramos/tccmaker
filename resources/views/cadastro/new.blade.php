<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8257E5"> 

    <title>TCCMaker</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('min/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('min/css/partials/page-check.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
</head>
<body id="page-check" >
    <div id="container">
        <div class="logo-container">
            <h2>Seja bem vindo!</h2>
            <h2>Deseja se cadastrar como?</h2>
        </div>

        <div class="buttons-container">
            <a class="cadastrar" href="{{route('alunos.novo')}}">
                Aluno
            </a>
            <a class="cadastrar" href="{{route('professor.novo')}}">
                Professor
            </a>
        </div>
    </div>
</body>
</html>