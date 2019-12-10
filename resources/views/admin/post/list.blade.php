@extends('adminlte::page')

@section('title', 'Gerenciar Posts')

@section('content_header')
    <div class="row">
		<div class="col-md-10 mb-3">
    		<h2>Lista de serviços</h2>
		</div>
		<div class="col-md-2">
			<h2></h2>
    		<a href="{{ route('admin.post') }}" class="btn btn-success"> Nova publicação</a>
    	</div>
    </div>
@stop

@section('content')
    <div id="form-publicar">
		<table class="table">
			<tr>
				<th>Id</th>
				<th>Título</th>
				<th>Imagem</th>
				<th>Data</th>
				<th class="text-center">Ação</th>
			</tr>
			@forelse($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->titulo }}</td>
					<td>{{ $post->imagem }}</td>
					<td>{{ $post->data }}</td>
					<td class="text-center">
						<a type="button" class="btn btn-info" href="{{route('post.vizualizar', $post->id)}}">Vizualizar</a>
						<a type="button" class="btn btn-success" href="{{route('post.edit', $post->id)}}">Editar</a>
						<a type="button" class="btn btn-danger" href="{{route('post.deletar', $post->id)}}">Excluir</a>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5">Nenhum serviço registrado</td>
				</tr>
			@endforelse
		</table>
		{!! $posts->links() !!}
	</div>
@stop