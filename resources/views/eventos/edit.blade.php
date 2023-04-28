<!DOCTYPE html>
<html lang="en">
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">
                    <li><a href="{{ route('eventos.index') }}">Regresar</a></li>
                </nav>
            </div>
    </header>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Editar evento:</h1>
            <hr>
            <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $evento->nombre }}">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $evento->fecha }}">
                </div>
                <div class="form-group">
                    <label for="hora_inicio">Hora de inicio:</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $evento->hora_inicio }}">
                </div>
                <div class="form-group">
                    <label for="hora_fin">Hora de fin:</label>
                    <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ $evento->hora_fin }}">
                </div>
                <div class="form-group">
                    <label for="numero_invitados">Número de invitados:</label>
                    <input type="number" class="form-control" id="numero_invitados" name="numero_invitados" value="{{ $evento->numero_invitados }}">
                </div>
                <div class="form-group">
                    <label for="grupopaquete_id">ID de grupo/paquete:</label>
                    <select class="form-select" id="grupopaquete_id" name="grupopaquete_id">
                        @foreach($grupopaquetes as $gp)
                            <option value="{{ $gp->id }}" {{ $gp->id === $evento->grupopaquete_id ? 'selected' : '' }}>{{ $gp->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </body>
</html>
