@props(['categories'])
<!-- Modal -->
<div class="modal fade col-md-12 col-sm-12" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <select class="form-select mt-3" name="category" aria-label="Default select example">
            <option selected >Selecione uma categoría</option>
            @foreach( $categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
          
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