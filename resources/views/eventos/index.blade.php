<!DOCTYPE html>
<html lang="en">
    <header>
        <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
            <div class="interior">
                <nav class="navegacion">
                    <ul>
                        <li><a href="{{ route('gerente.verusuario') }}">Ver usuarios</a></li>
                        <li><a href="{{ route('registrar') }}">Agregar usuario</a></li>
                        <li><a href="{{ route('gerente.verservicios') }}">Ver servicios</a></li>
                        <li><a href="">Agregar servicios</a></li>
                        <li><a href="{{ route('salida') }}">Cerrar Sesion</a>
                    </ul>
                </nav>
            </div>
    </header>
    <head>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<body>
	<h1>Lista de eventos:</h1>
	<div class="container mt-5">
                <table id="example" class="table table-striped" style="width:100%">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha</th>
				<th>Lugar</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($eventos as $evento)
			<tr>
				<td>{{ $evento->nombre }}</td>
				<td>{{ $evento->fecha }}</td>
				<td>{{ $evento->lugar }}</td>
                <td>{{ $evento->lugar }}</td>
                <td>{{ $evento->lugar }}</td>
                <td>{{ $evento->lugar }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function () {
    $('#example').DataTable();
});

        </script>
</body>
</html>
