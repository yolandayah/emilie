<div class="topnav" id="myTopnav">
  <a class="active" href="{{ route('home') }}">Inicio</a>
@auth
  <a href="{{ route('dashboard') }}">Dashboard</a>
  <form class="form-logout" method="POST" action="{{ route('logout') }}">
	@csrf
    <button class="btnmenu" type="submit">Logout</button>
  </form>
@else
  <a href="{{ route('register') }}">Registrate</a>
  <a href="{{ route('login') }}">Inicia sesión</a>
@endauth
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--
<div id="navbar">
  <a class="active" href="javascript:void(0)">Home</a>
  <a href="javascript:void(0)">News</a>
  <a href="javascript:void(0)">Contact</a>
</div>

<nav>
  <a class="current" href="{{ route('home') }}">Home</a>
@auth
  <a href="{{ route('dashboard') }}">Dashboard</a>
  <form method="POST" action="{{ route('logout') }}">
	@csrf
    <button class="btnmenu" type="submit">Logout</button>
  </form>
@else
  <a href="{{ route('register') }}">Registrate</a>
  <a href="{{ route('login') }}">Inicia sesión</a>
@endauth
</nav>
-->
<!-- vi: set filetype=php: -->
