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
            <div class="form-group">
                <label for="nombre">Nombre del evento:</label>
                <input type="text" name="nombre" class="form-control" id="nombre">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" id="fecha">
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" name="hora_inicio" class="form-control" id="hora_inicio">
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" name="hora_fin" class="form-control" id="hora_fin">
            </div>
            <div class="form-group">
                <label for="numero_invitados">Número de invitados:</label>
                <input type="number" name="numero_invitados" class="form-control" id="numero_invitados">
            </div>
            <div class="form-group">
                <label for="precio_total">Precio total:</label>
                <input type="number" name="precio_total" class="form-control" id="precio_total">
            </div>
            <div class="form-group">
                <label for="servicios">Servicios:</label>
                <select name="servicios[]" class="form-control" id="servicios" multiple>
                    @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="grupopaquete_id">Grupo o paquete:</label>
                <select name="grupopaquete_id" class="form-control" id="grupopaquete_id">
                    <option value="">Paquete</option>
                    @foreach ($grupos_paquetes as $grupo_paquete)
                    <option value="{{ $grupo_paquete->id }}">{{ $grupo_paquete->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
	</div>
</body>
</html>
