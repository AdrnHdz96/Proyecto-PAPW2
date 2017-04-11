@extends('layouts.principal')

@section('content')
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img class="navbar-brand" style="width: 75px; height: 75px;" src="img/1.png">
					<a class="navbar-brand" style="padding-top: 35px;" href="#">CookBook</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right" style="padding-top: 15px;">					
						<li>
							<input type="text" placeholder="Usuario" maxlength="50">
						</li>
						<li>
							<input type="password" maxlength="25" placeholder="Contraseña">
						</li>
						<li>
							<button class="btn btn-primary" style="margin-top: 10px; margin-right: 5px;">Entrar</button>
						</li>
					</ul>

				</div>
			</div>
		</nav>

		<div id="cycler" class="col-xs-12 fondoPrincipal">
			<img id="img1" class="img active img-responsive" src=""/>
			<img id="img2" class="img img-responsive" src=""/>
			<img id="img3" class="img img-responsive" src=""/>
		</div>

		<div class="col-xs-12" id="slogan">
			<div id="slogan-text" class="col-xs-12 col-sm-offset-1 col-sm-5 col-md-offset-1 col-md-5">Descubre una nueva forma de cocinar todos los días, toda la vida...</div>
			<div id="slogan-btn" class="col-xs-12 col-sm-offset-1 col-sm-5 col-md-offset-2 col-md-4"> 
				<h1 style="font-size: 0.5em;" class="btn btn-primary"><a href="registro.html">REGÍSTRATE</a></h1>
			</div>
		</div>

@stop