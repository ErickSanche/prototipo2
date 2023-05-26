<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
</head>
<body>
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
        <div class="interior">
            <nav class="navegacion">
                <ul>
                    <li><a href="{{ route('ver-usuarios') }}">Ver usuarios</a></li>
                    <li><a href="{{ route('registrar') }}">Agregar usuario</a></li>
                    <li><a href="{{ route('servicios.index') }}">Ver servicios</a></li>
                    <li><a href="{{ route('servicios.create') }}">Agregar servicios</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Acciones</th> <!-- Agregamos una columna para las acciones -->
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->nombre_de_usuario }}</td>
                    <td>{{ $usuario->tipo }}</td>
                    <td>
                        <!-- Agregamos enlaces para editar y eliminar -->
                        <a href="{{ route('registros.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('registros.destroy', $usuario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
