<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 @auth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('task.index') }}">Agenda de tarefas</a>
      </li>
    </ul>
  </div>
  <form class="form-inline my-2 my-lg-0 d-flex">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success m-2 my-sm-0" type="submit">Pesquisar</button>
  </form>
 
    <p class="text-light my-2 p-2">{{Auth::user()->email}}</p>
    <a href="{{ route('logout.do') }}" title="logout" class="btn btn-success ml-2 mr-2">Sair</a>
  @endauth
</nav>