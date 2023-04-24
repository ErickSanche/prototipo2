<!DOCTYPE html>
<html>
<head>
	<title>Crear evento</title>
</head>
<body>
	<h1>Crear evento</h1>

	@if ($errors->any())
		<div>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	<form method="POST" action="{{ route('eventos.store') }}">
		@csrf

		<label for="titulo">Título:</label>
		<input type="text" id="titulo" name="titulo"><br>

		<label for="descripcion">Descripción:</label>
		<textarea id="descripcion" name="descripcion"></textarea><br>

		<label for="fecha">Fecha:</label>
		<input type="date" id="fecha" name="fecha"><br>

		<label for="hora">Hora:</label>
		<input type="time" id="hora" name="hora"><br>

		<label for="lugar">Lugar:</label>
		<input type="text" id="lugar" name="lugar"><br>

		<label for="grupo">Grupo/Paquete:</label>
		<select id="grupo" name="grupo">
			@foreach ($grupopaquetes as $gp)
				<option value="{{ $gp->id }}">{{ $gp->nombre }}</option>
			@endforeach
		</select><br>

		<button type="submit">Crear evento</button>
	</form>
</body>
</html>
