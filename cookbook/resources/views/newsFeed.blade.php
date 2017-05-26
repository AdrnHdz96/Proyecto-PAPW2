@extends('userMaster')

@section('content')
        <div class="col-md-11 col-md-offset-1">
            <div class="row">
                <div class="col-md-8 col-sm-12"> <!--Loop de noticias-->
                @for ($i=0; $i< count($recetas); $i++)
                    @component('components.notice',['receta' => $recetas[$i],'generos' => $generos])
                    @endcomponent
                @endfor
                </div>
                <div class="col-md-4 hidden-xs hidden-sm">
                    <!--Gente para seguir-->
                    <div class="users">
                    @for ($i=0; $i<5; $i++)
                        @component('components.user')
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
            </div>
        </div>
@stop