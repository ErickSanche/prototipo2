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
    <body>
            <div class="container mt-5">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                    <?php
                    // Crear una conexión a la base de datos
                    $db = new PDO('sqlite:C:\Users\erick\Documentos\Framebueno\database\database.sqlite');

                    // Ejecutar una consulta SQL
                
                    $resultado = $db->query('SELECT * FROM usuarios');

                    // Mostrar los resultados en una tabla HTML
                    echo '<table id="example" class="table table-striped" style="width:100%">';
                    foreach ($resultado as $fila) {
                        echo '<tr>';
                        echo '<td>' . $fila['nombre'] . '</td>';
                        echo '<td>' . $fila['nombre_de_usuario'] . '</td>';
                        echo '<td>' . $fila['cargo'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';

                    // Cerrar la conexión a la base de datos
                    $db = null;
                    ?>
                </div>
            </div>
        </div>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </body>
</html>