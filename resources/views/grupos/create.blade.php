<x-layout title="Nueva asignatura" view="grupos" >
<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('grupos.store') }}">

    @csrf

    <div class="form-group">
     <label for="name">Nombre de la asignatura:</label>
     <input type="text" id="nombre" name="nombre"
      placeholder="Nombre de la asignatura" value="{{ old('nombre')}}" required>
    @error('nombre')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <button type="submit">Guardar</button>
    <a class="button" href="{{ route('grupos.index') }}">Cancelar</a>
  </form>
</div>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
