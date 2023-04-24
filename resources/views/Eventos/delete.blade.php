<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar eliminación</title>
</head>
<body>
    <h1>Confirmar eliminación</h1>
    <p>¿Está seguro que desea eliminar el evento "{{ $event->nombre }}"?</p>
    <form action="{{ route('Eventos.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
