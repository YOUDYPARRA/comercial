<div class="row">
  <div class="col-md-2">
      <div class="form-group has-info">
          <div class="form-group">
              {!! Form::text('nombre',null,['ng-model'=>'filtro.nombre','class'=>'form-group','placeholder'=>'NOMBRE'])!!}
          </div>
      </div>
  </div>        
            
  <div class="col-md-2">
      <div class="form-group has-info">
    
        <button type="submit" class="btn btn-info btn-lg" ng-click='bscPlan()' ><i class="material-icons">search</i>BUSCAR</button>
      </div>
  </div>  
</div>
