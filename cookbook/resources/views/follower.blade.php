@extends('userMaster')

@section('content')
	<div class="col-md-offset-1 col-md-10">
	@for($i=0; $i<6; $i++)
	<div class="col-md-4">
	@component('components.user')
		@slot('name')
			@nombre
		@endslot
		@if($i%2)
			@slot('typeButton')
				<button class="btn btn-default" style="width:90px">Seguir</button>
			@endslot
		@else
			@slot('typeButton')
				<button class="btn btn-primary" style="width:90px">Siguiendo</button>
			@endslot
		@endif
	@endcomponent
	</div>
	@endfor
	</div>
@stop