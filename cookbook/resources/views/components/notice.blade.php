<div class="col-md-12 noticia">
    @if(isset($receta))
     @if(Session::get('usuario')->idUsuario != $receta->idUsuario)
        <img src="../img/1.png" class="profile">
        <span class="nombre"><a href="/user/profile">{{$receta->idUsuario}}</a></span>
    @else
    <div class="text-right">
        <a href="/user/editarReceta/{{$receta->idReceta}}" class="btn btn-default glyphicon glyphicon-pencil"></a>
    </div>
    @endif
    <h1><a href="/user/recipe/{{$receta->idReceta}}">{{$receta->nombre}}</a><span class="fecha"> &#8226; {{ substr($receta->created_at, 0, -9) }}</span></h1>
    <div class="tags">
        @for($i=0;$i < count($generos);$i++)
        @if($generos[$i]->idReceta == $receta->idReceta)
        <!--Sera dinamico-->
        <span>#{{$generos[$i]->nombre}}</span>
        @endif
        @endfor
    </div>
    <p class="text-justify"><br><a href="/user/recipe">ver m&aacute;s...</a></p>
    <a href="/user/recipe/{{$receta->idReceta}}"><img src="{{$receta->urlFoto}}"  class="imagen"></a>
    <div class="like text-right">
        @if(Session::get('usuario')->idUsuario != $receta->idUsuario)
         <span class="glyphicon glyphicon-heart-empty"></span>
        @endif
    </div>
    @endif
</div>