<x-layout title="Lista de usuarios" view="user" conTabla=true>
{{ $users->withQueryString()->links() }}
<table id="myTable" class="display">
<thead>
<tr>
 <th>Usuario</th>
 <th>Nombre</th>
 <th>Apellido</th>
 <th>Email</th>
 <th></th>
</tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>
 <td>{{ $user->username }}</td>
 <td>{{ $user->name }}</td>
 <td>{{ $user->last_name }}</td>
 <td>{{ $user->email }}</td>
 <td><a class="button" href="{{ route('admin.user.edit', $user) }}">Editar</a></td>
</tr>
@empty
<tr>
<td colspan="5">
No hay usuarios registrados
</td>
</tr>
@endforelse
</tbody>
</table>
</x-layout>
<!-- vi: set filetype=php: -->
