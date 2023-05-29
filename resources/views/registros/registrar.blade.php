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

</head>

<body>

<header>
    <div class="interior">
      <nav class="navegacion">
        <ul>
        <li><a href="{{ route('paquetes.index') }}">Inicio</a></li>
        <li><a href="{{ route('ver-usuarios') }}">Ver usuarios</a></li>
        <li><a href="{{ route('servicios.index') }}">Ver servicios</a></li>
        <li><a href="{{ route('servicios.create') }}">Agregar servicios</a></li>
        </ul>
      </nav>
    </div>
  </header>

<main>
<center>


<form action="{{ route('registrar') }}" method="POST">
      @csrf
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="field">
    <label for="completo">Nombre completo:</label>
    <input type="text" class="form-control @error('completo') is-invalid @enderror" name="completo" id="completo" required>
    @error('completo')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="field">
    <label for="usuario">Usuario:</label>
    <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" id="usuario" required>
    @error('usuario')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="field">
    <label for="password">Contraseña:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
    @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="field">
    <label for="tipo">Tipo de usuario:</label>
    <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" required>
      <option value="cliente">Cliente</option>
      <option value="administrador">Administrador</option>
      <option value="empleado">Empleado</option>
    </select>
    @error('tipo')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
</form>

</center>
</main>

</body>
</html>
