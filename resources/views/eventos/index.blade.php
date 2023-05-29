<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
  <link rel="stylesheet" href="{{ asset('css/card.css') }}">
  <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
</head>

<body>

  <h1>Lista de eventos:</h1>

  @foreach ($eventos as $evento)
  <div class="card">
    @if ($evento->imagen)
    @foreach (explode(',', $evento->imagen) as $imagen)
    <div class="card_landing">
      <img src="{{ asset("app/public/$imagen") }}" width="100%" height="400" alt="">
    </div>
    @endforeach
    @endif

    <div class="card_info">
      <div class="head">
        <p class="title">Datos del evento</p>
        <div class="description">
          <div class="item">
            <i>{{ $evento->id }}</i>
            <i>{{ $evento->nombre }}</i>
          </div>
        </div>
      </div>

      <div class="content">
        <ul class="list">
          <li>{{ $evento->fecha }}</li>
          <li>{{ $evento->hora_inicio }}</li>
          <li>{{ $evento->hora_fin }}</li>
          <li>{{ $evento->numero_invitados }}</li>
          <li>
            @foreach ($evento->servicios as $servicio)
            {{ $servicio->nombre }}<br>
            @endforeach
          </li>
          <li>{{ $evento->precio_total }}</li>
          <li>{{ $evento->grupopaquete_id }}</li>
          <li>{{ $evento->estado }}</li>
          <li>
            @can('update', $evento)
            <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
            @endcan

            @can('delete', $evento)
            @if ($evento->estado !== 'Validando')
            <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            @endif
            @endcan

            @if (auth()->user()->tipo === 'administrador' || auth()->user()->tipo === 'empleado')
            <a href="{{ route('eventos.vistaAbonar', $evento->id) }}" class="btn btn-primary">Abonar</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </div>
  @endforeach

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
