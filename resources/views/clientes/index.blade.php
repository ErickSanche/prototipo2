<center>
    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($paquetes as $paquete)
          <tr>
            <td>{{ $paquete->id }}</td>
            <td>{{ $paquete->nombre }}</td>
            <td>{{ $paquete->precio }}</td>
            <td>{{ $paquete->descripcion }}</td>
            <td>{{ $paquete->estado }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

</center>
