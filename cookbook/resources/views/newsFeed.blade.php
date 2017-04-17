@extends('userMaster')

@section('content')
        <div class="col-md-11 col-md-offset-1">
            <div class="row">
                <div class="col-md-8 col-sm-12"> <!--Loop de noticias-->
                @for ($i=0; $i<5; $i++)
                    @component('components.notice')
                        @slot('name')
                        @nombre
                        @endslot
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
                        @endcomponent
                    @endfor
                    </div>
                </div>
            </div>
        </div>
@stop