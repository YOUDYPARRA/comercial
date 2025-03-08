<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> COMPONENTES EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div class="row">
        <div class='col-md-12'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>ACCESORIOS </label>
    {!! Form::text('accesorios',null,array('ng-model'=>'objeto.accesorios','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-12'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>TRANSDUCTORES </label>
    {!! Form::text('transductores',null,array('ng-model'=>'objeto.transductores','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-12'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>CABLES</label>
    {!! Form::text('cables',null,array('ng-model'=>'objeto.cables','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-12'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>EMPAQUE</label>
    {!! Form::text('empaques',null,array('ng-model'=>'objeto.empaques','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-12'>        
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i>OTROS</label>
    {!! Form::text('otros',null,array('ng-model'=>'objeto.otros','class'=>'form-control')) !!}
            </div>
        </div>
    </div>

    </div>
</div>
