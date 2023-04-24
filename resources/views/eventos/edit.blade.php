<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>
</head>
<body>
    <h1>Editar Evento</h1>

    <form method="POST" action="{{ route('Eventos.update', $event->id) }}">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del evento:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $event->nombre }}" required><br>

        <label for="fecha">Fecha del evento:</label>
        <input type="date" id="fecha" name="fecha" value="{{ $event->fecha }}" required><br>

        <label for="paquete_id">Paquete:</label>
        <select id="paquete_id" name="paquete_id">
            @foreach($paquetes as $paquete)
                <option value="{{ $paquete->id }}" @if($event->paquete_id == $paquete->id) selected @endif>{{ $paquete->nombre }}</option>
            @endforeach
        </select><br>

        <label for="servicios[]">Servicios:</label><br>
        @foreach($servicios as $servicio)
            <input type="checkbox" id="servicio-{{ $servicio->id }}" name="servicios[]" value="{{ $servicio->id }}" @if(in_array($servicio->id, $event->servicios->pluck('id')->toArray())) checked @endif>
            <label for="servicio-{{ $servicio->id }}">{{ $servicio->nombre }}</label><br>
        @endforeach

        <button type="submit">Actualizar</button>
    </form>

    <br>

    <a href="{{ route('Eventos.index') }}">Volver al listado de eventos</a>
</body>
</html>
