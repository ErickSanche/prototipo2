
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/estiloboton.css') }}">
  <link rel="stylesheet" href="{{ asset('css/f1.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
  <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
</head>
<body>
  <header>
    <div class="interior">
      <nav class="navegacion">
        <ul>
          <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($paquetes as $paquete)
  @if ($paquete->estado == 1)
  <div class="col">
    <article class="card">
        <img
          class="card__background"
          src="{{ asset("app/public/$paquete->imagen") }}"
          alt="{{ $paquete->nombre }}"
          width="1920"
          height="2193"
        />
        <div class="card__content | flow">
          <div class="card__content--container | flow">
            <h2 class="card__title">{{ $paquete->nombre }}</h2>
            <p class="card__description">{{ $paquete->descripcion }}</p>
            <p class="card__description">{{ $paquete->precio }}</p>
          </div>
        </div>
      </article>
  </div>
  @endif
@endforeach

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
