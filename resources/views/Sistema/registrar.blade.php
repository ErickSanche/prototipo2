<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('registrar') }}" method="post">
        @csrf
        <div class="cabeceraS">
            <div class="titulo">

            </div>
            <div class="items form-group">

                <br><input class="cajas form-style" name="nombre" type="text" placeholder="Nombre Completo"><br>
                <i class="input-icon uil uil-at"></i>
            </div>
            <div class="items form-group">

                <br><input class="cajas form-style" name="usuario" type="text" placeholder="Usuario">
                <i class="input-icon uil uil-at"></i>
            </div>
            <div class="items form-group">

                <br><input class="cajas form-style" name="password" type="password" placeholder="Contraseña">
                <i class="input-icon uil uil-lock-alt"></i>
            </div>
            <div class="items form-group">

                <br><input class="cajas form-style" name="password2" type="password" placeholder="Contraseña">
                <i class="input-icon uil uil-lock-alt"></i>
            </div>
            <div class="items">
                <br><input class="boton btn mt-4" type="submit" value="Registrar">
            </div>
        </div>
    </form>
</body>
</html>
