@extends('userMaster')

@section('content')
<div class="col-md-8 col-md-offset-2 profileHeader">
	<div class="col-md-2">

		@if(!isset($busquedaUsuario))
		<img src="{{ Session::get('usuario')->urlFoto }}" class="photo">
		@else
		@if(count($recetas) != 0)
		<img src="{{ $recetas[0]->fotoUsuario }}" class="photo">
		@else
		<img src="{{ $usuario[0]->urlFoto }}" class="photo">

		@endif
		@endif
	</div>
	<div class="col-md-8">
		@if(!isset($busquedaUsuario))
		<h3>{{ Session::get('usuario')->nombre }}</h3>
		<h4>
			@if(Session::get('usuario')->genero == 0)
			Masculino
			@else
			Femenino
			@endif
		</h4>
		@else
		<h3>{{ $usuario[0]->nombre }}</h3>
		<h4>
			@if(Session::get('usuario')->genero == 0)
			Masculino
			@else
			Femenino
			@endif
		</h4>
		@endif
	</div>
	<div class="col-md-2">
				@if(!isset($busquedaUsuario))
				<a class="glyphicon glyphicon-plus-sign btn btn-default" href="/user/newRecipe"></a>
				@component('components.modal')
				@slot('modalTitle')
				Editar perfil
				@endslot
				@slot('modalContent')
				<form method="POST" action="/user/editarPerfil"  enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group row">
						<label for="contra" class="col-md-offset-1 col-md-2 col-form-label">Antigua contrase&ntilde;a</label>
						<div class="col-md-8">
							<input class="form-control" type="password" placeholder="Contrase&ntilde;a" id="contra" name="contraVieja">
						</div>
					</div>
					<div class="form-group row">
						<label for="contra" class="col-md-offset-1 col-md-2 col-form-label">Nueva contrase&ntilde;a</label>
						<div class="col-md-8">
							<input class="form-control" type="password" placeholder="Contrase&ntilde;a" id="contra" name="contraNueva">
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
									<input class="form-check-input" type="radio" name="genero" id="genero2" value="0" checked> Masculino
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" name="genero" id="genero1" value="1"> Femenino
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="foto" class="col-md-offset-1 col-md-2 col-form-label">Foto de perfil</label>
						<div class="col-md-8">
							<input type="file" name="foto" class="form-control-file" id="foto" aria-describedby="fileHelp">
						</div>
					</div>

					@endslot
					@slot('modalButton')
					<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-disk"></button>
					@endslot
					@endcomponent
				</form>
				@endif	

			</div>
		</div>
		<div class="col-md-8 col-md-offset-2 profileStory">
			@if(count($recetas) != 0)
			@for ($i=0; $i< count($recetas); $i++)
			@if(!isset($busquedaUsuario))
			@component('components.notice',['receta' => $recetas[$i],'generos' => $generos,'usuarios'=> $usuario[0]])
			@else
			@if(isset($likes))
			@component('components.notice',['receta' => $recetas[$i],'generos' => $generos,'usuarios'=> $usuario[0],'busquedaUsuario' => $busquedaUsuario, 'likes' => $likes])
			@endcomponent
			@else
			@component('components.notice',['receta' => $recetas[$i],'generos' => $generos,'usuarios'=> $usuario[0],'busquedaUsuario' => $busquedaUsuario])
			@endcomponent

			@endif
			@endif

			@endfor
			@endif
		</div>
		@stop