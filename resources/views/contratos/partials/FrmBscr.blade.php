<div class="container">
  <div class="row">

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('filtro.folio_contrato',null,['ng-model'=>'filtro.folio_contrato','class'=>'form-group','placeholder'=>'CONTRATO'])!!}
        </div>    
  	</div>
    <div class="col-md-3">
        <div class="form-group has-info">
          <button type="submit" class="btn btn-info btn-lg" ng-click='bscContrato()' ><i class="material-icons">search</i>BUSCAR</button>
        </div>
    </div>

  </div>{{--fin row--}}
</div>{{--fin container--}}