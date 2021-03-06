<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8"/>
	<title>CookBook</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/style-user.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/style-iconmoon.css')}}">
	<link rel="shortcut icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<img class="navbar-brand" style="width: 75px; height: 75px;" src="{{asset('/img/1.png')}}">
				<a class="navbar-brand" style="padding-top: 35px;" href="/user/newsFeed">CookBook</a>
			</div>

			<ul class="nav navbar-nav navbar-right" style="margin-top: 10px;">
				<li>
					<form class="navbar-form">
						<div class="input-group">
							<!--<input type="text" class="form-control" placeholder="Buscar...">-->
							<div class="input-group-btn">
								<!--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>-->
								<a href="/user/search" class="btn btn-default glyphicon glyphicon-search"></a>
							</div>
						</div>

						<span class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="/user/profile">Ver Perfil</a></li>
								<li class="divider"></li>
	                			<li><a href="/user/cookbook">Mi Recetario</a></li>
			                	<li class="divider"></li>
		                		<li><a href="/cerrarSesion">Cerrar Sesi&oacute;n</a></li>
							</ul>
						</span>
					</form>
				</li>
			</ul>
		</div>
	</nav>

	<div class="main">
		<div class="container-fluid">
			<div class="row">

				@yield('content')

			</div>
		</div>	
	</div>

	<script type="text/javascript" src="{{asset('/vendors/jQuery.js')}}"></script>
	<script type="text/javascript" src="{{asset('/vendors/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/ingredientes.js')}}"></script>
</body>
</html>