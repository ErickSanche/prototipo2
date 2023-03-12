@extends('plantillas.principal')
@section('contenido')
<form action="{{route('paquetes.update', $paquete_encontrado->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for='id'>ID</label>
    <input type='text' name='id' id='id' value="{{$paquete_encontrado->id}}" readonly>
    <br>
    <label for='nombre'>Nombre</label>
    <input type='text' name='nombre' id='nombre' value="{{$paquete_encontrado->nombre}}">
    <br>
    <label for='precio'>Precio</label>
    <input type='text' name='precio' id='precio' value="{{$paquete_encontrado->precio}}">
    <br>
    <label for='descripcion'>Descripcion</label>
    <input type='text' name='descripcion' id='descripcion' value="{{$paquete_encontrado->descripcion}}">
    <br>
    <input type="submit" value="ACTUALIZAR">
</form>

@endsection
