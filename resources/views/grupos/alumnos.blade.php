<x-layout title="{{$grupo->nombre}}" view="grupos" conTabla=true>
<table id="myTable" class="display">
<thead>
<tr>
 <th>Nombre</th>
</tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>
 <td>{{ $user->name }} {{ $user->last_name }}</td>
</tr>
@empty
<tr>
 <td>No hay grupos registrados</td>
</tr>
@endforelse
</tbody>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
