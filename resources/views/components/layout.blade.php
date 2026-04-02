<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <meta http-equiv="x-ua-compatible" content="ie=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <!--
 <link rel="icon" href="img/favicon.png">
 <link rel="stylesheet" href="/css/base.css">
 -->
 <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
 <title>Página de Login</title>
</head>
<body>
  <main>
@if (session('status'))
    <div class="notice">{{ session('status') }}</div>
@endif
    {{ $slot }}
  </main>
</body>
</html>
<!-- vi: set filetype=php: -->
