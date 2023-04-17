<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <head>
      <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- DATATABLES -->
     <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
     <!-- BOOTSTRAP -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
 
 </head>
</head>
<body>
      <header>
          <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
              <div class="interior">
                  <nav class="navegacion">
                      <ul>
                          <li><a href="{{ route('gerente.verusuario') }}">Ver usuarios</a></li>
                          <li><a href="{{ route('gerente.agregarusuario') }}">Agregar usuario</a></li>
                          <li><a href="{{ route('gerente.verservicios') }}">Ver servicios</a></li>
                          <li><a href="{{ route('gerente.agregarservicios') }}">Agregar servicio</a></li>
                          <li><a href="{{ route('salida') }}">Cerrar Sesion</a>
                      </ul>
                  </nav>
              </div>    
      </header>

<?php
$db = new PDO('sqlite:D:\erick\Documents\GitHub\prototipo2\database.sqlite');
    $result = $db->query("SELECT * FROM eventos");

    // Mostrar los datos en una tabla HTML
      echo '<table>';
      echo '<tr><th>Columna 1</th><th>Columna 2</th><th>Columna 3</th></tr>';

      while ($row = $results->fetchArray()) {
        echo '<tr>';
        echo '<td>' . $row['columna1'] . '</td>';
        echo '<td>' . $row['columna2'] . '</td>';
        echo '<td>' . $row['columna3'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
        
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>
