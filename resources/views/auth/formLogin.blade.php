@extends('layouts.app')

@section('title')
	dashboard | login
@endsection

@section('content')
	<h3 class="text-center mt-5 ">Sistema Login</h3>
	
	@if($errors->all())
		@foreach($errors->all() as $error)
			<div class="alert alert-danger col-5 mx-auto" role="alert">
				{{ $error }}
			</div>
		@endforeach
	@endif

	<form action="{{ route('login.do') }}" method="post" class="col-5 mx-auto border rounded p-3 bg-light ">
		@csrf
		<div class="form-group">
			<input type="mail" name="email" value="{{ old('email') }}" id="email" class="form-control mb-3 mt-3" placeholder="E-mail:">
		</div>

		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control" placeholder="Password:">
		</div>
		<div class="d-flex flex-column">
			<input type="submit"  value="Logar" class="btn btn-success mt-3 mb-3">
			<div>
				<p class="text-secondary">não é registrado? <a href="{{ route('register') }}" title="rigistrar" class="font-weight-light">registrar-se</a></p>
			</div>
		</div>

		<label class="text text-secondary mt-2">Lembre minhas credenciais?</label>
		<input type="checkbox" name="remenber" checked value="1">
	</form>
@endsection