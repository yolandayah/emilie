<x-layout title="Emilie - Inicio de sesión">
<div class="login-container">
 <h2>Iniciar Sesión</h2>
  <form method="POST" action="{{ route('login.process')}}">

    @csrf

    <x-form-errors />

    <div class="form-group">
     <label for="email">Email:</label>
     <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email')}}" required>
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
</x-layout>
<!-- vi: set filetype=php: -->
