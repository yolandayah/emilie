<x-layout title="Panel de información" view="dashboard">

<h1>Bienvenido {{ Auth::user()->name }} al sistema</h1>

<div class="contenedor-tarjetas">

  <div class="tarjeta">
    <h3>Servicio Premium</h3>
    <p>Acceso ilimitado a todas las funciones y soporte técnico.</p>
    <button class="button btn-tarjeta">Saber más</button>
  </div>

  <div class="tarjeta">
    <h3>Soporte Técnico Especializado</h3>
    <p>¿Tienes problemas? Nuestro equipo de expertos está listo para ayudarte en cualquier momento del día, los 7 días de la semana.</p>
    <button class="button btn-tarjeta">Contactar</button>
  </div>

  <div class="tarjeta">
    <h3>Garantía</h3>
    <p>Protege tus productos por más de 3 años.</p>
    <button class="button btn-tarjeta">Ver más</button>
  </div>

</div>

</x-layout>
<!-- vi: set filetype=php: -->
