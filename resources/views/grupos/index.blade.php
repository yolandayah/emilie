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
 <td>
  <a class="button" href="{{ route('grupos.edit',['asignatura'=>$asignatura->id]) }}">Editar</a>
  <a class="button" href="#" onclick="asignatura_borrar({{ $asignatura->id }},'{{ $asignatura->nombre }}');">Borrar</a>
 </td>
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
<div id="mdlBorrar" class="modal">
<span onclick="document.getElementById('mdlBorrar').style.display='none'"
class="modal-close" title="Close Modal">×</span>
  <form id="frmBorrar" method="POST" action="" class="modal-content">
    @csrf
	@method('DELETE')
    <input type="hidden" id="txtAction" value="{{ route('grupos.borrar',['asignatura'=>0]) }}" autocomplete="off">
    <div class="modal-container">
      <h1>Borrar <span id="txtAsignatura"></span></h1>
      <p>¿Esta seguro que quiere borrar esta asignatura?</p>

      <div class="modal-clearfix">
        <button type="button" onclick="document.getElementById('mdlBorrar').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" onclick="document.getElementById('mdlBorrar').style.display='none'" class="deletebtn">Borrar</button>
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('mdlBorrar');
var form = document.getElementById('frmBorrar');
var action = document.getElementById('txtAction');
var asignatura = document.getElementById('txtAsignatura');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal.style.display === 'block') {
        modal.style.display = "none";
    }
});
function asignatura_borrar(id, nombre) {
  form.action = action.value.trim().slice(0,-1) + id;
  asignatura.textContent = nombre;
  document.getElementById('mdlBorrar').style.display='block';
  return false;
}
</script>
</x-layout>
<!-- vi: set filetype=php: -->
