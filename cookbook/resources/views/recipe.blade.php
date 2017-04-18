@extends('userMaster')

@section('content')
        <div class="col-md-11 col-md-offset-1">
            <div class="row">
                <div class="col-md-8 col-sm-12"> <!--Loop de noticias-->
                    @component('components.recipe')
                        @slot('name')
                            @nombre
                        @endslot
                    @endcomponent
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
                <div class="col-md-8 col-sm-12">
                <h1>Comentarios</h1>
                @for($i=0;$i<5;$i++)
                	@component('components.comment')
                		@slot('name')
                                @nombre
                        @endslot
                        @slot('content')
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas orci eu ultricies blandit. Maecenas ac interdum ex. Ut condimentum interdum est in porta. Duis quam lorem, gravida vel neque vel, tempor porttitor mi. Vestibulum pellentesque porttitor cursus. Nulla ut ligula in velit egestas viverra non a leo. Donec pretium ante leo, vel consectetur ligula viverra id. Sed eu pellentesque massa. In nec nulla quis lorem dignissim tincidunt eu id est. Pellentesque tempus elit nulla, eu malesuada urna hendrerit pellentesque. Donec nec finibus lectus. Nullam euismod nibh at venenatis suscipit. Nullam feugiat dapibus cursus.
                        @endslot
                	@endcomponent
                @endfor
                </div>
            </div>
        </div>
@stop