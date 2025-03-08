<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> CONDICIONES <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
      <div class="row">                                       {{--INICIO ROW CONTRATO--}}
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CONTRATO INTERNO<h6></h6></label>
            {!! Form::text('folio_contrato',null,['ng-model'=>'objeto.folio_contrato','class'=>'form-control']) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CONTRATO CLIENTE<h6></h6></label>
            {!! Form::text('instituto',null,['ng-blur'=>'filtroContrato()','ng-model'=>'objeto.instituto','class'=>'form-control']) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.nombre_responsable.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>ATENCION A</label>
            {!! Form::text('nombre_responsable',null,['ng-model'=>'objeto.nombre_responsable','class'=>'form-control','placeholder'=>'NOMBRE','required']) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.usuario1.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>RESPONSABLE</label>
            <select name="usuario1" ng-model="objeto.autor" class="form-control" required="">
              <option value="">Elegir. . .</option>
              <option ng-repeat="user in usuarios| orderBy : 'name'" value="<%user.name%>"><%user.name%></option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.vigencia.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>FECHA DE VIGENCIA</label>
            <md-datepicker ng-model="vig" md-placeholder="Selecciona la fecha =>" ng-change="select_vig(vig)"></md-datepicker>
            {!! Form::hidden('vigencia',null,['ng-model'=>'objeto.vigencia','class'=>'form-control','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required']) !!}
            <p class="text-warning"> <span ng-show="formPrestamo.vigencia.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.fecha_atencion.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>FECHA DE ENTREGA</label>
            <md-datepicker ng-model="fec_ent" md-placeholder="Selecciona la fecha =>" ng-change="select_fec_ent(fec_ent)"></md-datepicker>
            {!! Form::hidden('fecha_atencion',null,['ng-model'=>'objeto.fecha_atencion','class'=>'form-control','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required']) !!}
            <p class="text-warning"> <span ng-show="formPrestamo.fecha_atencion.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.hora_atencion.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>HORA ENTREGA</label>
            {!! Form::text('hora_atencion',null,array('ng-model'=>'objeto.hora_atencion','class'=>'form-control','placeholder'=>'HORA ENTREGA','required')) !!}
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formPrestamo.autor.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i>LUGAR ENTREGA</label>
            {!! Form::text('nota_cliente',null,array('ng-model'=>'objeto.nota_cliente','class'=>'form-control','placeholder'=>'LUGAR ENTREGA','required')) !!}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>OBSERVACIONES</label>
            {!! Form::text('nota',null,array('ng-model'=>'objeto.nota','class'=>'form-control')) !!}
          </div>
        </div>
      </div>
    </div><!-- FIN BODY -->
  </div>
  