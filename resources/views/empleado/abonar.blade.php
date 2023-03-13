<!DOCTYPE html>
<html>

<head>
    <title>Añadir persona</title>
    <!-- Agregamos la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">

                    <ul>
                        <li><a class="navbar-brand" href="#">BIENVENIDO</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a></li>
                        </ul>
                </nav>
            </div>
    </header>

    <div class="container">
        <h1 class="my-4">Pagar servicio</h1>
        <form action="" method="" id="formulario">
            @csrf

            <div class="form-group">
                <label for="servicio">Tipo de Servicio:</label>
                <select class="form-control" id="servicio" name="servicio" required>
                    <option value="">Seleccionar servicio...</option>
                    <option value="servicio1">XV Años</option>
                    <option value="servicio2">Boda</option>
                    <option value="servicio3">Cumpleaños</option>
                    <option value="servicio3">Baby shower</option>
                    <!-- Agregar más opciones -->
                </select>
            </div>
            <div class="form-group">
                <label for="costo">Abono:</label>
                <input type="text" class="form-control" id="costo" name="costo" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Resta:</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" required>
            </div>
            <button type="submit" class="btn btn-primary">Realizar abono</button>


        </form>
    </div>
</body>
<script>
document.getElementById("formulario").addEventListener("submit", function() {
        alert("Abono registrado.");
    });
</script>

</html>
