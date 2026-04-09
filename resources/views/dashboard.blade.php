<x-layout title="Anuncios">

<h1>Bienvenido {{ Auth::user()->name }} al sistema</h1>

<form method="POST" action="{{ route('logout') }}">

	@csrf

    <button type="submit">Logout</button>
</form>

<div>
  <a href="{{ route('admin.users.index') }}">Lista de usuarios</a></br>
</div>

</x-layout>

<!-- vi: set filetype=php: -->
