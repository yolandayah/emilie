<!DOCTYPE html>
<html lang="es">
<head>
@props(['title' => 'Título', 'view' => 'home', 'conTabla' => false])
 <meta charset="utf-8" />
 <meta http-equiv="x-ua-compatible" content="ie=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" href="/css/simple.min.css">
@if ($conTabla)
 <link rel="stylesheet" href="/css/dataTables.dataTables.min.css">
@endif
 <link rel="stylesheet" href="/css/custom.min.css">
 <link rel="stylesheet" href="/css/menu.min.css">
 <!--
 <link rel="icon" href="img/favicon.png">
 -->
 <title>{{ config('app.name', 'Emilie') }} - {{ $title }}</title>
</head>
<body>
 <header>
  <h1>{{ $title }}</h1>
 <x-menu view="{{ $view }}"/>
 </header>
 <main>
@if (session('error'))
<div class="danger"><p><strong>¡Error!</strong>: {{ session('error') }}</p></div>
@endif
@if (session('success'))
<div class="success"><p><strong>¡Éxito!</strong>: {{ session('success') }}</p></div>
@endif
@if (session('status'))
<div class="info"><p><strong>¡Información!</strong>: {{ session('status') }}</p></div>
@endif
@if (session('warning'))
<div class="warning"><p><strong>¡Advertencia!</strong>: {{ session('warning') }}</p></div>
@endif

  {{ $slot }}

 </main>
 <footer>
  <p>&copy; 2026 Mi Sitio Web</p>
 </footer>
<script>
function topnavResponsive() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
@if ($conTabla)
<script src="/js/jquery-3.7.1.min.js"></script>
<script src="/js/dataTables.min.js"></script>
<script>
function initTable() {
 var table = new DataTable('#myTable',{
  language: {
   url: '/js/es-MX.min.json',
  },
  responsive: true,
 });
}
$(document).ready( initTable() );
</script>
@endif
</body>
</html>
<!-- vi: set filetype=php: -->
