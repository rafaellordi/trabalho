@extends ('app')
@section('content')
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
	<div class="container mt-5">
		<a href="{{ route('post.list')}}" class="btn btn-info">Voltar</a>
	</div>
@endsection