<div class="col-md-12 noticia">
    @if(isset($name))
        <img src="../img/1.png" class="profile">
        <span class="nombre"><a href="/user/profile">{{$name}}</a></span>
    @endif
    <h1>Nombre Receta<span class="fecha"> &#8226; 10/10/2000</span></h1>
    <div class="tags">
        <!--Sera dinamico-->
        <span>#Desayuno</span>
        <span>#Salado</span>
        <span>#Picoso</span>
    </div>
    <h2>Ingredientes</h2>
    <!--Ingredientes-->
    @component('components.ingredient')
        @slot('ingredient')
            1/2 Ajo
        @endSlot
    @endcomponent
    <!--Pasos-->
    @component('components.step')
        @slot('numberStep')
            1
        @endslot
        @slot('contentStep')
            Corte el ajo en trozos pequeños
        @endslot
    @endcomponent
    @component('components.step')
        @slot('numberStep')
            2
        @endslot
        @slot('contentStep')
            Comase el ajo
        @endslot
    @endcomponent

    <img src="../img/fondo1.jpg" class="imagen">
    <div class="like text-right">
        @if(isset($like))
            {{$like}}
        @else
            <span class="glyphicon glyphicon-heart-empty"></span>
        @endif
    </div>
</div>