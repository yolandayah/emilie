<x-layout title="Nuevo grupo" view="grupos" >
<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('grupos.store.grupo') }}">

    @csrf
    <input type="hidden" name="asignatura_id" value="{{ $asignatura->id }}" autocomplete="off">

    <div class="form-group">
     <label for="name">Nombre del grupo:</label>
     <input type="text" id="nombre" name="nombre"
      placeholder="Nombre del grupo" value="{{ old('nombre')}}" required>
    @error('nombre')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="user_id">Maestro:</label>
     <select name="user_id">
     <option value="">-- Seleccione una opción --</option>
     @foreach ($users as $user)
      <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
      {{ $user->name }} {{ $user->last_name }}</option>
     @endforeach
     </select>
    @error('user_id')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <button type="submit">Guardar</button>
    <a class="button" href="{{ route('grupos.lista',['asignatura'=>$asignatura->id]) }}">Cancelar</a></td>
  </form>
</div>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
