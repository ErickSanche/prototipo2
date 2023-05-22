
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
 
  <body>

<section class="form_wrap">

    <section class="cantact_info">
        <section class="info_title">
            <span class="fa fa-user-circle"></span>
            <h2>Agregar<br>Servicios</h2>
        </section>
        <section class="info_items">
            <p><span></span>Mantelería</p>
            <p><span></span>Meseros aire acondicionado</p>
            <p><span></span>Aire acondicionado</p>

        </section>
    </section>

<form method="POST" action="{{ route('servicios.store') }}" class="form_contact">
    @csrf

    <div class="user_info">
        <label for="nombre">Nombre del servicio</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>

    <div>
        <label for="descripcion">Descripción del servicio</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
    </div>

    <div>
        <label for="precio">Precio del servicio</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
    </div>

    <button id="btnSend" type="submit">Agregar servicio</button>
</form>
