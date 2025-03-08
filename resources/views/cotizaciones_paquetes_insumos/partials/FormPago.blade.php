<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">note_add</i> DATOS DE PAGO<span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class='panel-body'>
        <div class="row">
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <label class='control-label'>NO REPORTE</label>
                    {!! Form::text('reporte',null,array('ng-model'=>'objeto.reporte','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <label class='control-label'>NO CONTRATO</label>
                    {!! Form::text('contrato',null,array('ng-model'=>'objeto.contrato','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <label class='control-label'>NO PEDIDO CLIENTE</label>
                    {!! Form::text('no_pedido',null,array('ng-model'=>'objeto.no_pedido','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <span class="badge badge-warning" ng-show="formCotizacion.iniciales_asignado.$error.required">*</span>
                    <label class="control-label">INICIALES AGENTE ASIGNADO</label>
                    <select name="iniciales" ng-model="objeto.iniciales_asignado" class="form-control">
                            <option value="">Elige un agente</option>
                            <option ng-repeat="contacto in usuarios" value="<%contacto.iniciales%>"><% contacto.name%></option>
                    </select>
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <label class='control-label'>REPRESENTANTE</label>
                    {!! Form::text('representante',null,array('ng-model'=>'objeto.representante_legal','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info">
                    <label class="control-label">FECHA ENTREGA</label>
                    <div class='input-group date'>
                        {!! Form::text('fecha_entrega',null,array('class'=>'form-control','ng-model'=>'objeto.fecha_entrega')) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <!--<span class="badge badge-warning" ng-show="formC_CCV.garantia.$error.required">*</span>-->
                    <label class='control-label'><i class='material-icons'></i>GARANTIA</label>
                    <!--<select name="garantia" ng-model="objeto.garantia" class="form-control" required>-->
                    <select name="garantia" ng-model="objeto.garantia_tiempo" class="form-control" >
                        <option value="">Elige...</option>
                        <option ng-repeat="tiempo in garantias_contrato" value="<%tiempo.nombre%>"><% tiempo.nombre%> MESES</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <span class="badge badge-warning" ng-show="formCotizacion.condicion_factura.$error.required">*</span>
                    <label class="control-label">CONDICION FACTURACION</label>
                    <select name="condicion_factura" ng-model="objeto.id_condicion_factura" class="form-control">
                        <option value="">Elige una opción</option>
                        <option ng-repeat="condicion in condiciones_facturacion | orderBy:'descripcion'" value="<%condicion.valor%>"><% condicion.descripcion | uppercase %></option>
                    </select>
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <span class="badge badge-warning" ng-show="formCotizacion.condicion_pago.$error.required">*</span>
                    <label class="control-label">FORMA DE PAGO</label>
                    <select name="condicion_pago" ng-model="objeto.metodo_pago" class="form-control">
                        <option value="">Elige una condicion de pago</option>
                        <option ng-repeat="metodo in metodos_pagos | orderBy:'name'" value="<%metodo.fin_paymentmethod_id%>"><% metodo.name | uppercase %></option>
                    </select>
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info" >
                    <span class="badge badge-warning" ng-show="formCotizacion.condicion_pago_tiempo.$error.required">*</span>
                    <label class="control-label">CONDICION TIEMPO PAGO</label>
                    <select name="condicion_pago_tiempo" ng-model="objeto.id_condicion_pago_tiempo" class="form-control">
                        <option value="">Elige una condicion tiempo pago</option>
                        <option ng-repeat="tiempos in tiempos_pago | orderBy:'name'" value="<%tiempos.c_paymentterm_id%>"><% tiempos.name | uppercase %></option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <label class='control-label'>ENGANCHE: <span class="badge"><%anticipo_porcentaje | number:0%></span> %</label>
                    {!! Form::text('anticipo',null,array('ng-model'=>'objeto.anticipo','class'=>'form-control','placeholder'=>'$','ng-change'=>'anticipo(objeto.anticipo)')) !!}                
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'>CONTRA ENTREGA: <span class="badge"><%contraentrega_porcentaje | number:0%></span> %</label>
                {!! Form::text('contra',null,array('ng-model'=>'objeto.contraentrega','class'=>'form-control','placeholder'=>'$','ng-change'=>'contraentrega(objeto.contraentrega)','ng-blur'=>'contraentregaTotal()')) !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>FINANCIAMIENTO: <span class="badge"><%financiamiento_porcentaje | number:0%></span> %</label>
                {!! Form::text('financiamiento',null,array('ng-model'=>'objeto.financiamiento','class'=>'form-control','placeholder'=>'$','ng-change'=>'financiamientos(objeto.financiamiento)','ng-blur'=>'finaciamientoTotal()')) !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'>NO. PAGOS</label>
                {!! Form::text('mensualidades',null,array('ng-model'=>'objeto.mensualidades','class'=>'form-control','placeholder'=>'Ej. 1')) !!}
            </div>
          </div>
        
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'>TOTAL DE PAGARE: <span class="badge"><%pagare_porcentaje | number:0%></span> %</label>
                {!! Form::text('pagare',null,array('ng-model'=>'objeto.pagare','class'=>'form-control')) !!}
            </div>
          </div>
        </div>  <!-- ROW -->
      </div>    <!-- FIN BODY -->
    <!--<div class="panel-footer"> </div>-->
</div>