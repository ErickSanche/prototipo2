<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de evento</title>
</head>
<body>
    <h1>Detalle de evento</h1>
    <p><strong>Nombre:</strong> {{ $event->nombre }}</p>
    <p><strong>Fecha:</strong> {{ $event->fecha }}</p>
    <p><strong>Lugar:</strong> {{ $event->lugar }}</p>
    <p><strong>Paquete:</strong> {{ $event->paquete->nombre }}</p>
    @if ($event->servicios->isEmpty())
        <p><strong>Servicios:</strong> Ninguno</p>
    @else
        <p><strong>Servicios:</strong></p>
        <ul>
            @foreach ($event->servicios as $servicio)
                <li>{{ $servicio->nombre }}</li>
            @endforeach
        </ul>
    @endif
    <p><a href="{{ route('Eventos.edit', $event->id) }}">Editar</a></p>
    <form action="{{ route('Eventos.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
