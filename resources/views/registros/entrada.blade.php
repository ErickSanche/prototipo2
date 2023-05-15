<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Salón de eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group .icon {
            position: absolute;
            top: 12px;
            left: 10px;
            color: #888;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            padding-left: 0px;
        }

        .form-group .btn {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('validar') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="usuario"><span class="icon material-symbols-rounded"></span> Usuario</label>
                <input id="usuario" name="usuario" type="text" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="password"><span class="icon material-symbols-rounded"></span> Contraseña</label>
                <input id="password" name="password" type="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <input class="btn" type="submit" value="Validar">
            </div>
        </form>
    </div>
</body>

</html>
