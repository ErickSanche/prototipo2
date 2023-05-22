
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Registro de usuario</title>
</head>
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
<body>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <div class="container" id="container">
    <form action="{{ route('registrar') }}" method="POST" class="p-4 bg-light rounded">
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

  <div class="form-group">
    <label for="completo">Nombre completo:</label>
    <input type="text" class="form-control @error('completo') is-invalid @enderror" name="completo" id="completo" required>
    @error('completo')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="usuario">Usuario:</label>
    <input type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" id="usuario" required>
    @error('usuario')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
    @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="tipo">Tipo de usuario:</label>
    <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo" required>
      <option value="cliente">Cliente</option>
      <option value="administrador">Administrador</option>
    </select>
    @error('tipo')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
</body>
</html>