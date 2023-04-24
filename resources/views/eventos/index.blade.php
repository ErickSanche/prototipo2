<!DOCTYPE html>
<html>
<head>
    <title>Lista de eventos</title>
</head>
<body>
    <h1>Lista de eventos:</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora de inicio</th>
                <th>Hora de fin</th>
                <th>Número de invitados</th>
                <th>ID de grupo/paquete</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->id }}</td>
                <td>{{ $evento->nombre }}</td>
                <td>{{ $evento->fecha }}</td>
                <td>{{ $evento->hora_inicio }}</td>
                <td>{{ $evento->hora_fin }}</td>
                <td>{{ $evento->numero_invitados }}</td>
                <td>{{ $evento->grupopaquete_id }}</td>
                <td>{{ $evento->created_at }}</td>
                <td>{{ $evento->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
