<!DOCTYPE html>
<html>
<head>
	<title>Crear evento</title>
    <link rel="stylesheet" href="{{ asset('css/s2.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-+y/hcN0I7wsNfW1QH0b3qnaF0gB/KxTyK1QXto3OkPUgZi6ky1hL/nRjAvEYdBbgU5ECVRU5r6U5Xafy1ld6aw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="signup-container">
  <div class="left-container">
    <h1>
      <i class="fas fa-paw"></i>
      Create Evento
    </h1>
    <div class="puppy">
      <img src=https://ingenieriademenu.com/wp-content/uploads/2021/06/Como-ser-un-buen-organizador-de-eventos.jpg">
    </div>
  </div>
  <div class="right-container">
    <header>
      <div class="set">
        <form method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="pets-name">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="numero_invitados">Número de invitados:</label>
                <input type="number" name="numero_invitados" id="numero_invitados" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="grupopaquete_id">Paquete:</label>
                <select name="grupopaquete_id" id="grupopaquete_id" class="form-control" required>
                    <option value="">Seleccione un paquete</option>
                    @foreach($grupos_paquetes as $paquete)
                        <option value="{{ $paquete->id }}">{{ $paquete->nombre }} - ${{ $paquete->precio }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="servicios">Servicios:</label>
                <select name="servicios[]" id="servicios" class="form-control" multiple required>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }} - ${{ $servicio->precio }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="imagenes">Imágen</label>
                <input type="file" name="imagen[]" id="imagen" multiple required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Evento</button>
        </form>
    </div>

</html>
