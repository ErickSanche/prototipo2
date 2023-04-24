<!DOCTYPE html>
<html>
<head>
    <title>Lista de eventos</title>
</head>
<body>
    <h1>Lista de eventos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Paquete</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->paquete->nombre }}</td>
                    <td>
                        <a href="{{ route('Eventos.edit', $evento->id) }}">Editar</a>
                        <form action="{{ route('Eventos.destroy', $evento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('Eventos.create') }}">Crear evento</a>
</body>
</html>
