@extends('userMaster')

@section('content')
<div class="col-md-8 col-md-offset-2">
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
@stop