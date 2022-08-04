{{-- Pegando dados do componente pai --}}
@aware(['tasks'])

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
  
  <td class="align-middle text-center">
   
   <h6 class="mb-0 ml-3">
     {{ $task->category->title??''  }}
   </h6> 
   <div class="rounded" style="background-color: {{  $task->category->color??'' }};height: 10px;">
   </div>

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

