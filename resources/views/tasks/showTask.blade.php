@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100 mt-3">
	<div class="col-md-12 col-xl-12">

		<div class="card mask-custom ">
			<div class="card-body p-4 text-secondary">

				<div class="text-center pt-3 pb-2">
					<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
					alt="Check" width="60">
					<h2 class="my-4">{{ $title }}</h2>
				</div>
				<div class="d-flex justify-content-between border-top p-3">
					<div class="content">
						Conteudo:
					</div>
					<div class="info">
						Status:
					</div>
				</div>
				<div class="d-flex justify-content-between border-top p-2">
					<div class="content ">
						{{ $task->content }}
					</div>
					<div class="info">
						<div>
							{{$task->created_at}}
						</div>
						<div>
							{{$task->updated_at}}	
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>			
@endsection