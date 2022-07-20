@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100 mt-3">

	<div class="col-md-12 col-xl-12">
		<a href="{{ route('task.index') }}" title="Voltar" class="btn btn-outline-secondary mb-2" style="font-size:16px ;"><i class="bi bi-arrow-left">voltar</i> </a>
		<div class="card mask-custom ">
			<div class="card-body p-4 text-secondary">

				<div class="text-center pt-3 pb-2">
					<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
					alt="Check" width="60">
					<h2 class="my-4">{{ $title }}</h2>
				</div>
				<div class="d-flex justify-content-between border p-3">
					<div class="content">
						Conteudo:
					</div>
					<div class="info">
						Status:
					</div>
				</div>
				<div class="d-flex justify-content-between p-2 border">
					<div class="content col-8 border p-3">
						{{ $task->content }}
					</div>
					<div class="info col-4 p-3 border">
						<div class="d-flex justify-content-between">
							<div class="">Criada em: </div>
							<p>{{date('d-m-y h:m:s', strtotime($task->created_at))}}</p>
						</div>
						<div class="d-flex justify-content-between">
							<div>Atualizado em: </div>
							<p>{{date('d-m-y h:m:s', strtotime($task->updated_at))}}</p>
						</div>
		
						<div class="d-flex justify-content-between">
							<div>Status: </div>
							<p class=" badge bg-{{ $task->status?'success':'warning' }}">{{$task->status?'Concluida':'Pedente'}}</p>	
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>			
@endsection