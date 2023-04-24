<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salon de eventos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body >
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">

                    <ul>
                        <li><a class="navbar-brand" href="#">BIENVENIDO</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a></li>
                        <li><a href="{{ route('registrar') }}">Registro</a></li>
                    </ul>
                </nav>
            </div>
    </header>

</body>
<body background="white">


    <div class="container" >
        <div class="row">
            <table class="table table-dark table-hover">
                <center>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($paquetes as $paquete)
                          <tr>
                            <td>{{ $paquete->id }}</td>
                            <td>{{ $paquete->nombre }}</td>
                            <td>{{ $paquete->precio }}</td>
                            <td>{{ $paquete->descripcion }}</td>
                            <td>{{ $paquete->estado }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </center>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>
