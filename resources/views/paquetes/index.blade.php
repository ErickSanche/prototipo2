<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/styletablas.css') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top "style="background-color: #FFB6C1;">
                    <div class="navbar-brand" style="left:80%" >
                        <div class="opciones">
                            <a>Ver usuarios</a>
                            <a>Agregar usuario</a>
                            <a>Ver servicios</a>
                            <a>Agregar servicio</a>
                        </div>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

<h1>Paquetes</h1>
<center>
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
</center>
</body>
</html>
