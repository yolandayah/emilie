<x-layout title="Panel de información" view="dashboard">
<div class="contenedor-tarjetas">
@foreach ($grupos as $grupo)
 <div class="tarjeta">
  <h3>{{ $grupo->asignatura->nombre }}</h3>
  <p>{{ $grupo->nombre }}</p>
  <button class="button btn-tarjeta">Ingresar</button>
 </div>
@endforeach
</div>
</x-layout>
<!-- vi: set filetype=php: -->
