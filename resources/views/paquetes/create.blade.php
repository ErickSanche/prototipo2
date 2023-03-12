@extends('plantillas.principal')

@section('contenido')
<form action="{{route('paquetes.store')}}" method="post">
    @csrf
    <label for='id'>ID</label>
    <input type='text' name='id' id='id'>
    <br>
    <label for='nombre'>Nombre</label>
    <input type='text' name='nombre' id='nombre'>
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio'>
    <br>
    <label for='descripcion'>Descripción</label>
    <input type='text' name='descripcion' id='descripcion'>
    <br>
    <input type="submit" value="GUARDAR">
</form>

@if($errors->any())
    <div class="alert alert-danger">
        Por favor, complete todos los campos requeridos.
    </div>
@endif

@endsection
