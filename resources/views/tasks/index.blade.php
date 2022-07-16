@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')

<!--<section class="vh-100 gradient-custom-2">-->
  <div class="container ">
  	<div class="border">
	<div class="tasks-navigation p-2 d-flex justify-content-between align-items-center">
		<a href="{{ route('task.create') }}" title="newTask" class="btn btn-sm btn-outline-secondary "><i class="bi bi-journal-plus"></i> nova tarefa</a>
		
		<form action="{{ route('task.find') }}" class="form-inline" method="get" >
			<div class="input-group d-flex align-items-center">
				<div class="input-group-prepend">
					<button type="submit" class="input-group-text  " id="basic-addon1 "><i class="bi bi-search"></i></button>
				</div>
				<input type="search" name="search" class="form-control " placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon1">
			</div>
		</form>
	</div>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-12">

        <div class="card mask-custom ">
          <div class="card-body p-4 text-secondary">

            <div class="text-center pt-3 pb-2">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                alt="Check" width="60">
              <h2 class="my-4">Lista de Tarefas</h2>
            </div>

            <table class="table mb-0 text-secondary">
              <thead>
                <tr>
                  <th scope="col">Usuário</th>
                  <th scope="col">Tarefa</th>
                  <th scope="col">Status</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($tasks as $task)
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">{{ $task->user->name }}</span>
                  </th>
                  <td class="align-middle ">
                    <a href="{{ route('task.show',['task' => $task->id]) }}" class="link-secondary">
                      <span>{{ $task->title }}</span>
                    </a>
                  </td>
                  <td class="align-middle">
                    <h6 class="mb-0">
                    	<span class="badge bg-{{$task->status?'success':'warning'}}">
                    		{{ $task->status?'Concluida':'Pendente' }}
                    	</span>
                    </h6>
                  </td>
                  <td class="align-middle d-flex">
                    
                    <form action="{{ route('task.edit', ['task' => $task->id]) }}" method="post" accept-charset="utf-8">  
                      @csrf
                      @method('PUT')
                      <button href="#!" data-mdb-toggle="tooltip" title="Concluir" class="border-0 btn btn-outline-success">
                        <i class="bi bi-check-circle"></i>
                      </button>
                    </form>
          
                    
                    <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" data-mdb-toggle="tooltip" title="Deletar" class="border-0 btn btn-outline-danger ">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection