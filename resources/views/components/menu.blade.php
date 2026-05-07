
@props(['view' => 'home'])

<div class="topnav" id="myTopnav">
  <a {{ $view == 'home' ? 'class=active' : '' }} href="{{ route('home') }}">Inicio</a>
@auth
  <a {{ $view == 'dashboard' ? 'class=active' : '' }} href="{{ route('dashboard') }}">Dashboard</a>

  @can('user.index')
  <a {{ $view == 'user' ? 'class=active' : '' }} href="{{ route('admin.user.index') }}">Usuarios</a>
  <a {{ $view == 'grupos' ? 'class=active' : '' }} href="{{ route('admin.grupos.index') }}">Asignaturas</a>
  @endcan

  <form class="form-logout" method="POST" action="{{ route('logout') }}">
	@csrf
    <button class="dropbtn" type="submit">Salir</button>
  </form>
<!--
  <div class="dropdown">
    <button class="dropbtn {{ $view == 'user' ? 'active': '' }}">Usuarios &#11206</button>
    <div class="dropdown-content">
      <a href="{{ route('admin.user.index') }}">Lista de usuarios</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
-->
@else
  <a {{ $view == 'register' ? 'class=active' : '' }} href="{{ route('register') }}">Registrate</a>
  <a {{ $view == 'login' ? 'class=active' : '' }} href="{{ route('login') }}">Inicia sesión</a>
@endauth
<!--
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown &#11206</button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <a href="#about">About</a>
-->
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="topnavResponsive()">&#9776;</a>
</div>
<!-- vi: set filetype=php: -->
