<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/ingresar.css') }}">

    <title>Login Salón de eventos</title>
    
</head>

<body>
<div class="container">
        
        <div class="box">
        <div class="header">
                <header> <img src="images/logo.png" alt=""></header>
                <p>Ingresar a la agencia de eventos </p>
            </div>

        <form action="{{ route('validar') }}" method="post">
            @csrf
            <div class="input-box">
                <label for="usuario">Usuario</label>
                <input id="usuario" name="usuario" type="text" placeholder="Usuario"  class="input-field" required>
                <i class="bx bx-envelope"></i>
            </div>

            <div class="input-box">
                <label for="password"> Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Contraseña" class="input-field" required>
            </div>
            <div class="input-box">
                <input class="input-submit" type="submit" value="Validar">
            </div>
            <div class="forgot">
                <span>Forgot password?</span>
            </div>
        </form>
    </div>
    <div class="wrapper"></div>

</body>

</html>
