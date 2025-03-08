<!-- -------------------------------------------------------------------- FISCAL DATOS  -->
<div class="panel panel-default" >                       <!-- ------------------------------------------ DATOS PRINCIPALES INICIO -->
    <div class="panel-heading">DATOS PRINCIPALES   <span ng-show="progress" class="badge badge-warning"> Cargando ...</span></div>
    <div class="panel-body">
<div class="row">
    <div class='col-md-4'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons" ng-click="delFiscal();">search</i>Buscar nombre fiscal</label>
            {!! Form::text('nombre_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.nombre_fiscal','ng-change'=>'tercerosLst()','placeholder'=>'Nombre fiscal']) !!}
        </div>
    </div>
    <div class='col-md-4'>        
        <div class="form-group has-info">
            <label class='control-label'><i class="material-icons" ng-click="delFiscal();">search</i>Filtrar dirección de servicio/entrega</label>
            {!! Form::text('name',null,['ng-model'=>'name','class'=>'form-control','placeholder'=>'Burcar nombre','ng-change'=>'buscarDireccion(name)']) !!}
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">event</i>Fecha vigencia</label>
            <div class='input-group date'>
                {!! Form::text('fecha_vigencia',null,['class'=>'form-control','id'=>'fecha_vigencia','ng-model'=>'cotizacion.fecha_vigencia']) !!}
            </div>
        </div>
    </div>
    <div class='col-md-2' ng-if="ver_gerente">  
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formCotizacion.usuario.$error.required">*</span>
            <label class="control-label"><i class="material-icons">people</i>Firma</label>
            <select name="usuario" ng-model="usuario" class="form-control" required="" ng-change="getGerente(usuario)">
                <option value="">ELIGE UNA OPCION</option>
                <option value="ENRIQUE CERVANTES MALFAVON">ENRIQUE CERVANTES MALFAVON</option>
                <option value="LIZBETH ORTIZ MAULEON">LIZBETH ORTIZ MAULEON</option><!--<option ng-repeat="ger in gerentes" value="<%ger.nombre%>"><%ger.nombre%></option>-->
            </select>
        </div>  
    </div>
</div>
<div class="row">
    <div class='col-md-4'>  
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formCotizacion.nombre_fiscal.$error.required">*</span>
            <label class="control-label"><i class="material-icons">people</i>Nombre fiscal Total: <span class="badge">  <%fiscales.length%></span></label>
            <select name="nombres_fiscales" ng-model="nombre_fiscal" class="form-control" ng-change="cambiaNombreFiscal(nombre_fiscal);" style="width:330px;" ng-disabled="habilitarPrecio">
                <option value="">Elige un nombre</option>
                <option ng-repeat="fiscal in fiscales" value="<%fiscal%>"><% fiscal.value | uppercase %> = <% fiscal.bpartner_name | uppercase %></option>
            </select>
        </div>  
    </div>  
    <div class='col-md-4'>  
        <div class="form-group has-info" >
        <span class="badge badge-warning" ng-show="formCotizacion.calle_fiscal.$error.required">*</span>
            <label class="control-label"><i class="material-icons" ng-click="deldFiscal()">people</i>Direccion fiscal Total: <span class="badge">  <%dFiscales.length%></span></label>
            <select name="direccion_fiscal" ng-model="direccion_fiscal" class="form-control" ng-change="cambiaDireccionFiscal(direccion_fiscal)"  style="width:330px;" ng-disabled="habilitarPrecio">
                    <option value="">Elige una dirección </option>
                    <option ng-repeat="dFiscal in dFiscales" value="<%dFiscal%>"><% dFiscal.address1 %></option>
            </select>
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group has-info" >
        <span class="badge badge-warning" ng-show="formCotizacion.rfc.$error.required">*</span>
            <label for="rfc" class="control-label"><i class="material-icons" ng-click="delRFCFiscal();">people</i>RFC</label>
            {!! Form::text('rfc','',['required'=>'','class'=>'form-control','ng-model'=>'cotizacion.rfc',"placeholder"=>'RFC','readonly'=>'true']) !!}
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons" ng-click="delFecha_entrega();">event</i>Fecha entrega</label>
            <div class='input-group date'>
                {!! Form::text('fecha_entrega',null,['class'=>'form-control','id'=>'fecha_entrega','ng-disabled'=>'habilitarFecha','size'=>'15','ng-model'=>'cotizacion.fecha_entrega']) !!}
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------  COMERCIAL DATOS -------------------------------------------------------------->
<div class="row">
    <div class="col-md-4">
        <div class="form-group has-info" >
        <span class="badge badge-warning" ng-show="formCotizacion.nombre_cliente.$error.required">*</span>
           <label class="control-label"><i class="material-icons" ng-click="delNFiscal()">supervisor_account </i>Nombre sucursal Total: <span class="badge"> <%dEnvio.length%></span></label>
                <select name="nombres_clientes" ng-model="nombre_cliente" class="form-control" ng-change="cambiaSucursalEnvio(nombre_cliente)" style="width:330px;" ng-disabled="habilitarPrecio">
                    <option value="">Elige una sucursal </option>
                    <option ng-repeat="sucursal in dEnvio | orderBy : 'name'" value="<%sucursal%>"><% sucursal.name %> // <% sucursal.city %> // <% sucursal.address2 %>  // <% sucursal.address1 %></option>
                </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-info" >
        <span class="badge badge-warning" ng-show="formCotizacion.calle_entrega.$error.required">*</span>
           <label class="control-label"><i class="material-icons" ng-click="delCalle();">supervisor_account</i>Direccion entrega</label>
           {!! Form::text('calle_entrega',null,['required'=>'','class'=>'form-control','ng-model'=>'cotizacion.calle_entrega','placeholder'=>'Dirección entrega']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info" >
        <span class="badge badge-warning" ng-show="formCotizacion.telefono.$error.required">*</span>
           <label for="telefono" class="control-label"><i class="material-icons" ng-click="delPhone()">phone</i>Telefono</label>   
            {!! Form::text('telefono',null,['required'=>'','class'=>'form-control','ng-model'=>'cotizacion.telefono','id'=>'telefono','placeholder'=>'Teléfono']) !!}
       </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info" >
           <label for="celular" class="control-label"><i class="material-icons" ng-click="delPhone2()">smartphone</i>Celular</label>
           {!! Form::text('celular',null,['class'=>'form-control','ng-model'=>'cotizacion.celular','placeholder'=>'Tel. Alternativo','size'=>'16']) !!}
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------- CONTACTOS DATOS -->
<div class="row" >
    <div class="col-md-3">
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formCotizacion.contacto.$error.required">*</span>
           <label class="control-label"><i class="material-icons" ng-click="delContacto()">perm_identity</i>Nombre del contacto Total: <span class="badge"> <%contactos.length%></span></label>
           <select name="contacto" ng-model="contacto" class="form-control" ng-change="cambiaContacto(contacto)" ng-disabled="habilitarPrecio">
                    <option value="">Elige un contacto</option>
                    <option ng-repeat="contacto in contactos" value="<%contacto.ad_user_id%>"><% contacto.firstname | uppercase%></option>
            </select>  
        </div>
</div>
<div class="col-md-3">
    <div class="form-group has-info">
        <span class="badge badge-warning" ng-show="formCotizacion.correo.$error.required">*</span>
       <label for="correo" class="control-label"><i class="material-icons" ng-click="delEmail()">mail</i>E-mail</label>
        {!! Form::text('correo',null,['class'=>'form-control','ng-model'=>'cotizacion.correo','placeholder'=>'Correo Electrónico']) !!}
    </div>
</div>
<div class="col-md-3">
<div class="form-group has-info">
    <span class="badge badge-warning" ng-show="formCotizacion.representante_legal.$error.required">*</span>
  <label for="apoderado" class="control-label"><i class="material-icons" ng-click="delRepresentante()">perm_identity</i>Representante</label>
      {!! Form::text('representante_legal',null,['class'=>'form-control','ng-model'=>'cotizacion.representante_legal','placeholder'=>'Representante']) !!}
    </div>
  </div>
  <div class='col-md-3'>  
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formCotizacion.iniciales_asignado.$error.required">*</span>
            <label class="control-label"><i class="material-icons">edit</i>Iniciales agente asignado</label>
            <select name="iniciales_asignado" ng-model="cotizacion.iniciales_asignado" class="form-control">
                    <option value="">Elige un agente</option>
                    <option ng-repeat="contacto in usuarios" value="<%contacto.iniciales%>"><% contacto.name%></option>
            </select>
        </div>
    </div>

</div>  <!-- row -->
<!-- ------------------------------------------------------------------------------------- -->
<div class="row">
    <div class='col-md-3'>  
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edith</i> No. Contrato <span class="badge badge-info"><%c_cccv.length%></span></label>
            <!--{!! Form::text('no_contrato',null,array('ng-model'=>'cotizacion.no_contrato','class'=>'form-control')) !!}-->
            <select name="no_contrato" ng-model="cotizacion.no_contrato" class="form-control">
                        <option value="">Selecciona un contrato</option>
                        <option ng-repeat="org in c_cccv"  value="<%org.folio_contrato%>"><% org.folio_contrato %> / <% org.folio_contrato_venta %> <% org.instituto %> </option>
            </select>
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-info" >
            <label class='control-label'><i class='material-icons'>edith</i> No. pedido cliente</label>
            {!! Form::text('no_pedido',null,['ng-model'=>'cotizacion.no_pedido','class'=>'form-control']) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-info" >
            <label class='control-label'><i class='material-icons'>edith</i> No. Reporte</label>
            {!! Form::text('reporte',null,['ng-model'=>'cotizacion.reporte','class'=>'form-control','readonly']) !!}
        </div>
    </div>
    <div class='col-md-3' ng-if="ver_procesar">  
        <div class="form-group has-warning" >
            <span class="badge badge-warning" ng-show="formCotizacion.procesar.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Procesar</label>
            <select name="procesar" class="form-control" ng-model="procesar" ng-change="setProcesar(procesar)" required="">
                <option value="">ELIGE UNA OPCION</option>
                <option value="COTIZACION">COTIZACION</option>
                <option value="VENTA">VENTA</option>
                <option value="COMPRA">COMPRA</option>
                <option value="VENTA Y COMPRA">VENTA Y COMPRA</option>
            </select>
        </div>  
    </div>
</div>
<!-- ------------------------------------------------------------------------------------- -->

<div class="row">
    <div class='col-md-3'>  
        <div class="form-group has-warning" >
            <label class="control-label">    <input type="radio" name="tipo_facturacion" ng-model="tipo_facturacion" value="PUE" ng-click="nofacturar(cotizacion.id_condicion_factura);condicion_factura(tipo_facturacion);metodo_pago(tipo_facturacion);condicion_tiempo_pago(tipo_facturacion)">    PUE  </label>
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-warning" >
            <label class="control-label">    <input type="radio" name="tipo_facturacion" ng-model="tipo_facturacion" value="PPD" ng-click="nofacturar(cotizacion.id_condicion_factura);condicion_factura(tipo_facturacion);metodo_pago(tipo_facturacion);condicion_tiempo_pago(tipo_facturacion)">    PPD  </label>
        </div>
    </div><!--
    <div class='col-md-3' ng-if="ver_procesar">  
        <div class="form-group has-warning" >
            <label class="control-label"><i class="material-icons"></i>Prestamos</label>
            <select name="prestamos" class="form-control" ng-model="prestamos" ng-change="setPrestamos(prestamos)" >
                <option value="">ELIGE UNA OPCION</option>
                <option value="p1">PRESTAMO 1</option>
                <option value="p2">PRESTAMO 2</option>
                <option value="p3">PRESTAMO 3</option>
                <option value="p4">PRESTAMO 4</option>
            </select>
            {!! Form::hidden('cotizacion','<%procesar%>',array('class'=>'form-control')) !!}
        </div>  
    </div>-->
    <div class='col-md-3' ng-if="ver_procesar">  
        <div class="form-group has-warning" >
            <label class='control-label'><i class='material-icons'></i> SR</label>
            {!! Form::text('sr',null,['ng-model'=>'cotizacion.sr','class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row" ng-if="tipo_fact">
    <div class='col-md-3' >
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons">edit</i>Condición facturación</label>
            <select name="id_condicion_factura" ng-model="cotizacion.id_condicion_factura" class="form-control" ng-click="nofacturar(cotizacion.id_condicion_factura)">
                    <option value="">Elige una opción</option>
                    <option ng-repeat="condicion in facturacion | orderBy:'descripcion'" value="<%condicion.valor%>"><% condicion.descripcion | uppercase%></option><!-- condiciones_facturacion -->
            </select>
        </div>
    </div>
    <div class='col-md-3' >  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons">edit</i>Forma de pago</label>
            <select name="metodo_pago" ng-model="cotizacion.metodo_pago" class="form-control">
                    <option value="">Elige una condicion de pago</option>
                    <option ng-repeat="metodo in pay | orderBy:'name'" value="<%metodo.fin_paymentmethod_id%>"><% metodo.name | uppercase %></option><!--metodos_pagos -->
            </select>
        </div>
    </div>
    <div class='col-md-3' >  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons">edit</i>Condición tiempo pago</label>
            <select name="id_condicion_pago_tiempo" ng-model="cotizacion.id_condicion_pago_tiempo" class="form-control">
                    <option value="">Elige una condicion tiempo pago</option>
                    <option ng-repeat="tiempos in time | orderBy:'name'" value="<%tiempos.c_paymentterm_id%>"><% tiempos.name | uppercase %></option> <!--tiempos_pago -->
            </select>
        </div>
            
    </div>
    <div class='col-md-3' ng-if="ver_procesar">        
        <div class="form-group has-info">
            <label class='control-label'><i class="material-icons">edit</i>SERIE</label>
            {!! Form::text('serie',null,['ng-model'=>'serie','class'=>'form-control','placeholder'=>'SERIE','ng-change'=>'setSerie(serie)']) !!}
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------- -->

<!-- <div class="form-group"> -->
<div>
 <ul class="nav nav-pills">
  <li role="presentation">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#datosCliente"><i class="material-icons">add</i>
                <span class="error" ng-show="formCotizacion.nombre_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.calle_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.colonia_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.codigo_postal_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.ciudad_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.estado_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.pais_fiscal.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.rfc.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.telefono.$error.required"><i class="material-icons">warning</i>  </span>
                <!-- ................................................... -->
                <span class="error" ng-show="formCotizacion.nombre_cliente.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.calle_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.colonia_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.codigo_postal_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.ciudad_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.estado_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.pais_entrega.$error.required"><i class="material-icons">warning</i>  </span>
                <span class="error" ng-show="formCotizacion.correo.$error.required"><i class="material-icons">warning</i>  </span>
            </a>
          </h4>
        </div>  <!-- fin div panel heading -->
        <div id="datosCliente" class="panel-collapse collapse">
            <div class="panel-body"> 
                            <label class="control-label">¿ ES UN CLIENTE ?</label>
                        <input type="checkbox" ng-model="habilitarOrganizacion"> 
                <div class="form-group has-success" >
                    <label class="control-label">DATOS FISCALES</label>
                </div>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">Nombre fiscal</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.nombre_fiscal.$error.required">*</span>
                            {!! Form::text('nombre_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.nombre_fiscal','placeholder'=>'Nombre fiscal','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">Dirección</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.calle_fiscal.$error.required">*</span>
                            {!! Form::text('calle_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.calle_fiscal','placeholder'=>'Dirección fiscal','required'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label">Colonia</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.colonia_fiscal.$error.required">*</span>
                            {!! Form::text('colonia_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.colonia_fiscal','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label">CP</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.codigo_postal_fiscal.$error.required">*</span>
                            {!! Form::text('codigo_postal_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.codigo_postal_fiscal','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label" >Ciudad</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.ciudad_fiscal.$error.required">*</span>
                            {!! Form::text('ciudad_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.ciudad_fiscal','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">Estado</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.estado_fiscal.$error.required">*</span>
                            {!! Form::text('estado_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.estado_fiscal','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">Pais</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.pais_fiscal.$error.required">*</span>
                            {!! Form::text('pais_fiscal',null,['class'=>'form-control','ng-model'=>'cotizacion.pais_fiscal','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">RFC</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.rfc.$error.required">*</span>
                            {!! Form::text('rfc',null,['class'=>'form-control','ng-model'=>'cotizacion.rfc','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label">TELEFONO</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.telefono.$error.required">*</span>
                            {!! Form::text('telefono',null,['class'=>'form-control','ng-model'=>'cotizacion.telefono','placeholder'=>'Fiscal','required'=>'']) !!}
                        </div>
                    </div>
                </div>
            </div> <!-- fin div panel-body -->
            <!-- -..................................................................... -->
            <div class="panel-body"> 
                <div class="form-group has-success" >
                    <label class="control-label">DATOS ENTREGA</label>
                </div>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="colonia_entrega">Sucursal</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.nombre_cliente.$error.required">*</span>
                            {!! Form::text('nombre_cliente',null,['class'=>'form-control','ng-model'=>'cotizacion.nombre_cliente','placeholder'=>'Nombre sucursal','required'=>'']) !!} 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="colonia_entrega">Dirección</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.calle_entrega.$error.required">*</span>
                            {!! Form::text('calle_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.calle_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label" for="colonia_entrega">Colonia</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.colonia_entrega.$error.required">*</span>
                            {!! Form::text('colonia_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.colonia_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label" for="codigo_postal_entrega">CP</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.codigo_postal_entrega.$error.required">*</span>
                            {!! Form::text('codigo_postal_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.codigo_postal_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-info">
                            <label class="control-label" for="ciudad_entrega">Ciudad</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.ciudad_entrega.$error.required">*</span>
                            {!! Form::text('ciudad_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.ciudad_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="estado_entrega">Estado</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.estado_entrega.$error.required">*</span>
                            {!! Form::text('estado_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.estado_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="pais_entrega">Pais</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.pais_entrega.$error.required">*</span>
                            {!! Form::text('pais_entrega',null,['class'=>'form-control','ng-model'=>'cotizacion.pais_entrega','placeholder'=>'Entrega','required'=>'']) !!}
                        </div>
                    </div>
                </div>
            </div> <!-- FIN PANEL-BODY -->
       <!-- .............................................. -->
            <div class="panel-body"> 
                <div class="form-group has-success" >
                    <label class="control-label">DATOS CONTACTO</label>
                </div>
                <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="colonia_entrega">Nombre de contacto</label>
                            {!! Form::text('contacto',null,['class'=>'form-control','ng-model'=>'cotizacion.contacto','placeholder'=>'Contactos']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-info">
                            <label class="control-label" for="colonia_entrega">Correo electronico</label>
                            <span class="badge badge-warning" ng-show="formCotizacion.correo.$error.required">*</span>
                            {!! Form::text('correo',null,['class'=>'form-control','ng-model'=>'cotizacion.correo','placeholder'=>'Correo Electrónico','required'=>'']) !!}
                        </div>
                    </div>
                </div>
            </div> <!--FIN PANEL BODY-->
        </div> <!--FIN PANEL COLLAPSE-->
    </div>  <!-- FIN DIV PANEL-DEFAULT -->
    </div>  <!-- FIN DIV PANEL-GROUP -->
  </li> <!-- LI PRESENTACION>-->
</ul> <!-- NAP PILLS>-->
<!--</div>  FORM GROUP>-->
</div>
</div><!-- PANEL BODY>-->
<div class="panel-footer" > 
               <!-- <button type="button" class="btn btn-warning btn-lg" ng-click="limpiar();"><i class="material-icons">blur_on</i> ¡¡ Limpiar !!</button>                             -->
</div>   
</div><!-- DIV PANEL DEFAULT>-->