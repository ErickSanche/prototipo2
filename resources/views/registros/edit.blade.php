<!DOCTYPE html>
<html lang="es-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Esta descripción es la que aparece en los buscadores debajo de la URL" />
	<link href="./styles/practica7.css" rel="stylesheet" type="text/css" />
	<link href="./styles/formulario.css" rel="stylesheet" type="text/css" />
	<link href="./styles/resets.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700,800&display=swap" rel="stylesheet">
	<title>Editar evento</title>
	<link rel="stylesheet" href="{{ asset('css/barra.css') }}">
	<link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
	<link rel="stylesheet" href="{{ asset('css/s2.css') }}">

</head>


<body>

	<header>
		<div class="interior">
			<nav class="navegacion">
				<ul>
					<li><a href="{{ route('eventos.index') }}">Ver Eventos</a></li>
					<li><a href="{{ route('eventos.create') }}">Agregar Evento</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
    <div >
        <h1>Editar Usuario</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('registros.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field"> <!-- Agregado: Campo 'field' -->
                <!-- Campo 'completo' -->
                <label for="completo">Nombre completo:</label>
                <input type="text" name="completo" value="{{ $usuario->nombre }}" required>

                <!-- Campo 'usuario' -->
                <label for="usuario">Nombre de usuario:</label>
                <input type="text" name="usuario" value="{{ $usuario->nombre_de_usuario }}" required>

                <!-- Campo 'password' -->
                <label for="password">Contraseña:</label>
                <input type="password" name="password">
                <span>(Deja en blanco para mantener la contraseña actual)</span>

                <!-- Campo 'tipo' -->
                <label for="tipo">Tipo:</label>
                <select name="tipo" required>
                    <option value="cliente" {{ $usuario->tipo === 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="administrador" {{ $usuario->tipo === 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="empleado" {{ $usuario->tipo === 'empleado' ? 'selected' : '' }}>Empleado</option>
                </select>

            <button class="btn" type="submit">Guardar cambios</button>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
</body>
</html>
