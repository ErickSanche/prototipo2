<!DOCTYPE html>
<html>
<head>
    <title>Eliminar evento</title>
</head>
<body>
    <h1>Eliminar evento</h1>
    <p>¿Está seguro de que desea eliminar el evento "{{ $evento->nombre }}"?</p>
    <form method="POST" action="{{ route('eventos.destroy', ['id' => $evento->id]) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
