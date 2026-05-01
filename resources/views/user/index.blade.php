<x-layout title="Lista de usuarios" view="user">
<h1>Lista de usuarios</h1>

<table>
<thead>
<tr>
 <th>Usuario</th>
 <th>Nombre</th>
 <th>Email</th>
</tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>
 <td>{{ $user->username }}</td>
 <td>{{ $user->name }}</td>
 <td>{{ $user->email }}</td>
</tr>
<tr>
@empty
<td colspan=3>
No hay usuarios registrados
</td>
</tr>
@endforelse
</tbody>
</table>

</x-layout>
<!-- vi: set filetype=php: -->
