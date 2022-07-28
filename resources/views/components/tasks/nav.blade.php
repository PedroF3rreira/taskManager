<div class="tasks-navigation p-2 d-flex justify-content-between align-items-center border">
  <button href="{{ route('task.create') }}"  type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
    <i class="bi bi-journal-plus"></i> nova tarefa
  </button>

  <form action="#" class="form-inline" method="get" >
     <div class="input-group d-flex align-items-center">
      <div class="input-group-prepend">
       <button type="submit" class="input-group-text  " id="basic-addon1 "><i class="bi bi-search"></i></button>
     </div>
     <input type="search" name="search" class="form-control " placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon1">
   </div>
  </form>
</div>