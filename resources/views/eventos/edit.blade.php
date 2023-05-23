<!DOCTYPE html>
<html>
<head>
    <title>Editar evento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-+y/hcN0I7wsNfW1QH0b3qnaF0gB/KxTyK1QXto3OkPUgZi6ky1hL/nRjAvEYdBbgU5ECVRU5r6U5Xafy1ld6aw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Editar evento</h1>

        <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $evento->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $evento->fecha }}" required>
            </div>

            <div class="form-group">
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ $evento->hora_inicio }}" required>
            </div>

            <div class="form-group">
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ $evento->hora_fin }}" required>
            </div>

            <div class="form-group">
                <label for="numero_invitados">Número de invitados:</label>
                <input type="number" name="numero_invitados" id="numero_invitados" class="form-control" value="{{ $evento->numero_invitados }}" required>
            </div>

            <div class="form-group">
                <label for="grupopaquete_id">Paquete:</label>
                <select name="grupopaquete_id" id="grupopaquete_id" class="form-control" required>
                    <option value="">Seleccione un paquete</option>
                    @foreach($grupos_paquetes as $paquete)
                        <option value="{{ $paquete->id }}" {{ $paquete->id == $evento->grupopaquete_id ? 'selected' : '' }}>{{ $paquete->nombre }} - ${{ $paquete->precio }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="servicios">Servicios:</label>
                <select name="servicios[]" id="servicios" class="form-control" multiple required>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}" {{ in_array($servicio->id, $evento->servicios->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $servicio->nombre }} - ${{ $servicio->precio }}</option>
                    @endforeach
                </select>
            </div>

            @if(auth()->user()->tipo === 'administrador')
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="No Confirmado" {{ $evento->estado === 'No Confirmado' ? 'selected' : '' }}>No Confirmado</option>
                    <option value="Validando" {{ $evento->estado === 'Validando' ? 'selected' : '' }}>Validando</option>
                    <option value="Validado" {{ $evento->estado === 'Validado' ? 'selected' : '' }}>Validado</option>
                    <option value="Rechazado" {{ $evento->estado === 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>
            @else
            <input type="hidden" name="estado" value="Validando">
            @endif

            <div class="form-group">
                <label for='imagen'>Imagen</label>
                <input type='file' name='imagen' id='imagen'>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        </form>
    </div>
</body>
</html>
