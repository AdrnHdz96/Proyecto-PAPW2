@extends('userMaster')

@section('content')
        <div class="col-md-11 col-md-offset-1">
                <div class="row">
                @for ($i = 0; $i<6; $i++)
                    <div class="col-md-8 col-sm-12"> <!--Loop de noticias-->
                        <div class="col-md-12 noticia">
                            <img src="../img/1.png" class="profile">
                            <span class="nombre"><a href="">Nombre Persona</a></span>
                            <h1><a href="">Nombre Receta</a><span class="fecha"> &#8226; 10/10/2000</span></h1>
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat ornare lectus nec feugiat. Integer facilisis lacus nunc, et sodales urna eleifend at. Quisque nec finibus magna. Proin et arcu nec tellus fringilla venenatis eget non dui. Suspendisse pharetra tristique sem at maximus. Sed augue ante, rhoncus eget mi eu, scelerisque vehicula nulla.<br><a href="">ver m&aacute;s...</a></p>
                            <a href=""><img src="../img/fondo1.jpg" class="imagen"></a>
                            <div class="like text-right">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                            </div>
                        </div>
                    </div>
                @endfor
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <!--Gente para seguir-->
                    </div>
                </div>
        </div>
@stop