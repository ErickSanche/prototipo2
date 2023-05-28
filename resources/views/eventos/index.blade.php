@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Lista de eventos:</h1>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Número de invitados</th>
                    <th>Imagenes</th>
                    <th>Servicios</th>
                    <th>Precio Total</th>
                    <th>Grupo/Paquete</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    @if (auth()->user()->tipo === 'empleado' && $evento->estado === 'Agendado')
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->fecha }}</td>
                            <td>{{ $evento->hora_inicio }}</td>
                            <td>{{ $evento->hora_fin }}</td>
                            <td>{{ $evento->numero_invitados }}</td>
                            <td>
                                @if ($evento->imagen)
                                    @foreach (explode(',', $evento->imagen) as $imagen)
                                        <img src="{{ asset("app/public/$imagen") }}" width="250" height="150" alt="">
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @foreach ($evento->servicios as $servicio)
                                    {{ $servicio->nombre }}<br>
                                @endforeach
                            </td>
                            <td>{{ $evento->precio_total }}</td>
                            <td>{{ $evento->grupopaquete_id }}</td>
                            <td>{{ $evento->estado }}</td>
                            <td>
                                @can('update', $evento)
                                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
                                @endcan

                                @can('delete', $evento)
                                    @if ($evento->estado !== 'Validando')
                                        <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    @endif
                                @endcan

                                @if (auth()->user()->tipo === 'administrador' || auth()->user()->tipo === 'empleado')
                                    <a href="{{ route('eventos.vistaAbonar', $evento->id) }}" class="btn btn-primary">Abonar</a>
                                @endif

                                <a href="{{ route('eventos.vistaCargosExtras', $evento->id) }}" class="btn btn-primary">Sumar Extra</a>
                            </td>
                        </tr>
                    @elseif (auth()->user()->tipo !== 'empleado')
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->fecha }}</td>
                            <td>{{ $evento->hora_inicio }}</td>
                            <td>{{ $evento->hora_fin }}</td>
                            <td>{{ $evento->numero_invitados }}</td>
                            <td>
                                @if ($evento->imagen)
                                    @foreach (explode(',', $evento->imagen) as $imagen)
                                        <img src="{{ asset("app/public/$imagen") }}" width="250" height="150" alt="">
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @foreach ($evento->servicios as $servicio)
                                    {{ $servicio->nombre }}<br>
                                @endforeach
                            </td>
                            <td>{{ $evento->precio_total }}</td>
                            <td>{{ $evento->grupopaquete_id }}</td>
                            <td>{{ $evento->estado }}</td>
                            <td>
                                @can('update', $evento)
                                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-primary">Editar</a>
                                @endcan

                                @can('delete', $evento)
                                    @if ($evento->estado !== 'Validando')
                                        <form method="POST" action="{{ route('eventos.destroy', $evento->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    @endif
                                @endcan

                                @if (auth()->user()->tipo === 'administrador' || auth()->user()->tipo === 'empleado')
                                    <a href="{{ route('eventos.vistaAbonar', $evento->id) }}" class="btn btn-primary">Abonar</a>
                                @endif

                                <a href="{{ route('eventos.vistaCargosExtras', $evento->id) }}" class="btn btn-primary">Sumar Extra</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
