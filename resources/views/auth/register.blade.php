<x-layout>

<div class="login-container">
 <h2>Registro de usuario</h2>
  <form method="POST" action="{{ route('register.store') }}">

    @csrf

    <x-form-errors />

    <div class="form-group">
     <label for="name">Nombre:</label>
     <input type="text" id="name" name="name" placeholder="Nombre" required>
    </div>

    <div class="form-group">
     <label for="email">Email:</label>
     <input type="email" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
     <label for="password">Contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña" required>
    </div>

    <button type="submit">Registrarse</button>
  </form>

</x-layout>
<!-- vi: set filetype=php: -->
