<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DIRECCION DE EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosTercero">
    <div class="row">
        <div class='col-md-6'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DIRECCION ENTREGA</label>
            {!! Form::text('nombre_cliente',null,array('ng-model'=>'objeto.nombre_cliente','readonly'=>'','class'=>'form-control','placeholder'=>'COMERCIAL','required')) !!}
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DIRECCION</label>
        {!! Form::text('calle',null,array('ng-model'=>'objeto.calle','class'=>'form-control','placeholder'=>'calle','required')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CP.</label>
        {!! Form::text('c_p',null,array('ng-model'=>'objeto.c_p','class'=>'form-control','placeholder'=>'c.p.','required')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>COLONIA</label>
        {!! Form::text('colonia',null,array('ng-model'=>'objeto.colonia','class'=>'form-control','placeholder'=>'colonia','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CIUDAD</label>
        {!! Form::text('ciudad',null,array('ng-model'=>'objeto.ciudad','class'=>'form-control','placeholder'=>'ciudad','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> ESTADO</label>
        {!! Form::text('estado',null,array('ng-model'=>'objeto.estado','class'=>'form-control','placeholder'=>'estado','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> PAIS</label>
        {!! Form::text('pais',null,array('ng-model'=>'objeto.pais','class'=>'form-control','placeholder'=>'pais','required')) !!}
            </div>
        </div>
    </div>
    </fieldset>
</div>

</div>