<x-layout title="Actualizar contraseña">

<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('password.update.process') }}">

    @csrf

    <div class="warning"><p><strong>¡Advertencia!</strong>:
      Por seguridad, debes cambiar tu contraseña.
    </p></div>

    <div class="form-group">
     <label for="password">Nueva contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña" required>
    @error('password')
        <div class="danger"><p><strong>¡Error!</strong>: {{ $message }}</p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="password_confirmation">Confirmar nueva contraseña:</label>
     <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>
    </div>

    <button type="submit">Guardar y Continuar</button>
  </form>

<form method="POST" action="{{ route('logout') }}">

	@csrf

    <button type="submit">Cerrar sesión</button>
</form>
</div>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
