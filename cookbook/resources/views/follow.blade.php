@extends('userMaster')

@section('content')
	<div class="col-md-offset-1 col-md-10">
	@for($i=0; $i<6; $i++)
	<div class="col-md-4">
	@component('components.user')
		@slot('name')
			@nombre
		@endslot
		@slot('typeButton')
			<button class="btn btn-primary" style="width:90px">Siguiendo</button>
		@endslot
	@endcomponent
	</div>
	@endfor
	</div>
@stop