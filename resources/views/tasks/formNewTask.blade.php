@extends('layouts.app')

@section('title')
	{{ $title }}
@endsection

@section('content')
<p class=" text-center text-capitalize mt-3  ">cadastro de tarefas</p>
	<form action="{{ route('task.store') }}" method="post" accept-charset="utf-8" class="border rounded p-3 mt-3 col-6 mx-auto shadow-lg">
		@csrf
		<div class="form-group">
			<label for="title" class="text-secondary">Titulo da tarefa:</label>
			<input type="text" name="title" maxlength="50" class="form-control">
		</div>
		<div class="form-group mt-3">
			<label for="title" class="text-secondary">Observações:</label>
			<textarea class="form-control" cols="50" rows="10" name="content"></textarea>
		</div>
		<input type="hidden" name="status" value="0">
		<input type="hidden" name="id_user" value="{{ Auth::id() }}">
		<input type="submit" value="Criar Tarefa" class="btn btn-success form-control mt-3">
	</form>
@endsection