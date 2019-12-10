@extends ('app')
@section('content')

	<!-- Menu -->
	<div class="container">
	<nav class="navbar navbar-expand-md navbar-light bg-light mt-5" id="inicio">
		<div class="container-fluid">
			<a class="navbar-brand" href="#inicio"><img src="{{asset('/imagens-logo/logo3.png')}}" width="80" height="60"> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto mr-4">
					<li class="nav-item active mr-4">
						<a class="nav-link" href="#inicio">Início</a>
					</li>
					<li class="nav-item mr-4">
						<a class="nav-link" href="#servicos">Serviços</a>
					</li>
					<li class="nav-item mr-5">
						<a class="nav-link" href="#contato">Contato</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Banners -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  	<ol class="carousel-indicators">
	  		@foreach($banners as $banner)
	    		<li data-target="#carouselExampleIndicators" data-slide-to="{{$banner->id}}" class="active"></li>
	    	@endforeach
	  	</ol>
  		<div class="carousel-inner">
		  	@foreach($banners as $banner)
			  	@if ($banner->id == 46)
				    <div class="carousel-item active">
		      			<img class="d-block w-100" src="{{asset('storage/'.$banner->imagem)}}" alt="First slide">
		    		</div>
				@endif

				@if ($banner->id > 46)
		    		<div class="carousel-item">
		      			<img class="d-block w-100" src="{{asset('storage/'.$banner->imagem)}}" alt="First slide">
		    		</div>
				@endif
    		@endforeach
  		</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
 		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
	</div>
	</div>
	
	<!-- Serviços-->
	<div class="container mt-5">
		<h2 class="text-center" id="servicos">Serviços</h2>
		<div class="row">
			@foreach($posts as $post)
			  	<div class="col-sm-4 mt-4">
					<div class="card">
				  		@if ($post->imagem != null)
							<img src="{{asset('storage/'.$post->imagem)}}" alt="{{ $post->imagem}}" width="300px" height="200px">
						@endif
					  	<div class="card-body">
					    	<h5 class="card-title">{{ $post->titulo }}</h5>
					    	<p class="card-text">{{ $post->descricao_resumida }}</p>
					    	<a href="{{ route('servico.visualizar', $post->id) }}" class="btn btn-info">Leia mais</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="container mt-5">
		{!! $posts->links() !!}
	</div>

	<!-- Contato -->
	<div class="container" id="contato">
		<h2 class="text-center m-5" >Contato</h2>
		@include('partials.messages')
		<form method="post" action="\enviar" enctype="multipart/form-data">
			{!! csrf_field() !!}
		  	<div class="form-row">
		  		<div class="col-md-6 mb-3">
			      	<label for="validationDefault01">Nome:</label>
			      	<input type="text" class="form-control" name="nome" value="">
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputEmail4">Email: </label>
			      	<input type="email" class="form-control" name="email">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
				  	<label for="comment">Mensagem: </label>
				  	<textarea class="form-control" cols="5" rows="5" name="mensagem"></textarea>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
                {!! Form::captcha() !!}
            </div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<input class="btn btn-outline-primary" type="submit" value="Enviar">
				</div>
			</div>
		</form>
	</div>

	<!-- Footer -->
	<footer class="page-footer font-small special-color-dark pt-4 ">
	    <div class="container">
	      	<ul class="list-unstyled list-inline text-center">
	        	<li class="list-inline-item">
		          	<a href="www.facebook.com" class="btn-floating btn-fb mx-1">
		            	<i class="fab fa-facebook-f"> </i>
		          	</a>
	        	</li>
		        <li class="list-inline-item">
		          	<a href="www.twitter.com" class="btn-floating btn-tw mx-1">
		            	<i class="fab fa-twitter"> </i>
		          	</a>
		        </li>
		        <li class="list-inline-item">
		          	<a href="gmail.com" class="btn-floating btn-gplus mx-1">
		            	<i class="fab fa-google-plus-g"> </i>
		          	</a>
		        </li>
		        
	    	</ul>
	    </div>
	    <div class="footer-copyright text-center py-3">© 2019 Copyright:
	      <a href="https://getbootstrap.com.br/"> Bootstrap.com.br</a>
	      <p><a href="#inicio">Voltar para o topo</a></p>
	    </div>
	</footer>	
@endsection

