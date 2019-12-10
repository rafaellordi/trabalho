@extends ('app')
@section('content')

	<!-- Menu -->
	<div class="container">
	<nav class="navbar navbar-expand-md navbar-light bg-light mt-5" id="inicio">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('index', '/#inicio')}}"><img src="{{asset('/imagens-logo/logo3.png')}}" width="80" height="60"> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<div class="navbar-nav ml-auto mr-4">
				    <a class="nav-item nav-link active mr-4" href="{{ route('index', '/#inicio')}}">Home</a>
				    <a class="nav-item nav-link mr-4" href="{{ route('index','/#servicos')}}">Serviços</a>
				    <a class="nav-item nav-link mr-4" href="{{ route('index', '/#contato')}}">Contato</a>  
				</div>
			</div>
		</div>
	</nav>
	
	<!-- Serviços-->
	<div class="container mt-5">
		<h2 class="text-center" id="servicos">Serviços</h2>
		<div class="row">
			<div class="col-md-3 p-0 ml-auto mt-5">
			  	@if ($post->imagem != null)
		            <img src="{{asset('storage/'.$post->imagem)}}" alt="{{ $post->imagem}}" width="300px" height="200px">
		        @endif
		    </div>
		    <div class="col-md-8 px-3">
		        <div class="card-block px-3">
		            <h4 class="card-title mt-5">{{ $post->titulo }}</h4>
		            <p class="card-text">{{ $post->descricao }}</p>    
		        </div>
		    </div>
		</div>
	</div>
@endsection

