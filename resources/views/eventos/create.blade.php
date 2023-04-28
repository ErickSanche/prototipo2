<!DOCTYPE html>
<html>
<head>
	<title>Crear evento</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-+y/hcN0I7wsNfW1QH0b3qnaF0gB/KxTyK1QXto3OkPUgZi6ky1hL/nRjAvEYdBbgU5ECVRU5r6U5Xafy1ld6aw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
		<h1>Crear evento</h1>
		<form method="POST" action="{{ route('eventos.store') }}">
			@csrf
			@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
				@endforeach
			</div>
			@endif
			<div class="form-group">
				<label for="nombre">Nombre del evento:</label>
				<input type="text" id="nombre" name="nombre" required class="form-control">
			</div>
			<div class="form-group">
				<label for="fecha">Fecha:</label>
				<input type="date" id="fecha" name="fecha" required class="form-control">
			</div>
			<div class="form-group">
				<label for="hora_inicio">Hora de inicio:</label>
				<input type="time" id="hora_inicio" name="hora_inicio" required class="form-control">
			</div>
			<div class="form-group">
				<label for="hora_fin">Hora de fin:</label>
				<input type="time" id="hora_fin" name="hora_fin" required class="form-control">
			</div>
			<div class="form-group">
				<label for="numero_invitados">Número de invitados:</label>
				<input type="number" id="numero_invitados" name="numero_invitados" required class="form-control">
			</div>
			<div class="form-group">
				<label for="grupo">Grupo/Paquete:</label>
				<select id="grupo" name="grupopaquete_id" class="form-control">
					@foreach ($grupopaquetes as $gp)
					@if ($gp->estado != 0)
					<option value="{{ $gp->id }}">{{ $gp->nombre }}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="servicios">Servicios:</label>
				@foreach ($servicios as $servicio)
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="{{ 'servicio_' . $servicio->id }}" name="servicios[]" value="{{ $servicio->id }}">
					<label class="form-check-label" for="{{ 'servicio_' . $servicio->id }}">{{ $servicio->nombre }}</label>
				</div>
				@endforeach
			</div>
			<button type="submit" class="btn btn-primary">Crear evento</button>
		</form>
	</div>
</body>
</html>
