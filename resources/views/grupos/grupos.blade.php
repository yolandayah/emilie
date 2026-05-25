<x-layout title="{{$asignatura->nombre}}" view="grupos" conTabla=true>
<div class="align-right">
<a class="button" href="{{ route('grupos.create.grupo',['asignatura'=>$asignatura->id]) }}">Nuevo Grupo</a>
</div>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Grupos</th>
 <th>Maestro</th>
 <th>Alumnos</th>
 <th></th>
</tr>
</thead>
<tbody>
@forelse ($asignatura->grupos as $grupo)
<tr>
 <td>{{ $grupo->nombre }}</td>
 <td>{{ $grupo->user->name }} {{ $grupo->user->last_name }}</td>
 <td><a class="button" href="{{ route('grupos.alumnos',['grupo'=>$grupo->id]) }}">Ver</a></td>
 <td>
  <a class="button" href="#">Editar</a>
  <a class="button" href="#">Archivar</a>
  <a class="button" href="#">Borrar</a>
 </td>
</tr>
@empty
<tr>
 <td>No hay grupos registrados</td>
 <td></td>
 <td></td>
 <td></td>
</tr>
@endforelse
</tbody>
<tfoot>
<tr>
 <th>Grupos</th>
 <th>Maestro</th>
 <th>Alumnos</th>
 <th></th>
</tr>
</tfoot>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
