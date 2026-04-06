<x-layout title="Bienvenidos">
<h1>Bienvenidos</h1>

<div>
@auth

  Hola {{ Auth::user()->name }}.

  <a href="{{ route('dashboard') }}">Dashboard</a>

  <a href="{{ route('logout') }}"
     onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"
    >Cerrar sesión</a>.
  <form id="logout-form"
        action="{{ route('logout') }}"
        method="post"
        style="display: none;">
    @csrf
  </form>
@else
  <a href="{{ route('register') }}">Registrate</a> o
  <a href="{{ route('login') }}">Inicia sesión</a>.
@endauth
</div>
</x-layout>
<!-- vi: set filetype=php: -->
