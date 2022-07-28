@props(['errors'])

<div class="container">
  @if($errors->all())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger mx-auto" role="alert">
        {{ $error }}
      </div>
      @endforeach
  @endif
</div>

