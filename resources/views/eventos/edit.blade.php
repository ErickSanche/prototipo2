<!DOCTYPE html>
<html>
<head>
    <title>Editar evento</title>
</head>
<body>
    <h1>Editar evento</h1>
    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $evento->nombre }}" required><br><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ $evento->fecha }}" required><br><br>
        <label for="hora_inicio">Hora de inicio:</label>
        <input type="time" name="hora_inicio" value="{{ $evento->hora_inicio }}" required><br><br>
        <label for="hora_fin">Hora de fin:</label>
        <input type="time" name="hora_fin" value="{{ $evento->hora_fin }}" required><br><br>
        <label for="numero_invitados">Número de invitados:</label>
        <input type="number" name="numero_invitados" value="{{ $evento->numero_invitados }}" required><br><br>
        <label for="grupopaquete_id">ID de grupo/paquete:</label>
        <select name="grupopaquete_id">
            @foreach ($grupopaquetes as $grupopaquete)
                <option value="{{ $grupopaquete->id }}" {{ $evento->grupopaquete_id == $grupopaquete->id ? 'selected' : '' }}>
                    {{ $grupopaquete->nombre }}
                </option>
            @endforeach
        </select><br><br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
