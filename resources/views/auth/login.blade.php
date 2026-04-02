<x-layout>
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

    <button type="submit">Iniciar Sesión</button>
  </form>
<p class="signup-link">¿No tienes cuenta? <a href="#">Regístrate</a></p>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
