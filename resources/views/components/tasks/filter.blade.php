<div class="dropdown p-0 position-static col-1">
  <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-funnel"></i> filtrar
  </button>
  
  <ul class="dropdown-menu  flex-column" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{ route('task.order', ['search' => 'priority']) }}"><i class="bi bi-arrow-up-short"> maior prioridade</i></a></li>
    <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-down-short"> menor prioridade</i></a></li>
    <li><a class="dropdown-item" href="{{ route('task.order', ['search' => 'pedding']) }}"><i class="bi bi-arrow-clockwise"> pendentes</i></a></li>
    <li><a class="dropdown-item" href="{{ route('task.order', ['search' => 'concluded']) }}"><i class="bi bi-check-all"> concluídas</i></a></li>
    <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-week"> de recentes a antigas</i></a></li>

  </ul>
</div>