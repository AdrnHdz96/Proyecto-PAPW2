@extends('userMaster')

@section('content')
	@component('components.newModRecipe')
		@slot('tipo')
			Ingresa
		@endslot
	@endcomponent
@stop