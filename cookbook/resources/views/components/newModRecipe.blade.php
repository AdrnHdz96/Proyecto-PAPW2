<div class="col-md-8 col-md-offset-2 profileHeader">
	<div class="col-md-10">
		<h1 id="tipoAccion">{{$tipo}} receta</h1>
	</div>
</div>
<div class="col-md-8 col-md-offset-2 profileStory">
	@if($tipo != "Editar")
	<form id="formReceta" method="POST" action="/user/nuevaReceta" enctype="multipart/form-data">
		@else
		<form id="formReceta" method="POST" action="/user/editarReceta" enctype="multipart/form-data">
			@endif
			{{ csrf_field() }}
			<div class="form-group row">
				<label for="nombre" class="col-md-offset-1 col-md-2 col-form-label">Nombre</label>
				<div class="col-md-8">
					@if($tipo != "Editar")
					<input class="form-control" type="text" placeholder="Nombre de la receta" id="nombreReceta" name="nombreReceta">
					@else
					<input class="form-control" type="text" placeholder="Nombre de la receta" id="nombreReceta" name="nombreReceta" value="{{$receta->nombre}}">
					<input  type="hidden" name="idReceta" value="{{$receta->idReceta}}">
					@endif
				</div>
			</div>
			<hr>
			<h3>Ingredientes</h3>
			<div id="ingredientes">
				<div class="form-group row">
					<div class="col-md-offset-1 col-md-8">
						<input class="form-control" multiple type="text" id="ingrediente" placeholder="Ej. 1/2 taza de leche">
					</div>
					<div class="col-md-3">
						<button type="button" id="btnAddIngredient" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-md-offset-1 col-md-11">
					@if($tipo != "Editar")
					<ul id="ingredientList">
					</ul>
					@else
					<ul id="ingredientList">
						@for($i=0; $i< count($ingredientes); $i++)
						<li>
							<input type='hidden' name='ingredientes[]' value='{{$ingredientes[$i]->nombre}}'/> {{$ingredientes[$i]->nombre}}
							<button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button></li>
							@endfor

						</ul>
						@endif
					</div>
				</div>
				<hr>
				<h3>Pasos</h3>
				<div id="pasos">
					<div class="form-group row">
						<div class="col-md-offset-1 col-md-8">
							<input class="form-control" type="text" id="paso" placeholder="Ej. Vierta la leche en un tazon grande">
						</div>
						<div class="col-md-3">
							<button type="button" id="btnAddStep" class="btn btn-primary">Agregar</button>
						</div>
					</div>
					<div class="col-md-offset-1 col-md-11">
						@if($tipo != "Editar")					
						<ul id="stepList">
						</ul>
						@else
						<ul id="stepList">
							@for($i=0; $i< count($pasos); $i++)
							<li>
								<input type='hidden' name='pasos[]' value='{{$pasos[$i]->descripcion}}'/> {{$pasos[$i]->descripcion}}
								<button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button></li>
								@endfor

							</ul>
							@endif
						</div>
					</div>
					<hr>
					<h3>Foto</h3>
					<div>
						<div class="form-group row">
							<div class="col-md-offset-1 col-md-8">
								<input required type="file" accept="image/*" name="foto" id="foto">
							</div>
						</div>
					</div>
					<hr>
					<h3>Categoría</h3>
					<div id="foto">
						<div class="form-group row">
							<div class="col-md-offset-1 col-md-8">
								@if($tipo != "Editar")

								@for ($i=0; $i< count($generos); $i++)
								<div class="col-md-4">
									<input type="checkbox" name="generos[]" value="{{$generos[$i]->idGenero}}">#{{$generos[$i]->nombre}}
								</div>
								@endfor

								@else
								@for ($i=0; $i< count($generos); $i++)
								<div class="col-md-4">
									<input type="checkbox" name="generos[]" value="{{$generos[$i]->idGenero}}">#{{$generos[$i]->nombre}}
								</div>
								@endfor
								<!--
								@php
								$arreglo = [];
								@endphp
								@for ($i=0; $i< count($generosReceta); $i++)
								@php 
								$arreglo[] = $generosReceta[$i]->idGenero;
								@endphp
								<div class="col-md-4">
									<input type="checkbox" checked name="generos[]" value="{{$generos[$i]->idGenero}}">#{{$generos[$i]->nombre}}
								</div>
								@endfor


						@for ($i=0; $i< count($generos); $i++)
							@for($j=0; $j< count($generosReceta); $j++)
								@if($generosReceta[$j]->idGenero != $generos[$i]->idGenero)
								<div class="col-md-4">
									<input type="checkbox" name="generos[]" value="{{$generos[$i]->idGenero}}">#{{$generos[$i]->nombre}}
								</div>
								 @php
									break;
								@endphp
								
								@endif
							@endfor
						@endfor
-->
						@endif

					</div>
				</div>
			</div>
			<div class="text-right">
				<button id="btnAgregar" type="button" class="btn btn-primary glyphicon glyphicon-floppy-disk"></button>
				<button id="btnCancelarReceta" type="button" class="btn btn-default">Cancelar</button>
			</div>
		</form>
	</div>