<div class="user">
    <div class="col-xs-12">
        <img src="../img/1.png" class="profile">
        <span class="nombre"><a href="/user/profile">{{$name}}</a></span>
        {{$typeButton}}
        @if(isset($removeButton))
        	{{$removeButton}}
        @endif
    </div>
</div>