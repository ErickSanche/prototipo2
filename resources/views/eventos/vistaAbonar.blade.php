<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/practica7.css" rel="stylesheet" type="text/css" />
	<link href="./styles/formulario.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Crear evento</title>
    <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
	<link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/s2.css') }}">

    <title>Realizar abono</title>
</head>
<body>
<header>
    <div class="interior">
      <nav class="navegacion">
        <ul>
          <li><a href="{{ route('eventos.index') }}">Ver Eventos</a></li>
        </ul>
      </nav>
    </div>
  </header>

    <h1>Realizar abono para el evento: {{ $evento->nombre }}</h1>
    <center>
    <div class="field">
    <form action="{{ route('eventos.abonar', $evento->id) }}" method="POST">
        @csrf
        <label for="abono">Cantidad abonada:</label>
        <input type="number" id="abono" name="abono" required>

        <input type="submit" value="Realizar abono">
    </form>
</div>
</center>
    
</body>
</html>
