<div class="col-md-1">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>PRIORIDAD</label>
        <select name="prioridad" ng-model="objeto.prioridad" class="form-control" required="">
                    <option ng-repeat="pr in prioridades" value="<%pr.nombre%>"><% pr.nombre%></option>
            </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>TITULO/NOMBRE</label>
            {!! Form::text('nombre',null,['ng-model'=>"objeto.nombre",'class'=>'form-control','placeholder'=>'NOMBRE/TÍTULO']) !!}
    </div>
</div>
<div class="col-md-3">
    <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>MODULO</label>
            {!! Form::text('modulo',null,['ng-model'=>"objeto.modulo",'class'=>'form-control','placeholder'=>'MODULO/SISTEMA']) !!}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>ATENCION</label>
        <select name="departamento" ng-model="objeto.departamento" class="form-control" required="">
                    <option value="">Elige un agente</option>
                    <option ng-repeat="contacto in revisiones" value="<%contacto.nombre%>"><% contacto.nombre%></option>
            </select>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>ESTATUS</label>
            <select name="estatus" ng-model="objeto.estatus" class="form-control" required="">
                    <option value="">Elige ..</option>
                    <option ng-repeat="es in estados" value="<%es.nombre%>"><% es.nombre%></option>
            </select>
    </div>
</div>
