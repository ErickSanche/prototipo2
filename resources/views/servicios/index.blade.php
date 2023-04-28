<table class="table table-bordered table-hover">
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
        @foreach ($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->precio }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>
                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                    <button type="button" class="btn btn-success">
                        <a href="{{ route('servicios.edit', $servicio->id) }}">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
