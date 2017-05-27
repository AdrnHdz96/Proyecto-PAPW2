<div class="col-md-12 noticia">
    @if(isset($receta))
    @if(Session::get('usuario')->idUsuario != $receta->idUsuario)
    @if(!isset($busquedaUsuario))
    <img src="{{$receta->fotoUsuario}}" class="profile">
    <span class="nombre"><a href="/user/profile/{{$receta->idUsuario}}">{{$receta->nombreUsuario}}</a></span>
    @endif
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
    <!-- <p class="text-justify"><br><a href="/user/recipe">ver m&aacute;s...</a></p> -->
    <a href="/user/recipe/{{$receta->idReceta}}"><img src="{{$receta->urlFoto}}"  class="imagen"></a>
    <div class="like text-right">
        <!--
        @if(Session::get('usuario')->idUsuario != $receta->idUsuario)
        @if(isset($likes))
        @if(count($likes)!=0)
        @for ($i=0; $i<count($likes); $i++)
        @if($likes[$i]==$receta->idReceta)
        <a href="/user/dislike/{{$receta->idReceta}}" class="glyphicon glyphicon-heart"></a>
        @else
        <a href="/user/like/{{$receta->idReceta}}" class="glyphicon glyphicon-heart-empty"></a>
        @endif
        @endfor
        @endif
        @else
        <a href="/user/like/{{$receta->idReceta}}" class="glyphicon glyphicon-heart-empty"></a>
        @endif
        @endif
    -->
    @php
    if(Session::get('usuario')->idUsuario != $receta->idUsuario){
    if(isset($likes)){
    $laik = false;
    for($i=0;$i<count($likes);$i++){
    if($receta->idReceta == $likes[$i]){
    $laik = true;
}
}

if($laik){
$url =  "/user/dislike/".$receta->idReceta;
echo '<a href="'.$url.'" class="glyphicon glyphicon-heart"></a>';
}else{
$url =  "/user/like/".$receta->idReceta;
echo '<a href="'.$url.'" class="glyphicon glyphicon-heart-empty"></a>';
}
}else{
$url =  "/user/like/".$receta->idReceta;
echo '<a href="'.$url.'" class="glyphicon glyphicon-heart-empty"></a>';
}   
}
@endphp
</div>
@endif
</div>