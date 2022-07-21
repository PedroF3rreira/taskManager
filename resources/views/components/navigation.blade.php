@auth
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 border-bottom shadow bg-white rounded mb-5">
  <a class="navbar-brand text-success" href="#">ERP Silva</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('task.index') }}">Agenda de tarefas</a>
      </li>
    </ul>
  </div>
    <p class="text-secondary my-2 p-2">{{Auth::user()->email}}</p>
    <a href="{{ route('logout.do') }}" title="logout" class="btn btn-sm btn-outline-success ml-2 mr-2">Sair</a>
</nav>

@endauth