@if(Session::has('success'))
	<div class="alert alert-success">
		<strong>Successo:</strong>
		<p>{{Session::get('success')}}</p>
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Errors:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif