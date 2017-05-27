@extends('userMaster')

@section('content')
<div class="col-md-11 col-md-offset-1">
    <div class="row">
        <div class="col-md-8 col-sm-12"> <!--Loop de noticias-->
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
        <div class="col-md-offset-1 col-md-3 hidden-xs hidden-sm">
            <!--Gente para seguir-->
            <div class="users">
                @for ($i=0; $i<count($usuarios); $i++)
                @component('components.user',['usuario' => $usuarios[$i]])
                @endcomponent
                @endfor
            </div>
        </div>
    </div>
</div>
@stop