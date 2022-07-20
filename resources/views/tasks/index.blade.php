@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Tarefa</h5>
       
        <!-- Button trigger modal -->
        <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="bi bi-x-circle btn btn-outline-danger border-0"></span>
        </button>

      </div>

      <!--modal body-->
      <div class="modal-body">
        <form action="{{ route('task.store') }}" method="post" accept-charset="utf-8" class="border rounded p-3 mt-3 mx-auto shadow-lg">
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
      </div>

      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
<!--<section class="vh-100 gradient-custom-2">-->
  <div class="container mt-3 ">
  	<div class="border">
	<div class="tasks-navigation p-2 d-flex justify-content-between align-items-center">
		<button href="{{ route('task.create') }}"  type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
      <i class="bi bi-journal-plus"></i> nova tarefa
    </button>
		
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
                  <td class="align-middle">
                    <a href="{{ route('task.show',['task' => $task->id]) }}" class="link-secondary">
                      <span>{{ $task->title }}</span>
                    </a>
                  </td>
                  <td class="align-middle">
                    <h6 class="mb-0">
                    	<span class="badge bg-{{$task->status?'success':'warning'}} status">
                    		{{ $task->status?'Concluida':'Pendente' }}
                    	</span>
                    </h6>
                  </td>
                  <td class="align-middle d-flex p-3">
                    <!--Atualiza tarefa-->
                    <form  data="{{ $task->id }}" method="post" name="formUpdateTask">  
                      @csrf
                      @method('PATCH')
                      <button type="submit" data-mdb-toggle="tooltip" title="Concluir" class="border-0 btn btn-{{ $task->status?'':'outline-' }}success">
                        <i class="bi bi-check-circle"></i>
                      </button>
                    </form>
          
                    <!--deleta tarefa-->
                    <form name="formDeleteTask"  method="post" data="{{ $task->id }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" id="delete" data-mdb-toggle="tooltip" title="Deletar" class="border-0 btn btn-outline-danger ">
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