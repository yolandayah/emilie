<x-layout title="Bienvenidos">

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

<img src="/img/emiliedechatelet.jpg">

<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>10
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>20
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>30
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>40
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>50

</x-layout>
<!-- vi: set filetype=php: -->
