<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilosboton.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Tabla de Paquetes</title>
</head>
<body>
    <header>
        <div class="interior">
            <nav class="navegacion">
                <ul>
                    <li><a href="{{ route('ver-usuarios') }}">Ver usuarios</a></li>
                    <li><a href="{{ route('registrar') }}">Agregar usuario</a></li>
                    <li><a href="{{ route('servicios.index') }}">Ver servicios</a></li>
                    <li><a href="{{ route('servicios.create') }}">Agregar servicios</a></li>
                    <li><a href="{{ route('eventos.index') }}">Ver Eventos</a></li>
                    <li><a href="{{ route('eventos.create') }}">Agregar Evento</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <center>
        <div class="container mt-5">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                        <tr>
                            <td>{{ $paquete->id }}</td>
                            <td>{{ $paquete->nombre }}</td>
                            <td>{{ $paquete->precio }}</td>
                            <td>{{ $paquete->descripcion }}</td>
                            <td>{{ $paquete->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td><img src="{{ asset("app/public/$paquete->imagen") }}" width="250" height="150" alt=""></td>
                            <td>
                                @if($paquete->estado == 0)
                                    <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="POST" id="deleteForm{{ $paquete->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-red" onclick="deletePaquete({{ $paquete->id }})">
                                            <i class="fa fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                @endif
                                <button type="button" class="btn-green">
                                    <a href="{{ route('paquetes.edit', $paquete->id) }}">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>
    <div class="container">
        <div class="btn">
            <span><a href="{{ route('paquetes.create') }}">Crear nuevo paquete</a></span>
            <div class="dot"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        function deletePaquete(id) {
            var deleteForm = document.getElementById('deleteForm' + id);
            if (confirm('¿Estás seguro de que quieres eliminar este paquete?')) {
                deleteForm.submit();
            }
        }
    </script>
</body>
</html>
