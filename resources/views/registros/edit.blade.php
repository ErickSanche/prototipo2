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
        <form action="{{ route('registros.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo 'completo' -->
            <label for="completo">Nombre completo:</label>
            <input type="text" name="completo" value="{{ $usuario->nombre }}" required>

            <!-- Campo 'usuario' -->
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" name="usuario" value="{{ $usuario->nombre_de_usuario }}" required>

            <!-- Campo 'password' -->
            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <span>(Deja en blanco para mantener la contraseña actual)</span>

            <!-- Campo 'tipo' -->
            <label for="tipo">Tipo:</label>
            <select name="tipo" required>
                <option value="cliente" {{ $usuario->tipo === 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="administrador" {{ $usuario->tipo === 'administrador' ? 'selected' : '' }}>Administrador</option>
            </select>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
</body>
</html>
