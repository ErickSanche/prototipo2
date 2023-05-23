<!DOCTYPE html>
<html lang="en">
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
        <div class="interior">
            <nav class="navegacion">
            </nav>
        </div>
    </header>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
    </head>

    <body>
        <h1>Lista de eventos:</h1>
        <div class="container mt-5">
            <body>
                <h1>Lista de eventos:</h1>
                <div class="container mt-5">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Hora de inicio</th>
                                <th>Hora de fin</th>
                                <th>Número de invitados</th>
                                <th>Imagen</th>
                                <th>Servicios</th>
                                <th>Precio Total</th>
                                <th>Grupo/Paquete</th>
                                <th>Acciones</th> <!-- Nueva columna para las acciones -->
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
                                <td>{{ $evento->grupopaquete_id}}</td>
                                <td>
                                    <!-- Enlace para editar el evento -->
                                    <a href="{{ route('eventos.edit', $evento->id) }}">Editar</a>

                                    <!-- Formulario para eliminar el evento -->
                                    <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
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
