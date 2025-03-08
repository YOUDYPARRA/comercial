<div class='form-group'>
  <div class="row">
    <div class="col-sm-3">

        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ID</label>
            {!! Form::text('id',null,array('ng-model'=>'id','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>

        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ETIQUETA</label>
            {!! Form::text('etiqueta',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    </div>
<hr>
    <div class="row">
    <div class="col-sm-3">

      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>nombre_icono</i> ORGANIZACION</label>
        {!! Form::text('org_name',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>nombre_icono</i> PUESTO</label>
        {!! Form::select('puesto',[''=>'Seleccione puesto:']+util::getPuestos(),null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>nombre_icono</i> AREA</label>
        {!! Form::select('area',[''=>'Seleccione área:']+util::getAreas(),null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>nombre_icono</i> DEPARTAMENTO</label>
        {!! Form::select('departamento',[''=>'Seleccione departamento:']+util::getDepartamentos(),null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>nombre_icono</i> CENTRO DE COSTO</label>
        {!! Form::select('lugar_centro_costo',[''=>'Seleccione lugar del centro de costo','CH'=>'CH','GDL'=>'GDL','MER'=>'MER','MTY'=>'MTY','MX'=>'MX'],null,['class'=>'text-info','class'=>'form-control']) !!}
        </div>

      </div>
    </div>
</div>
