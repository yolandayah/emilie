<x-layout title="{{$grupo->nombre}}" view="grupos" conTabla=true>
<div class="align-right">
<a class="button" href="#">Agregar alumno</a>
</div>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Nombre</th>
 <th></th>
</tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>
 <td>{{ $user->name }} {{ $user->last_name }}</td>
 <td><a class="button" href="#">Quitar</a></td>
</tr>
@empty
<tr>
 <td>No hay grupos registrados</td>
 <td></td>
</tr>
@endforelse
</tbody>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
