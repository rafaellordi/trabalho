@extends('adminlte::page')

@section('title', 'Editar Post')

@section('content_header')
    <h1>Editar Serviço</h1>
    <ol class="breadcrumb">
    	<li><a href="">Dashboard</a></li>
    	<li><a href=""> </a></li>
    	<li><a href=""> </a></li>
    </ol>
@stop

@section('content')

    <div class="box">
    	<div class="box-header">
    		<a href="{{ route('post.list') }}" class="btn btn-primary">Todos os Serviços</a>
    	</div>
	
		@if (session("erro"))
			<div class="alert alert-danger">
				{{ session("erro") }}
			</div>
		@endif
	
		<!--
		<div class="box-body">
			@include('partials.messages')

			{{ Form::model($post, ['route' => ['post.atualizar', $post->id], 'class' => 'form', 'method' => 'post' ])}}
				<div class="form-group">
					{!! Form::label('titulo', 'Título:') !!}
					{!! Form::text('titulo', null, ['placeholder' => 'Preencha este campo', 'class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('imagem', 'Imagem:') !!}
					{!! Form::file('imagem', ['class' => 'form-control', 'url' => 'storage/', $post->imagem])!!}
				</div>
				<div class="form-group">
					{!! Form::label('descricao', 'Descrição') !!}
					{!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('data', 'Data:') !!}
					{!! Form::text('data', null, ['class' => 'form-control date', 'id' => 'datepicker1']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit('Enviar Publicação', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	-->
    	
    	<div class="box-body">
    		@include('partials.messages')
    		<form method="POST" action="{{ route('post.atualizar', $post->id) }}" enctype="multipart/form-data" id="form-publicar" class="shadow-sm p-3 mb-5 bg-white rounded">
    			{!! csrf_field() !!}
    			<div class="form-group">
    				<label>Título</label>
					<input type="text" name="titulo" class="form-control" id="titulo" value="{{ $post->titulo}}">
    			</div>
    			<div class="form-group">
					<label>Imagem</label>
					@if ($post->imagem != null)
						<img src="{{asset('storage/'.$post->imagem)}}" alt="{{ $post->imagem}}" style="max-width: 50px;">
					@endif
					<input type="file" name="imagem" id="imagem" class="form-control" value="{{ $post->imagem }}"><br>
				</div>
				<div class="form-group">
					<label>Descrição</label>
					<textarea class="form-control"  name="descricao" rows="5" id="descricao"> {{ $post->descricao }}</textarea>
				</div>
				<div class="form-group">
					<label>Data</label>
					<input type="text" name="data" id="datepicker1" class="form-control" value="{{ $post->data }}">
				</div>
				<div class="form-group">
					<label></label>
					<input type="submit" value="Atualizar" class="btn btn-success">
				</div>
			</form>
		</div>
	
		
	</div>
@stop
@section('js')
    <script type="text/javascript">
        $(function () {
			$('#datepicker1').datepicker({
			    language: 'pt-BR'
			});
        });
    </script>
 @stop