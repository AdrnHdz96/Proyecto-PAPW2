@extends('userMaster')

@section('content')
		<div class="col-md-8 col-md-offset-2 profileHeader">
			<div class="col-md-2">
				<img src="../img/1.png" class="photo">
			</div>
			<div class="col-md-10">
				<h3>@Nombre</h3>
				<h4>Masculino</h4>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-2 profileStory">
		@for ($i=0; $i<2; $i++)
			@component('components.notice')
			@endcomponent
		@endfor
		</div>
@stop