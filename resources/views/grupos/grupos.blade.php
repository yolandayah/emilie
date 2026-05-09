<x-layout title="{{$asignatura->nombre}}" view="grupos" conTabla=true>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Grupos</th>
 <th>Maestro</th>
</tr>
</thead>
<tbody>
@forelse ($asignatura->grupos as $grupo)
<tr>
 <td>{{ $grupo->nombre }}</td>
 <td>{{ $grupo->user->name }} {{ $grupo->user->last_name }}</td>
</tr>
@empty
<tr>
 <td>No hay asignaturas registradas</td>
</tr>
@endforelse
</tbody>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
