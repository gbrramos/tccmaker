<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=10">
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('min/img/favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('min/img/favicon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('min/img/favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('min/img/favicon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('min/img/favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('min/img/favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('min/img/favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('min/img/favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('min/img/favicon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{asset('min/fivico')}}n/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('min/img/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('min/img/favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('min/fiviconfavicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('min/img/favicon/manifest.json')}}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{asset('min/img/favicon/ms-icon-144x144.png')}}">
	<meta name="theme-color" content="#ffffff">
	<title>Vou a Missa - @yield('title')</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('/min/css/styles.css')}}">
	
	@yield('pre-assets')
	
	
</head>



	<body >
	
<div class="loadingPage">
				<img src="{{asset('min/img/logo.png')}}" alt="" class="animated infinite pulse"><Br>
				Carregando...
			</div>

	<div id="tudo">
			<header>
			<div class="controle">
				<div class="logo">
					<a href=""><img src="{{asset('/min/img/logo.png')}}" alt=""></a>
				</div>
				<div class="controle" id="containerMenu">
<div id="container-nav">
				<div id="nav-icon2" data-alvo="nav#menu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				</div>
				<nav id="menu" class="interno">
					{!!$menuSuperior!!}
				</nav>
			</div>
			</div>
			
		</header>
		
		
		
		<div id="conteudo">
			@yield('content')
			<div class="clearfix"></div>
		</div>
		
	</div>
	

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	
	
	
	
	@yield('pos-scripts')

	<script>
		$(".loadingPage").fadeOut('fast')
	</script>
</body>

</html>