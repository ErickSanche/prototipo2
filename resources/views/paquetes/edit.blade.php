<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Contacto Minimalista</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body>
  <center>
    <h1>EDITAR UN PAQUETE</h1>
  </center>
  <section class="form-contact">
    <header>
      <span>
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
      </span>
    </header>

    <form action="{{ route('paquetes.update', $paquete_encontrado->id) }}" class="contact" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <label for='nombre'>Nombre</label>
      <input type='text' name='nombre' id='nombre' value="{{ $paquete_encontrado->nombre }}">
      <br>
      <label for='precio'>Precio</label>
      <input type='text' name='precio' id='precio' value="{{ $paquete_encontrado->precio }}">
      <br>
      <label for='descripcion'>Descripción</label>
      <input type='text' name='descripcion' id='descripcion' value="{{ $paquete_encontrado->descripcion }}">
      <br>
      <label for='estado'>Estado</label>
      <input type='hidden' name='estado' value='0'>
      <input type='checkbox' name='estado' id='estado' value='1' {{ $paquete_encontrado->estado ? 'checked' : '' }}>
      <br>
      <label for='imagen'>Imagen</label>
      <input type='file' name='imagen' id='imagen'>
      <br>
      <input type="hidden" name="id" value="{{ $paquete_encontrado->id }}">
      <input type="submit" value="GUARDAR">
    </form>

    @if($errors->any())
      <div class="alert alert-danger">
        Por favor, complete todos los campos requeridos.
      </div>
    @endif
  </section>
</body>
</html>
