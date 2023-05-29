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

  <main>

    <div class="container">
        <h2>Editar evento</h2>
        <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $evento->nombre }}" required>
            </div>
            <div class="field">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $evento->fecha }}" required>
            </div>
            <div class="field">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $evento->hora_inicio }}" required>
            </div>
            <div class="field">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ $evento->hora_fin }}" required>
            </div>
            <div class="field">
                <label for="numero_invitados">Número de invitados:</label>
                <input type="number" class="form-control" id="numero_invitados" name="numero_invitados" value="{{ $evento->numero_invitados }}" required>
            </div>
            <div class="field">
                <label for="grupopaquete_id">Paquete:</label>
                <select class="form-control" id="grupopaquete_id" name="grupopaquete_id" required>
                    @foreach ($grupos_paquetes as $paquete)
                        <option value="{{ $paquete->id }}" @if ($paquete->id == $evento->grupopaquete_id) selected @endif>{{ $paquete->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="servicios">Servicios:</label>
                <select class="form-control" id="servicios" name="servicios[]" multiple required>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}" @if (in_array($servicio->id, $evento->servicios->pluck('id')->toArray())) selected @endif>{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="imagenes">Imágen</label>
                <input type="file" name="imagen[]" id="imagen" multiple>
            </div>

                <div class="field">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="estado" name="estado" required>
                        @if (auth()->user()->tipo === 'cliente')
                        <option value="No confirmado" @if ($evento->estado == 'No confirmado') selected @endif>No confirmar</option>
                        <option value="Validando" @if ($evento->estado == 'Validando') selected @endif>Confirmar</option>
                        @elseif (auth()->user()->tipo === 'administrador'||auth()->user()->tipo === 'empleado')
                        <option value="Rechazado" @if ($evento->estado == 'Rechazado') selected @endif>Rechazar</option>
                        <option value="Agendado" @if ($evento->estado == 'Agendado') selected @endif>Aceptar</option>
                        @endif

                    </select>
                </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
