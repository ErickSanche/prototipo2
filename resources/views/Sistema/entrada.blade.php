<!doctype html>
<html lang="en">
<head>
  <title>Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>CLIENTES </span><span>ADMINISTRADOR</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>

                                            <form action="{{ route('validar') }}" method="post">
												@csrf
												<div class="cabeceraS">
													<div class="titulo">
													</div>
													<div class="items form-group">
														<input class="cajas form-style" name="usuario" type="text" placeholder="Usuario">
														<i class="input-icon uil uil-at"></i>
													</div>
													<div class="items form-group">
														<input class="cajas form-style" name="password" type="password" placeholder="Contraseña">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<div class="items">
														<input class="boton btn mt-4" type="submit" value="Validar">
													</div>
												</div>
											</form>

				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">ADMINISTRADOR</h4>
											<form action="{{ route('validar2') }}" method="post">
												@csrf
												<div class="cabeceraS">
													<div class="titulo">
													</div>
													<div class="items form-group">
														<input class="cajas form-style" name="usuario" type="text" placeholder="Usuario">
														<i class="input-icon uil uil-at"></i>
													</div>
													<div class="items form-group">
														<input class="cajas form-style" name="password" type="password" placeholder="Contraseña">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<div class="items">
														<input class="boton btn mt-4" type="submit" value="Validar">
													</div>
												</div>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>
