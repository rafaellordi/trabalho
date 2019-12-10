@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <div class="row">
		<div class="col-md-10 mb-3">
    		<h2>Cadastro de Serviço</h2>
		</div>
		<div class="col-md-2">
			<h2></h2>
    		<a href="{{ route('post.list') }}" class="btn btn-info"> Gerenciar Publicações</a>
    	</div>
    </div>
@stop

@section('content')

    <div class="box">
	
		@if (session("erro"))
			<div class="alert alert-danger">
				{{ session("erro") }}
			</div>
		@endif

		<div class="box-body">
			@include('partials.messages')

			{!! Form::open(['route' => 'post.create', 'method' => 'POST', 'files' => 'true']) !!}
				<div class="form-group">
					{!! Form::label('titulo', 'Título:') !!}
					{!! Form::text('titulo', null, ['placeholder' => 'Preencha este campo', 'class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('imagem', 'Imagem:') !!}
					{!! Form::file('imagem', ['class' => 'form-control'])!!}
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


    	<!--<div class="box-body">
    		@include('partials.messages')
    		<form method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data" id="form-publicar" class="shadow-sm p-3 mb-5 bg-white rounded">
    			{!! csrf_field() !!}
    			<div class="form-group">
    				<label>Título</label>
					<input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}">
    			</div>
    			<div class="form-group">
					<label>Imagem</label>
					<input type="file" name="imagem" id="imagem" class="form-control" value="{{ old('imagem') }}"><br>
				</div>
				<div class="form-group">
					<label>Descrição</label>
					<textarea class="form-control" name="descricao" rows="5" id="descricao" > {{ old('descricao') }}</textarea>
				</div>
				<div  class="form-group">
					<label>Data</label>
					<input type="date" name="data" id="data" class="form-control mx-sm-3" value="{{ old('data') }}">
				</div>
				<div class="form-group">
					<label></label>
					<input type="submit" value="Enviar Publicação" class="btn btn-success">
				</div>
			</form>
		</div>
	-->
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