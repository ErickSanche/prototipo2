<!DOCTYPE html>
<html>
<head>
    <title>Lista de usuarios</title>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nombre de usuario</th>
                <th>Cargo</th>
                <th>Fecha de creación</th>
                <th>Última actualización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->nombre_de_usuario }}</td>
                    <td>{{ $usuario->cargo }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>{{ $usuario->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
