<div class="panel panel-info">
  <div class="panel-heading"></div>
  <div class="panel-body">
<div class="row">
    <div class='col-md-3'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'></i> FOLIO</label>
            {!! Form::text('folio',null,array('ng-model'=>'compra_venta.folio','class'=>'form-control','ng-blur'=>'validaNumero(compra_venta.folio)')) !!}
        </div>
    </div>
    <div class='col-sm-1'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'></i> Letra</label>
            {!! Form::text('id_camp_publ',null,array('ng-model'=>'compra_venta.id_camp_publ','class'=>'form-control')) !!}
        </div>
    </div>
</div>
</div>
</div>
