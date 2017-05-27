<div class="comment">
    <div class="col-xs-12 colorComment">
        <img src="{{$comentario->fotoUsuario}}" class="profile">
        <span class="nombre"><a href="/user/profile/{{$comentario->idUsuario}}">{{$comentario->nombreUsuario}}</a></span>
        <p>{{$comentario->comentario}}</p>
        <hr/>
    </div>
</div>