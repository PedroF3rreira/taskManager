<div class="tasks-navigation p-2 border">
  <button href="{{ route('task.create') }}"  type="button" class="btn btn-sm btn-outline-secondary mb-1" data-toggle="modal" data-target="#exampleModal">
    <i class="bi bi-journal-plus"></i> nova tarefa
  </button>
  {{-- Componete de filtro --}}
  <x-tasks.filter/>
</div>