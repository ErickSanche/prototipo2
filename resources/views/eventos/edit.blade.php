<!DOCTYPE html>
<html>
<head>
    <title>Editar evento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-+y/hcN0I7wsNfW1QH0b3qnaQ01r+dmCyJW5RdEJaSNl3JnW1zJTYXj7MTOBoMD3zBwPhvzamAGgzKGGJ8EW+vw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h2>Editar evento</h2>
        <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $evento->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $evento->fecha }}" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $evento->hora_inicio }}" required>
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ $evento->hora_fin }}" required>
            </div>
            <div class="form-group">
                <label for="numero_invitados">Número de invitados:</label>
                <input type="number" class="form-control" id="numero_invitados" name="numero_invitados" value="{{ $evento->numero_invitados }}" required>
            </div>
            <div class="form-group">
                <label for="grupopaquete_id">Paquete:</label>
                <select class="form-control" id="grupopaquete_id" name="grupopaquete_id" required>
                    @foreach ($grupos_paquetes as $paquete)
                        <option value="{{ $paquete->id }}" @if ($paquete->id == $evento->grupopaquete_id) selected @endif>{{ $paquete->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="servicios">Servicios:</label>
                <select class="form-control" id="servicios" name="servicios[]" multiple required>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}" @if (in_array($servicio->id, $evento->servicios->pluck('id')->toArray())) selected @endif>{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="estado" name="estado" required>
                        @if (auth()->user()->tipo === 'cliente')
                        <option value="no confirmado" @if ($evento->estado == 'no confirmado') selected @endif>No confirmar</option>
                        <option value="validando" @if ($evento->estado == 'validando') selected @endif>Confirmar</option>
                        @elseif (auth()->user()->tipo === 'administrador')
                        <option value="rechazado" @if ($evento->estado == 'rechazado') selected @endif>Rechazar</option>
                        <option value="agendado" @if ($evento->estado == 'agendado') selected @endif>Aceptar</option>
                        @endif

                    </select>
                </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
