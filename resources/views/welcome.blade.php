<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/f1.css') }}">
  <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
</head>

<body>
<header>
  
    <div class="interior">
      <nav class="navegacion">
        <ul>
          <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  @foreach ($paquetes as $paquete)
      @if ($paquete->estado == 1)
  <div class="card">

        <div class="face front">
          <img src="{{ asset("app/public/$paquete->imagen") }}" alt="{{ $paquete->nombre }}">
        </div>

        <div class="face back">
          <p>NOMBRE DEL EVENETO: {{ $paquete->nombre }}</p>
          <p>DESCRIPCION: {{ $paquete->descripcion }}</p>
          <p>PRECIO: {{ $paquete->precio }}</p>
        </div>

  </div>
  @endif
        @endforeach



</body>

</html>