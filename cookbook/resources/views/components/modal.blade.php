<!-- Trigger the modal with a button -->
<button type="button" class="glyphicon glyphicon-pencil btn btn-default" data-toggle="modal" data-target="#myModal"></button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$modalTitle}}</h4>
      </div>
      <div class="modal-body">
        {{$modalContent}}
      </div>
      <div class="modal-footer">
      @if(isset($modalButton))
          {{$modalButton}}
        @endif
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>