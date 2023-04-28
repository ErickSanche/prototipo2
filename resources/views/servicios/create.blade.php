<!-- resources/views/servicios/create.blade.php -->

<form method="POST" action="{{ route('servicios.store') }}">
    @csrf

    <div>
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

    <button type="submit">Agregar servicio</button>
</form>
