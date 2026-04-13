<x-layout title="Panel de información">

<h1>Bienvenido {{ Auth::user()->name }} al sistema</h1>

<form method="POST" action="{{ route('logout') }}">

	@csrf

    <button type="submit">Logout</button>
</form>

<div>
  <a href="{{ route('admin.user.index') }}">Lista de usuarios</a></br>
</div>
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>10
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>20
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>30
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>40
<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>50
</x-layout>
<!-- vi: set filetype=php: -->
