<x-layout title="Editar usuario" view="user">

<div class="to-center-container">
<div class="form-container">
  <form method="POST" action="{{ route('admin.user.update', $user) }}">

    @csrf

    @method('PUT')

    <div class="form-group">
     <label for="name">Nombre de usuario:</label>
     <input type="text" id="username" name="username" placeholder="Nombre de usuario" value="{{ old('username',$user->username) }}" required>
    @error('username')
    <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
    </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="name">Nombre:</label>
     <input type="text" id="name" name="name" placeholder="Nombre" value="{{ old('name',$user->name) }}" required>
    @error('name')
    <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
    </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="email">Email:</label>
     <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email',$user->email) }}" required>
    @error('email')
    <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
    </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="password">Contraseña:</label>
     <input type="password" id="password" name="password" placeholder="Contraseña">
    @error('password')
    <div class="warning"><p><strong>¡Advertencia!</strong>:
      {{ $message }}
    </p></div>
    @enderror
    </div>

    <div class="form-group">
     <label for="password_confirmation">Confirmar contraseña:</label>
     <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña">
    </div>

    @can('user.edit.roles')
    <div class="form-group">
     <h4>Roles:</h4>
     @foreach ($roles as $rol)
     <input type="checkbox" id="chk{{$rol->name}}" name="chk{{$rol->name}}" value="{{$rol->name}}"
     {{ old('chk'."$rol->name") || $user->hasRole("$rol->name") ? 'checked' : '' }} >
     <label for="chk{{$rol->name}}">{{$rol->name}}</label><br/>
     @endforeach
    </div>
    @endcan

    <button type="submit">Guardar</button>
    <a class="button" href="{{ route('admin.user.index') }}">Cancelar</a>
  </form>
</div>
</div>

</x-layout>
<!-- vi: set filetype=php: -->
