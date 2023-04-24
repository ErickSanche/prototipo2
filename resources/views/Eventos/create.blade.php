<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear evento</title>
</head>
<body>
    <h1>Crear evento</h1>
    <form action="{{ route('Eventos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="hora_inicio">Hora de inicio:</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control">
        </div>
        <div class="form-group">
            <label for="hora_fin">Hora de fin:</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control">
        </div>
        <div class="form-group">
            <label for="numero_invitados">Número de invitados:</label>
            <input type="number" name="numero_invitados" id="numero_invitados" class="form-control">
        </div>
        <div class="form-group">
            <label for="paquete_id">Paquete:</label>
            <select name="paquete_id" id="paquete_id" class="form-control">
                @foreach($paquetes as $paquete)
                    <option value="{{ $paquete->id }}">{{ $paquete->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="servicios">Servicios:</label>
            <select name="servicios[]" id="servicios" class="form-control" multiple>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>


</body>
</html>
