<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DataTables.js</title>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/f1.css') }}">
    </head>
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">
                    <ul>
                        <li><a href="{{ route('gerente.verusuario') }}">Ver usuarios</a></li>
                        <li><a href="{{ route('registrar') }}">Agregar usuario</a></li>
                        <li><a href="{{ route('gerente.verservicios') }}">Ver servicios</a></li>
                        <li><a href="{{ route('eventos.store') }}">Agregar servicio</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a>
                    </ul>
                </nav>
            </div>
    </header>
    <body>
    <center>
    <div class="container mt-5">
                <table class="table table-striped" style="width:100%">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
               <tr>
               <?php
                        // Crear una conexión a la base de datos
                        $db = new PDO('sqlite:C:\Users\erick\Documentos\Framebueno\database\database.sqlite');

                        // Ejecutar una consulta SQL
                    
                        $resultado = $db->query('SELECT * FROM usuarios');

                        // Mostrar los resultados en una tabla HTML
                        echo '<table class="table table-striped" style="width:100%">';
                        foreach ($resultado as $fila) {
                            echo '<tr>';
                            echo '<td>' . $fila['id'] . '</td>';
                            echo '<td>' . $fila['nombre'] . '</td>';
                            echo '<td>' . $fila['nombre_de_usuario'] . '</td>';
                            echo '<td>' . $fila['cargo'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';

                        // Cerrar la conexión a la base de datos
                        $db = null;
                        ?>


               </tr>
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
                    |
    
          
</html>