<!DOCTYPE html>
<html lang="en">
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">
                    <ul>
                        <li><a href="{{ route('gerente.verusuario') }}">Ver usuarios</a></li>
                        <li><a href="{{ route('registrar') }}">Agregar usuario</a></li>
                        <li><a href="{{ route('gerente.verservicios') }}">Ver servicios</a></li>
                        <li><a href="{{ route('gerente.agregarservicios') }}">Agregar servicio</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a>
                    </ul>
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

        <!-- Custom CSS
        <link rel="stylesheet" href="{{ asset('css/f1.css') }}">  -->


   </head>
    <center>
    <div class="container mt-5">
                <table id="example" class="table table-striped" style="width:100%">
                
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
                @foreach ($paquetes as $paquete)
                <tr>
                    <td>{{ $paquete->id }}</td>
                    <td>{{ $paquete->nombre }}</td>
                    <td>{{ $paquete->precio }}</td>
                    <td>{{ $paquete->descripcion }}</td>
                    <td >
                    <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        <i class="fa fa-trash"></i> Eliminar
                    </button>
                    </form>

                    <button type="button" class="btn-edit">
                    <a href="{{ route('paquetes.edit', $paquete->id) }}">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                    </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function () {
    $('#example').DataTable();
});

        </script>
    </body>
</body>
    </center>
    <head>
        <link rel="stylesheet" href="{{ asset('css/estilosboton.css') }}">
    </head>
    <center>
    <div class="container">
        <div class="btn">

        <span><a href="{{ route('paquetes.create') }}">Crear nuevo paquete</a></span>
        <div class="dot"></div>

        </div>
    </div>
</center>


</html>
