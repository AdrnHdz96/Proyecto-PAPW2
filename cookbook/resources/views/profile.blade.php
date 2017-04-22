@extends('userMaster')

@section('content')
		<div class="col-md-8 col-md-offset-2 profileHeader">
			<div class="col-md-2">
				<img src="../img/1.png" class="photo">
			</div>
			<div class="col-md-8">
				<h3>@Nombre</h3>
				<h4>Masculino</h4>
			</div>
			<div class="col-md-2">
				<!--<button class="btn btn-default" style="width:90px">Seguir</button>
				<button class="btn btn-primary" style="width:90px">Siguiendo</button>-->
				<a class="glyphicon glyphicon-plus-sign btn btn-default" href="/user/newRecipe"></a>
				@component('components.modal')
					@slot('modalTitle')
						Editar perfil
					@endslot
				@slot('modalContent')
						<form method="POST" action="">
						<div class="form-group row">
					<label for="contra" class="col-md-offset-1 col-md-2 col-form-label">Antigua contrase&ntilde;a</label>
					<div class="col-md-8">
						<input class="form-control" type="password" placeholder="Contrase&ntilde;a" id="contra" name="contra">
					</div>
				</div>
				<div class="form-group row">
					<label for="contra" class="col-md-offset-1 col-md-2 col-form-label">Nueva contrase&ntilde;a</label>
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
			</form>
					@endslot
					@slot('modalButton')
						<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-disk"></button>
					@endslot
				@endcomponent
			</div>
		</div>
		<div class="col-md-8 col-md-offset-2 profileStory">
		@for ($i=0; $i<2; $i++)
			@component('components.notice')
			@endcomponent
		@endfor
		</div>
@stop