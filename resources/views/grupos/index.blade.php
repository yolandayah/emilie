<x-layout title="Asignaturas" view="grupos" conTabla=true>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Asignatura</th>
</tr>
</thead>
<tbody>
@forelse ($asignaturas as $asignatura)
<tr>
 <td>{{ $asignatura->nombre }}</td>
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
