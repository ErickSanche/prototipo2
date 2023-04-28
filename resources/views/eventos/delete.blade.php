<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar evento</title>
    <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
</head>
<body>
    <header>
        <div class="interior">
            <nav class="navegacion">
                <li><a href="{{ route('usuarios.index') }}">Regresar</a></li>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Eliminar evento</h4>
            </div>
            <div class="card-body">
                <p>¿Estás seguro que deseas eliminar el evento "{{ $evento->nombre }}"?</p>
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
