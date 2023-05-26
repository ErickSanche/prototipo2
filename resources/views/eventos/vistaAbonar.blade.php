<!DOCTYPE html>
<html>
<head>
    <title>Realizar abono</title>
</head>
<body>
    <h1>Realizar abono para el evento: {{ $evento->nombre }}</h1>

    <form action="{{ route('eventos.abonar', $evento->id) }}" method="POST">
        @csrf
        <label for="abono">Cantidad abonada:</label>
        <input type="number" id="abono" name="abono" required>

        <input type="submit" value="Realizar abono">
    </form>
</body>
</html>
