@extends('userMaster')

@section('content')
<div class="col-md-11 col-md-offset-1" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-8 col-sm-12 receta"> <!--Loop de noticias-->
        @if(isset($like))
            @component('components.recipe',['usuario'=>$usuario,'receta'=>$receta,'generosReceta'=>$generosReceta,'ingredientes'=>$ingredientes,'pasos' => $pasos,'like' => $like])
            @slot('name')
            @nombre
            @endslot
            @endcomponent
            @else
            @component('components.recipe',['usuario'=>$usuario,'receta'=>$receta,'generosReceta'=>$generosReceta,'ingredientes'=>$ingredientes,'pasos' => $pasos])
            @slot('name')
            @nombre
            @endslot
            @endcomponent
            @endif
        </div>
        <div class="col-md-offset-1 col-md-3 hidden-xs hidden-sm">
            <!--Gente para seguir-->
            <div class="users">

                @for ($i=0; $i<count($usuariosSeguir); $i++)
                @component('components.user',['usuario' => $usuariosSeguir[$i]])
                @slot('name')
                @nombre
                @endslot
                @slot('typeButton')
                <button class="btn btn-primary" style="width:90px">Seguir</button>
                @endslot
                @slot('removeButton')
                <button class="btn glyphicon glyphicon-remove"></button>
                @endslot
                @endcomponent
                @endfor

            </div>
        </div>
        <div class="col-md-8 col-sm-12">

            <h1>Comentarios</h1>
            <div id="comentarioReceta" style="width: 80%">
                <label>Tu comentario: </label>
                <form method="POST" action="/user/agregarComentario">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden"  name="idReceta" value="{{$receta->idReceta}}">
                    <input style="width: 70%"  required type="text" maxlength="400" name="comentario">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            @for($i=0;$i<count($comentarios);$i++)
            @component('components.comment',['comentario'=>$comentarios[$i]])
            @slot('name')
            @endslotf
            @endcomponent
            @endfor
        </div>
    </div>
</div>
@stop