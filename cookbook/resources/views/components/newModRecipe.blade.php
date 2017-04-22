<div class="col-md-8 col-md-offset-2 profileHeader">
		<div class="col-md-10">
			<h1>{{$tipo}} tu receta!!</h1>
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2 profileStory">
		<form method="POST" action="">
			<div class="form-group row">
				<label for="nombre" class="col-md-offset-1 col-md-2 col-form-label">Nombre</label>
				<div class="col-md-8">
					<input class="form-control" type="text" placeholder="Nombre de la receta" id="nombre" name="nombre">
				</div>
			</div>
			<hr>
			<h3>Ingredientes</h3>
			<div id="ingredientes">
				<div class="form-group row">
					<div class="col-md-offset-1 col-md-8">
						<input class="form-control" type="text" name="ingrediente" id="ingrediente" placeholder="Ej. 1/2 taza de leche">
					</div>
					<div class="col-md-3">
						<button type="button" id="btnAddIngredient" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-md-offset-1 col-md-11">
					<ul id="ingredientList">
					</ul>
				</div>
			</div>
			<hr>
			<h3>Pasos</h3>
			<div id="pasos">
				<div class="form-group row">
					<div class="col-md-offset-1 col-md-8">
						<input class="form-control" type="text" name="paso" id="paso" placeholder="Ej. Vierta la leche en un tazon grande">
					</div>
					<div class="col-md-3">
						<button type="button" id="btnAddStep" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-md-offset-1 col-md-11">
					<ul id="stepList">
					</ul>
				</div>
			</div>
			<hr>
			<h3>Foto</h3>
			<div id="foto">
				<div class="form-group row">
					<div class="col-md-offset-1 col-md-8">
						<input type="file" accept="image/*" name="foto" id="foto">
					</div>
				</div>
			</div>
			<hr>
			<h3>Tags</h3>
			<div id="foto">
				<div class="form-group row">
					<div class="col-md-offset-1 col-md-8">
					@for ($i=0; $i<9; $i++)
						<div class="col-md-4">
							<input type="checkbox" name="Tag">#Desayuno
						</div>
					@endfor
					</div>
				</div>
			</div>
			<div class="text-right">
				<button type="button" class="btn btn-primary glyphicon glyphicon-floppy-disk"></button>
				<button type="button" class="btn btn-default">Cancelar</button>
			</div>
		</form>
	</div>