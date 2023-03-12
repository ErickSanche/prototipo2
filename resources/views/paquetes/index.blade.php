<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/styletablas.css') }}">
</head>

<body>

<div class="banner">
    <h1>Paquetes</h1>
    <div class="opciones">
        <a>Ver usuarios</a>
        <a>Agregar usuario</a>
        <a>Ver servicios</a>
        <a>Agregar servicio</a>
    </div>
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paquetes as $clave => $valor)
            @if (is_array($valor))
                <tr>
                    <td>{{ $clave }}</td>
                    <td>{{ $valor['nombre'] }}</td>
                    <td>{{ $valor['precio'] }}</td>
                    <td>{{ $valor['descripcion'] }}</td>
                    <td>
                        <a href="{{ route('paquetes.edit', $clave) }}">Editar</a>
                        <form action="{{ route('paquetes.destroy', $clave) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<a href="{{ route('paquetes.create') }}">Crear nuevo paquete</a>
<li><a href="{{ route('salida') }}">Salir..</a></li>
</body>
</html>
