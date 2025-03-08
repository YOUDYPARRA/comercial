<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Folio de Orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::text('folio',null,array('ng-model'=>'objeto.folio','class'=>'form-control','placeholder'=>'Folio...')) !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="verFolio()">Tomar Folio Manual</button>
        <button type="button" class="btn btn-primary" ng-click="folioCero()">Tomar Folio Automatico</button>
      </div>
    </div>
  </div>
</div>
