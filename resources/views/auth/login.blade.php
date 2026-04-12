<x-layout title="Inicio de sesión">

<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('login.process')}}">

    @csrf

    <x-form-errors />

    <div class="form-group">
     <label for="login">Usuario o Email:</label>
     <input type="text" id="login" name="login" placeholder="Usuario o Email" value="{{ old('login')}}" required>
    </div>

    <div class="form-group">
     <label for="password">Contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña" required>
    </div>

    <div class="form-group">
     <label for="remember">
      <input type="checkbox"
             name="remember" {{ old('remember') == 'on' ? 'checked' : '' }}>
      Mantener sesión iniciada
     </label>
    </div>

    <button type="submit">Iniciar Sesión</button>
  </form>
 <p class="signup-link">¿No tienes cuenta?
 <a href="{{ route('register') }}">Regístrate</a></p>
</div>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
