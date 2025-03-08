<div class="row" ng-controller="reporteCtrl">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Buscar Fiscal </button>    
<!--INICIO Modal-->
    @include('partials.modals.tercerosDirecciones')
    <!--FIN Modal-->
    <div class="row" ng-init="id='{{$id}}'">
        <div class="col-md-4">
        {!! Form::text('telefonos',null,array('ng-model'=>'objeto.telefonos','class'=>'form-control','placeholder'=>'telefonos')) !!}
        {!! Form::text('correos',null,array('ng-model'=>'objeto.correos','class'=>'form-control','placeholder'=>'correos')) !!}
        {!! Form::text('fax',null,array('ng-model'=>'objeto.fax','class'=>'form-control','placeholder'=>'fax')) !!}
        {!! Form::text('celular',null,array('ng-model'=>'objeto.celular','class'=>'form-control','placeholder'=>'celular')) !!}
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i> REPORTO</label>
            {!! Form::text('nombre_responsable',null,array('ng-model'=>'objeto.nombre_responsable','class'=>'form-control')) !!}
        </div>
          
        </div>
        <div class="col-md-4">
        {!! Form::text('nombre_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.nombre_fiscal','class'=>'form-control','placeholder'=>'RAZON FISCAL')) !!}
        {!! Form::text('calle_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.calle_fiscal','class'=>'form-control','placeholder'=>'calle')) !!}
        {!! Form::text('numero_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.numero_fiscal','class'=>'form-control','placeholder'=>'numero')) !!}
        {!! Form::text('rfc',null,array('readonly'=>'readonly','ng-model'=>'objeto.rfc','class'=>'form-control','placeholder'=>'rfc')) !!}
        {!! Form::text('colonia_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.colonia_fiscal','class'=>'form-control','placeholder'=>'colonia')) !!}
        {!! Form::text('c_p_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.c_p_fiscal','class'=>'form-control','placeholder'=>'c.p.')) !!}
        {!! Form::text('ciudad_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.ciudad_fiscal','class'=>'form-control','placeholder'=>'ciudad')) !!}
        {!! Form::text('estado_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.estado_fiscal','class'=>'form-control','placeholder'=>'estado')) !!}
        {!! Form::text('pais_fiscal',null,array('readonly'=>'readonly','ng-model'=>'objeto.pais_fiscal','class'=>'form-control','placeholder'=>'pais')) !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('nombre_cliente',null,array('ng-model'=>'objeto.nombre_cliente','class'=>'form-control','placeholder'=>'COMERCIAL')) !!}
        {!! Form::text('calle',null,array('ng-model'=>'objeto.calle','class'=>'form-control','placeholder'=>'calle')) !!}
        {!! Form::text('numero',null,array('ng-model'=>'objeto.numero','class'=>'form-control','placeholder'=>'numero')) !!}
        {!! Form::text('colonia',null,array('ng-model'=>'objeto.colonia','class'=>'form-control','placeholder'=>'colonia')) !!}
        {!! Form::text('c_p',null,array('ng-model'=>'objeto.c_p','class'=>'form-control','placeholder'=>'c.p.')) !!}
        {!! Form::text('ciudad',null,array('ng-model'=>'objeto.ciudad','class'=>'form-control','placeholder'=>'ciudad')) !!}
        {!! Form::text('estado',null,array('ng-model'=>'objeto.estado','class'=>'form-control','placeholder'=>'estado')) !!}
        {!! Form::text('pais',null,array('ng-model'=>'objeto.pais','class'=>'form-control','placeholder'=>'pais')) !!}
        </div>
      
    </div>


    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        
        <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> EQUIPOS</label>
                <select  ng-change="filtroMarca()" ng-model="objeto.equipo" ng-options="equipo.nombre as equipo.nombre for equipo in filtro.producto.productos" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
        </div>
        <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> MARCAS</label>
                <select  ng-change="filtroModelo()" ng-model="objeto.marca" ng-options="marca.marca as marca.marca for marca in filtro.marcas" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
        </div>
        <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> MODELOS</label>
                <select  ng-model="objeto.modelo" ng-options="modelo.modelo as modelo.modelo for modelo in filtro.modelos" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
        </div>
        <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> SERIE</label>
                {!! Form::text('serie',null,array('ng-model'=>'objeto.serie','class'=>'form-control','placeholder'=>'serie')) !!}
        </div>
    
    </div>
      <div class="col-md-4">
        
        
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> OBSERVACION</label>
                  {!! Form::text('nota_cliente',null,array('ng-model'=>'objeto.nota_cliente','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> ORGANIZACION</label>
                  {!! Form::text('organizacion',null,array('ng-model'=>'objeto.organizacion','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> ORGANIZACION</label>
                  {!! Form::text('modificable',null,array('ng-model'=>'objeto.modificable','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> c_bpartner_id</label>
                  {!! Form::text('c_bpartner_id',null,array('ng-model'=>'objeto.c_bpartner_id','class'=>'form-control')) !!}
        </div>

      </div>
      <div class="col-md-4">
            <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> c_bpartner_location</label>
                  {!! Form::text('c_bpartner_location',null,array('ng-model'=>'objeto.c_bpartner_location','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i>B.E. ESTATUS</label>
                  {!! Form::text('estatus',null,array('ng-model'=>'objeto.estatus','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> B.E. FECHA</label>
                  {!! Form::text('fecha_captura',null,array('ng-model'=>'objeto.fecha_captura','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> PROGRAMACION</label>
                  {!! Form::text('fecha_inicio',null,array('ng-model'=>'objeto.fecha_inicio','class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
                  <label class='control-label'><i class='material-icons'>edit</i> PROGRAMACION</label>
                  {!! Form::text('fecha_fin',null,array('ng-model'=>'objeto.fecha_fin','class'=>'form-control')) !!}
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-4">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>B.E. SUCURSAL</label>
                      {!! Form::text('sucursal',null,array('ng-model'=>'objeto.sucursal','class'=>'form-control')) !!}
            </div>
            <div class="form-group has-info">
                      <label class='control-label'><i class='material-icons'>edit</i>B.E. AUTOR</label>
                      {!! Form::text('autor',null,array('ng-model'=>'objeto.autor','class'=>'form-control')) !!}
            </div>
            <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'>edit</i>FECHA ATENCION</label>
                            {!! Form::text('fecha_atencion',null,array('ng-model'=>'objeto.fecha_atencion','class'=>'form-control')) !!}
            </div>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>B.E. hora ATENCION</label>
                {!! Form::text('hora_atencion',null,array('ng-model'=>'objeto.hora_atencion','class'=>'form-control')) !!}
            </div>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>RESUELTO</label>
                <select  ng-model="objeto.resuelto_por" ng-options="resolucion.nombre as resolucion.nombre for resolucion in resoluciones" class="form-control">
                       <option value="">Elegir.</option>
                </select>          
            </div>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i>COORDINACION</label>
                <select  ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control">
                       <option value="">Elegir.</option>
                </select>          
            </div>

      </div>
      <div class="col-md-4">

          <div class="form-group has-info">
          <label class='control-label'><i class='material-icons'>edit</i>B.E. CLASE</label>
          {!! Form::text('clase','R',array('ng-model'=>'objeto.clase','class'=>'form-control')) !!}
          </div>
          <div class="form-group has-info">
              <label class='control-label'><i class='material-icons'>edit</i>B.E. INSTITUTO</label>
              {!! Form::text('instituto',null,array('ng-model'=>'objeto.instituto','class'=>'form-control')) !!}
          </div>
          <div class="form-group has-info">
              <label class='control-label'><i class='material-icons'>edit</i>B.E.VIGENCIA</label>
              {!! Form::text('vigencia',null,array('ng-model'=>'objeto.vigencia','class'=>'form-control')) !!}
          </div>

      </div>
      <div class="col-md-4">
        <button type="button" ng-click='guardar()' class="btn btn-primary">Guardar</button>
        <span><%resul.grd%></span>
      </div>
      <div class="col-md-4"></div>
    </div>
    
      
  </div>