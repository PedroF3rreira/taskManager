@extends('layouts.app')

@section('title')
	dashboard | Registrar
@endsection

@section('content')
	<h3 class="text-center mt-5">Sistema Login</h3>
	
	@if($errors->all())
		@foreach($errors->all() as $error)
			<div class="alert alert-warning" role="alert">
				{{ $error }}
			</div>
		@endforeach
	@endif

	<form action="{{ route('register.do') }}" method="post" class="col-5 mx-auto border rounded p-3 bg-light ">
		@csrf
		<div class="form-group">
			<input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control mb-3 mt-3" placeholder="Digite seu nome">
		</div>

		<div class="form-group">
			<input type="mail" name="email" value="{{ old('email') }}" id="email" class="form-control mb-3 mt-3" placeholder="E-mail: ">
		</div>

		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control" placeholder="Password:">
		</div>
		<div class="d-flex flex-column">
			<input type="submit"  value="Cadastrar" class="btn btn-success mt-3 mb-3">
		</div>
	</form>
@endsection