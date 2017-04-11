<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>CookBook</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-icomoon.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

	<div class="container-fluid main">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<img class="navbar-brand" style="width: 75px; height: 75px;" src="img/1.png">
					<a class="navbar-brand" style="padding-top: 35px;" href="index.html">CookBook</a>
				</div>
			</div>
		</nav>

		<div id="cycler" class="col-xs-12 fondoPrincipal">
			<img id="img1" class="img active img-responsive" src=""/>
			<img id="img2" class="img img-responsive" src=""/>
			<img id="img3" class="img img-responsive" src=""/>
		</div>

		<div id="registrar" class="col-md-offset-3 col-md-6">
			<form class="hola" method="POST" action="">
				<div class="form-group row">
					<label for="nombre" class="col-md-offset-1 col-md-2 col-form-label">Nombre</label>
					<div class="col-md-8">
						<div class="input-group">
							<div class="input-group-addon">@</div>
							<input class="form-control" type="text" placeholder="nombre" id="nombre" name="nombre">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="correo" class="col-md-offset-1 col-md-2 col-form-label">Correo</label>
					<div class="col-md-8">
						<input class="form-control" type="email" placeholder="correo@ejemplo.com" id="correo" name="correo">
					</div>
				</div>
				<div class="form-group row">
					<label for="contra" class="col-md-offset-1 col-md-2 col-form-label">Contrase&ntilde;a</label>
					<div class="col-md-8">
						<input class="form-control" type="password" placeholder="Contrase&ntilde;a" id="contra" name="contra">
					</div>
				</div>
				<div class="form-group row">
					<label for="contraC" class="col-md-offset-1 col-md-2 col-form-label">Confirmar contrase&ntilde;a</label>
					<div class="col-md-8">
						<input class="form-control" type="password" placeholder="Confirmar contrase&ntilde;a" id="contraC" name="contraC">
					</div>
				</div>
				<div class="form-group row">
					<label for="nac" class="col-md-offset-1 col-md-2 col-form-label">Fecha de nacimiento</label>
					<div class="col-md-8">
						<input class="form-control" type="date" value="dd-mm-aaaa" id="nac" name="nac">
					</div>
				</div>
				<div class="form-group row">
					<label for="genero" class="col-md-offset-1 col-md-2 col-form-label">G&eacute;nero</label>
					<div class="col-md-8">
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="genero" id="genero2" value="m" checked> Masculino
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="genero" id="genero1" value="f"> Femenino
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="foto" class="col-md-offset-1 col-md-2 col-form-label">Foto de perfil</label>
					<div class="col-md-8">
   						<input type="file" class="form-control-file" id="foto" aria-describedby="fileHelp">
					</div>
				</div>
				<button type="submit" class="btn btn-primary col-md-offset-5">Crear cuenta</button>
			</form>
		</div>

		<div id="footer" class="col-xs-12 text-center">
			<div class="col-xs-offset-4 col-xs-4">
				<h2 class="footer-text">TheCookBook<sup>&#169;</sup> 2017</h2>
			</div>
			<div class="col-xs-4">
				<h2 id="icon">
					<span class="icon-facebook2"></span>
					<span class="icon-twitter"></span>
					<span class="icon-tumblr2"></span>
				</h2>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="vendors/jQuery.js"></script>
	<script type="text/javascript" src="vendors/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendors/circle-progress.min.js"></script>
	<script type="text/javascript" src="js/cycler.js"></script>
</body>
</html>