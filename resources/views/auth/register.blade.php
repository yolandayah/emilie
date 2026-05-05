<x-layout title="Registro de usuario" view="register">

<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('register.process') }}">

    @csrf

    <div class="form-group">
     <label for="name">Nombre de usuario:</label>
     <input type="text" id="username" name="username"
      oninput="this.value = this.value.toLowerCase()"
      placeholder="Nombre de usuario" value="{{ old('username')}}" required>
    @error('username')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="name">Nombre:</label>
     <input type="text" id="name" name="name" placeholder="Nombre" value="{{ old('name')}}" required>
    @error('name')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="last_name">Apellidos:</label>
     <input type="text" id="last_name" name="last_name" placeholder="Apellidos" value="{{ old('last_name')}}" required>
    @error('last_name')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="email">Email:</label>
     <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email')}}" required>
    @error('email')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="password">Contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña" required>
    @error('password')
      <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
      </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="password_confirmation">Confirmar contraseña:</label>
     <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>
    </div>

    <button type="submit">Registrarse</button>
  </form>
</div>
</div>
</x-layout>
<!-- vi: set filetype=php: -->
