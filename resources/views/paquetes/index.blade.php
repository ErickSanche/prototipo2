<!DOCTYPE html>
<html lang="en">
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">
                    <ul>
                        <li><a href="{{ route('gerente.verusuario') }}">Ver usuarios</a></li>
                        <li><a href="{{ route('gerente.agregarusuario') }}">Agregar usuario</a></li>
                        <li><a href="{{ route('gerente.verservicios') }}">Ver servicios</a></li>
                        <li><a href="{{ route('gerente.agregarservicios') }}">Agregar servicio</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a>
                    </ul>
                </nav>
            </div>    
    </header>
    <head>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <!-- DATATABLES -->
       <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
       <!-- BOOTSTRAP -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
   
   </head>
    <center>
        
    <div class="container">
        <body>
            <h1>Paquetes</h1>
            <table  id="tablax" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $clave => $valor)
                        @if (is_array($valor))
                            <tr>
                                <td>{{ $clave }}</td>
                                <td>{{ $valor['nombre'] }}</td>
                                <td>{{ $valor['precio'] }}</td>
                                <td>{{ $valor['descripcion'] }}</td>
                                <td>
                                    <a href="{{ route('paquetes.edit', $clave) }}">Editar</a>
                                    <form action="{{ route('paquetes.destroy', $clave) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    
        
      

    </center>
    <head>
        <link rel="stylesheet" href="{{ asset('css/estilosboton.css') }}">  
    </head>
    <center>
    <div class="container"> 
        <div class="btn">
    
        <span><a href="{{ route('paquetes.create') }}">Crear nuevo paquete</a></span>
        <li><a href="{{ route('salida') }}">Salir..</a></li>
        <div class="dot"></div>
   
        </div>
    </div>
</center>
</body>   

</html>
