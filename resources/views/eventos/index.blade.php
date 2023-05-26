<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
</head>

<body>
    <div class="card">
        @foreach ($eventos as $evento)
        <div class="card_landing" style="--i:url(img.jpg)">
            <h6>eventos</h6>
            @if ($evento->imagen)
            @foreach (explode(',', $evento->imagen) as $imagen)
            <img src="{{ asset("app/public/$imagen") }} width="250" height="150" alt="">
            @endforeach
            @endif
        </div>
        <div class="card_info">
            <div class="head">
                <p class="title">evento</p>
                <div class="description">
                    <div class="item">
                        <p>{{ $evento->id }}</p>
                    </div>
                    <div class="item">
                    </div>
                </div>
            </div>

            <div class="content">
                <p class="title">datos del evento:</p>
                <ul class="list">
                    <li>{{ $evento->nombre }}</li>
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
                        <!-- Enlace para editar el evento -->
                        <a href="{{ route('eventos.edit', $evento->id) }}">Editar</a>

                        <!-- Formulario para eliminar el evento -->
                        <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
