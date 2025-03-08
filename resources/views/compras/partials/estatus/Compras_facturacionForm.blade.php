<div class="form-group">
 <ul class="nav nav-pills">
  <li role="presentation">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse3"><i class="material-icons">add</i>FACTURACION</a>
          </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body"> 

                  <div class="form-group has-success" >
                    <label class="control-label">DATOS FACTURACION</label>
                 </div><br>
<div class="row">
        <div class='col-md-8'> 
     <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> NOMBRE A FACTURAR</label>
            {!! Form::text('nombre_fiscal_facturacion',null,array('ng-model'=>'compra_venta.nombre_fiscal_facturacion','class'=>'form-control','size'=>'90','readonly'=>'readonly')) !!}
        </div>
        </div>
    <div class='col-md-4'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> RFC</label>
            {!! Form::text('rfc_facturacion',null,array('ng-model'=>'compra_venta.rfc_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
      </div>
</div>
<div class="row">
        <div class='col-md-8'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DIRECCION FACTURACION</label>
            {!! Form::text('direccion_facturacion',null,array('ng-model'=>'compra_venta.direccion_fiscal_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> COLONIA FACTURACION</label>
            {!! Form::text('colonia_facturacion',null,array('ng-model'=>'compra_venta.colonia_fiscal_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CP FACTURACION</label>
            {!! Form::text('cp_facturacion',null,array('ng-model'=>'compra_venta.cp_fiscal_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DELEGACION FACTURACION</label>
            {!! Form::text('delegacion_facturacion',null,array('ng-model'=>'compra_venta.delegacion_fiscal_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CIUDAD FACTURACION</label>
            {!! Form::text('ciudad_facturacion',null,array('ng-model'=>'compra_venta.ciudad_fiscal_facturacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
</div>

            </div>
            
      </div>
          <!--<div class="panel-footer">Panel Footer</div>-->
        </div>
      </div>
  </li>
</ul>
</div>