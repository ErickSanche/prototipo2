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
	<title>Crear evento</title>
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

  <center>
  <main>
		<h1>Create Evento</h1>
        <div class="clearfix">
			<div class="column">
  		<div class="field">
			<form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
				@csrf

				<div class="field">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required>
				</div>

				<div class="field">
					<label for="fecha">Fecha:</label>
					<input type="date" name="fecha" id="fecha" class="form-control" required>
				</div>

				 <div class="field">
					<label for="hora_inicio">Hora de inicio:</label>
					<input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
				</div>

				<div class="field">
					<label for="hora_fin">Hora de fin:</label>
					<input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
				</div>

				<div class="textBox">
					<label for="numero_invitados">Número de invitados:</label>
					<input type="number" name="numero_invitados" id="numero_invitados" class="form-control" required>
				</div>

				<div class="field">
					<label for="grupopaquete_id">Paquete:</label>
					<select name="grupopaquete_id" id="grupopaquete_id" class="form-control" required>
						<option value="">Seleccione un paquete</option>
						@foreach($grupos_paquetes as $paquete)
							<option value="{{ $paquete->id }}">{{ $paquete->nombre }} - ${{ $paquete->precio }}</option>
						@endforeach
					</select>
				</div>

				<div class="field">
					<label for="servicios">Servicios:</label>
					<select name="servicios[]" id="servicios" class="form-control" multiple required>
						@foreach($servicios as $servicio)
							<option value="{{ $servicio->id }}">{{ $servicio->nombre }} - ${{ $servicio->precio }}</option>
						@endforeach
					</select>
				</div>

				<div class="field">
					<label for="imagenes">Imágen</label>
					<input type="file" name="imagen[]" id="imagen" multiple required>
				</div>

				<button type="submit" class="btn">Crear Evento</button>
			</form>
		</div>
        </div>
        </div>
	</main>

</center>

	
</body>

</html>
