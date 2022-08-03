@props(['tasks', 'filterType'])
<div class="row d-flex justify-content-center align-items-center mt-1">
  <div class="col-md-12 col-xl-12">
    <div class="card mask-custom ">
      <div class="card-body p-4 text-secondary">

        <div class="text-center pt-3 pb-2">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
          alt="Check" width="60">
          <h2 class="my-4">Lista de Tarefas</h2>
        </div>
        <p class="text-secondary">Filtro: {{ $filterType??'Todas tarefas' }}</p>
        <table class="table mb-0 text-secondary">
          <thead>
            <tr>
              <th scope="col">Usuário</th>
              <th scope="col">Tarefa</th>
              <th scope="col">Status</th>
              <th scope="col">Prioridade</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            {{ $slot }}
          </tbody>
        </table>
        {{ $tasks->links() }}
      </div>
    </div>
  </div>
</div>