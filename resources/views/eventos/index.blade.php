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
  <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
</head>

<body>

  <header>
    <div class="interior">
      <nav class="navegacion">
        <ul>
          <li><a href="{{ route('eventos.create') }}">Agregar Evento</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <h1><span>Lista de eventos</span></h1>

  <div class="img-gallery">
    @foreach ($eventos as $evento)
      <div class="card_info">
        @if ($evento->imagen)
          <div class="slider">
            @foreach (explode(',', $evento->imagen) as $imagen)
              <div>
                <img src="{{ asset("app/public/$imagen") }}" width="30" height="50%"  onclick="openFulImg(this.src)">
              </div>
            @endforeach
          </div>
        @endif

        <div class="head">
          <p class="title">Datos del evento</p>
          <div class="description">
            <div class="item">
              <i>{{ $evento->id }}</i>
              <i>{{ $evento->nombre }}</i>
            </div>
          </div>
        </div>

        <ul class="list">
          <li>Fecha: {{ $evento->fecha }}</li>
          <li>Hora de inicio: {{ $evento->hora_inicio }}</li>
          <li>Hora de Fin: {{ $evento->hora_fin }}</li>
          <li>Invitados: {{ $evento->numero_invitados }}</li>
          <li>
            @foreach ($evento->servicios as $servicio)
              {{ $servicio->nombre }}<br>
            @endforeach
          </li>
          <li>Precio: {{ $evento->precio_total }}</li>
          <li>Paquete: {{ $evento->grupopaquete_id }}</li>
          <li>Estado: {{ $evento->estado }}</li>
          <p>
            @can('update', $evento)
              <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
            @endcan

            @can('delete', $evento)
              @if ($evento->estado !== 'Validando')
                <a>
                <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
</a>
              @endif
            @endcan
            @if ($evento->estado === 'Agendado')
            @if (auth()->user()->tipo === 'administrador' || auth()->user()->tipo === 'empleado')
              <a href="{{ route('eventos.vistaAbonar', $evento->id) }}" class="btn btn-primary">Abonar</a>
            @endif

            @if (auth()->user()->tipo === 'administrador' || auth()->user()->tipo === 'empleado')
              <a href="{{ route('eventos.vistaCargosExtras', $evento->id) }}" class="btn btn-primary">Gastos</a>
            @endif
          @endif

          </p>
        </ul>
      </div>
    @endforeach
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });

      $('#example').DataTable();
    });
  </script>
</body>

</html>
