<x-layout title="Asignaturas" view="grupos" conTabla=true>
<div class="align-right">
<a class="button" href="{{ route('grupos.create') }}">Nueva Asignatura</a>
</div>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Asignatura</th>
 <th>Grupos</th>
 <th></th>
</tr>
</thead>
<tbody>
@forelse ($asignaturas as $asignatura)
<tr>
 <td>{{ $asignatura->nombre }}</td>
 <td><a class="button" href="{{ route('grupos.lista',['asignatura'=>$asignatura->id]) }}">Ver</a></td>
 <td><a class="button" href="{{ route('grupos.edit',['asignatura'=>$asignatura->id]) }}">Editar</a>
 <a class="button" href="{{ route('grupos.edit',['asignatura'=>$asignatura->id]) }}">Borrar</a></td>
</tr>
@empty
<tr>
 <td>No hay asignaturas registradas</td>
 <td></td>
 <td></td>
</tr>
@endforelse
</tbody>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
