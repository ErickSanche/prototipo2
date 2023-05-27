<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de eventos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Mi Sitio Web</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>Lista de eventos:</h1>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Número de invitados</th>
                    <th>Imagenes</th>
                    <th>Servicios</th>
                    <th>Precio Total</th>
                    <th>Grupo/Paquete</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
                    <td>
                        @if ($evento->imagen)
                        @foreach (explode(',', $evento->imagen) as $imagen)
                        <img src="{{ asset("app/public/$imagen") }}" width="250" height="150" alt="">
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @foreach ($evento->servicios as $servicio)
                        {{ $servicio->nombre }}<br>
                        @endforeach
                    </td>
                    <td>{{ $evento->precio_total }}</td>
                    <td>{{ $evento->grupopaquete_id }}</td>
                    <td>{{ $evento->estado }}</td>
                    <td>
                        @can('update', $evento)
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
                        @endcan

                        @can('delete', $evento)
                        @if ($evento->estado !== 'Validando')
                        <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @endif
                        @endcan
                        @if (auth()->user()->tipo === 'administrador'|| auth()->user()->tipo === 'empleado')
                        <a href="{{ route('eventos.vistaAbonar', $evento->id) }}" class="btn btn-primary">Abonar</a>
                        @endif




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
