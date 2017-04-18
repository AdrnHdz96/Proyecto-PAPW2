<div class="col-md-12 noticia">
    @if(isset($name))
        <img src="../img/1.png" class="profile">
        <span class="nombre"><a href="/user/profile">{{$name}}</a></span>
    @endif
    <h1><a href="/user/recipe">Nombre Receta</a><span class="fecha"> &#8226; 10/10/2000</span></h1>
    <div class="tags">
        <!--Sera dinamico-->
        <span>#Desayuno</span>
        <span>#Salado</span>
        <span>#Picoso</span>
    </div>
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat ornare lectus nec feugiat. Integer facilisis lacus nunc, et sodales urna eleifend at. Quisque nec finibus magna. Proin et arcu nec tellus fringilla venenatis eget non dui. Suspendisse pharetra tristique sem at maximus. Sed augue ante, rhoncus eget mi eu, scelerisque vehicula nulla.<br><a href="/user/recipe">ver m&aacute;s...</a></p>
    <a href="/user/recipe"><img src="../img/fondo1.jpg" class="imagen"></a>
    <div class="like text-right">
        @if(isset($like))
            {{$like}}
        @else
            <span class="glyphicon glyphicon-heart-empty"></span>
        @endif
    </div>
</div>