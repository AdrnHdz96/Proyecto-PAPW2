@extends('userMaster')

@section('content')
<div class="col-md-8 col-md-offset-2 profileHeader">
	<form method="POST" action="/user/buscarPost">
		{{ csrf_field() }}
		<div class="form-group row">
			<label for="from" class="col-md-1 col-form-label">Entre</label>
			<div class="col-md-3">
				<input class="form-control" required type="date" value="dd-mm-aaaa" id="from" name="from">
			</div>
			<label for="to" class="col-md-1 col-form-label">y</label>
			<div class="col-md-3">
				<input class="form-control" required type="date" value="dd-mm-aaaa" id="to" name="to">
			</div>
			<button type="submit" class="btn btn-primary">Filtrar</button>
		</div>
	</form>
</div>
@if(isset($recetas))
<div class="col-md-8 col-md-offset-2 profileStory">
	@for ($i=0; $i< count($recetas); $i++)
	@if(isset($likes))
	@component('components.notice',['receta' => $recetas[$i],'generos' => $generos,'usuarios'=>$usuarios, 'likes' =>$likes])
	@endcomponent
	@else
	@component('components.notice',['receta' => $recetas[$i],'generos' => $generos,'usuarios'=>$usuarios])
	@endcomponent
	@endif
	@endfor
</div>
@endif
@stop