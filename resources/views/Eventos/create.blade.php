<form method="POST" action="{{ route('Eventos.store') }}">
    @csrf

    <label for="nombre">Nombre del evento:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required>

    <label for="hora_inicio">Hora de inicio:</label>
    <input type="time" id="hora_inicio" name="hora_inicio" required>

    <label for="hora_fin">Hora de fin:</label>
    <input type="time" id="hora_fin" name="hora_fin" required>

    <label for="numero_invitados">Número de invitados:</label>
    <input type="number" id="numero_invitados" name="numero_invitados" required>

    <label for="paquete_id">Paquete:</label>
    <select id="paquete_id" name="paquete_id" required>
        <option value="">Seleccionar</option>
        @foreach($grupopaquetes as $paquete)
            <option value="{{ $paquete->id }}">{{ $paquete->nombre }}</option>
        @endforeach
    </select>

    <button type="submit">Crear evento</button>
</form>
