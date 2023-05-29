<!DOCTYPE html>
<html>
<head>
    <title>Realizar abono</title>
</head>
<body>
    <h1>Realizar cargo para el evento: {{ $evento->nombre }}</h1>

    <form action="{{ route('eventos.cargosExtras', $evento->id) }}" method="POST">
        @csrf
        <label for="abono">Cantidad abonada:</label>
        <input type="number" id="cargo" name="cargo" required>

        <input type="submit" value="Realizar cargo">
    </form>
</body>
</html>
