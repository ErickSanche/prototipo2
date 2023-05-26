<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
    <title>Editar Usuario</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Usuario</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('usuarios.actualizar', $usuario->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="completo" name="completo" value="{{ $usuario->nombre }}">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $usuario->nombre_de_usuario }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Usuario</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option value="cliente" {{ $usuario->tipo == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="administrador" {{ $usuario->tipo == 'administrador' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
</body>
</html>
