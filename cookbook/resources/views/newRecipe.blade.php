@extends('userMaster')

@section('content')

@if(isset($ingredientes))
@component('components.newModRecipe',['generos' => $generos,'receta' => $receta,'ingredientes' => $ingredientes,'pasos' => $pasos, 'generosReceta' => $generosReceta])



	@slot('tipo')
	Editar
	@endslot

@endcomponent
@else
@component('components.newModRecipe',['generos' => $generos])


	@slot('tipo')
	Nueva
	@endslot


@endcomponent
@endif



@stop
