<x-layout title="Actualizar contraseña">

<div class="login-container">
 <h2>Actualizar Contraseña</h2>
  <form method="POST" action="{{ route('login') }}">

    @csrf

    <x-form-errors />

    <p >
      Por seguridad, debes cambiar tu contraseña.
    </p>

    <div class="form-group">
     <label for="password">Nueva contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña" required>
    @error('password')
        <span role="alert">{{ $message }}</span>
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

</x-layout>
<!-- vi: set filetype=php: -->
