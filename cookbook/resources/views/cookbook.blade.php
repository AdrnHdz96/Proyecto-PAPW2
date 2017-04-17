@extends('userMaster')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		@for ($i=0; $i<2; $i++)
			@component('components.notice')
				@slot('name')
					@nombre
				@endslot
				@slot('like')
					<span class="glyphicon glyphicon-heart"></span>
				@endslot
			@endcomponent
		@endfor
	</div>
@stop