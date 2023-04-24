 <!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Agregar Usuarios</title>

    <link rel="stylesheet" href="{{ asset('css/ingresar.css') }}">

</head>

<body>

    <div class="signupFrm">

        <div class="wrapper">

            <form action="{{ route('registrar') }}" method="post" class="form">

                @csrf

                <h1 class="title">Registro de usuarios</h1>

 

                <div class="inputContainer">

                    <input class="input" name="nombre" type="text" placeholder="Nombre Completo">

                    <label class="label">Nombre completo</label>

                </div>

 

                <div class="inputContainer">

                    <input class="input" name="usuario" type="text" placeholder="Usuario">

                    <label class="label">Usuario</label>

                </div>

 

                <div class="inputContainer">

                    <select name="cargo" id="cargo" onchange="mostrarContraseña()">

                        <option value="cliente">Cliente</option>

                        <option value="gerente">Gerente</option>

                    </select>

                    <label class="label">Cargo</label>

                </div>

 

                <div class="inputContainer" id="contraseña" style="display:none">

                    <input class="input" name="contraseña_gerente" type="password" placeholder="Contraseña gerente">

                    <label class="label">Ingrese la contraseña de gerente</label>

                </div>

 

                <div class="inputContainer">

                    <input class="input" name="password" type="password" placeholder="Contraseña">

                    <label class="label">Ingrese contraseña</label>

                </div>

 

                <div class="inputContainer">

                    <input class="input" name="password2" type="password" placeholder="Contraseña">

                    <label class="label">Confirme contraseña</label>

                </div>

 

                <div class="items">

                    <input class="submitBtn" type="submit" value="Registrar">

                </div>

            </form>

        </div>

    </div>

    <script>

        function mostrarContraseña() {

            var cargo = document.getElementById("cargo").value;

            if (cargo === "gerente") {

                document.getElementById("contraseña").style.display = "block";

            } else {

                document.getElementById("contraseña").style.display = "none";

            }

        }

    </script>

</body>

</html>




