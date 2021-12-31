<!-- MODAL {{$title}} -->
<div class="modal fade" id="{{$id}}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-navy">
        <h4 class="modal-title text-white">{{$title}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
          {{$slot}}
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>