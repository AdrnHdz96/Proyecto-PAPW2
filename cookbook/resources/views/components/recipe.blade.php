<div class="col-md-12 noticia">

    @if(isset($receta))
     @if(Session::get('usuario')->idUsuario != $usuario[0]->idUsuario)
        <img src="{{$usuario[0]->urlFoto}}" class="profile">
        <span class="nombre"><a href="/user/profile/{{$usuario[0]->idUsuario}}">{{$usuario[0]->nombre}}</a></span>
    @else
    @endif
    @endif

    <h2>{{$receta->nombre}}</h2>
    <h1> <span class="fecha"> &#8226; {{substr($receta->created_at, 0, -9)}}</span></h1>
    <div class="tags">
         @for($i=0;$i < count($generosReceta);$i++)
        @if($generosReceta[$i]->idReceta == $receta->idReceta)
        <!--Sera dinamico-->
        <span>#{{$generosReceta[$i]->nombre}}</span>
        @endif
        @endfor
    </div>
    <h2>Ingredientes</h2>
    <!--Ingredientes-->
    @for($i=0;$i<count($ingredientes);$i++)
    @component('components.ingredient')
        @slot('ingredient')
            {{$ingredientes[$i]->nombre}}
        @endSlot
    @endcomponent
    @endfor
    <!--Pasos-->
    @for($i=0;$i<count($pasos);$i++)
    @component('components.step')
        @slot('numberStep')
            {{$i+1}}
        @endslot
        @slot('contentStep')
            {{$pasos[$i]->descripcion}}
        @endslot
    @endcomponent
    @endfor

    <img src="{{$receta->urlFoto}}" class="imagen">


    <div class="like text-right">

     @if(Session::get('usuario')->idUsuario != $usuario[0]->idUsuario)  
     @if(isset($like))
     <a href="/user/dislike/{{$receta->idReceta}}" class="glyphicon glyphicon-heart"></a>

     @else
     <a href="/user/like/{{$receta->idReceta}}" class="glyphicon glyphicon-heart-empty"></a>
     @endif
    @else
    @endif
    </div>
</div>