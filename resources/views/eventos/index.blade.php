<!DOCTYPE html>
<html>
<head>
	<title>Lista de eventos</title>
</head>
<body>
	<h1>Lista de eventos:</h1>
	<table>
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
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
