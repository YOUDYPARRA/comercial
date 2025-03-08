<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> CONDICIONES PAGO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 

<div class="row">
    <div class='col-md-3'>  
        <div class="form-group has-warning" >        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-warning" >
            <label class="control-label">    <input type="radio" ng-model="tipo_facturacion" value="PUE" ng-click="condicion_factura(tipo_facturacion);metodo_pago(tipo_facturacion);condicion_tiempo_pago(tipo_facturacion)">    PUE  </label>
        </div>
    </div>
    <div class='col-md-6'>  
        <div class="form-group has-warning" >
            <label class="control-label">    <input type="radio" ng-model="tipo_facturacion" value="PPD" ng-click="condicion_factura(tipo_facturacion);metodo_pago(tipo_facturacion);condicion_tiempo_pago(tipo_facturacion)">    PPD  </label>
        </div>
    </div>
</div>

<div class="row" >
    <div class='col-md-3' >
        <div class="form-group has-info" >
            <!--<span class="badge badge-warning" ng-show="id_factura">*</span>-->
            <span class="badge badge-warning" ng-show="formCotizacion.condicion_factura.$error.required">*</span>
            <label class="control-label"><i class="material-icons">edit</i>Condición facturación</label>
            <select name="condicion_factura" ng-model="objeto.condicion_factura" class="form-control" ng-change="condicionFacturaSeleccionado(condicion_factura)" >
                    <option value="">Elige una opción</option>
                    <option ng-repeat="condicion in facturacion | orderBy:'descripcion'" value="<%condicion.valor%>"><% condicion.descripcion | uppercase %></option><!-- condiciones_facturacion -->
            </select>
            
        </div>
    </div>
    <div class='col-md-3' >  
        <div class="form-group has-info" >
            <!--<span class="badge badge-warning" ng-show="id_pago">*</span>-->
            <span class="badge badge-warning" ng-show="formCotizacion.condicion_pago.$error.required">*</span>
            <label class="control-label"><i class="material-icons">edit</i>Forma de pago</label>
            <select name="condicion_pago" ng-model="objeto.metodo_pago" class="form-control" ng-change="metodo_pago_seleccionado(m_pago)">
                    <option value="">Elige una condicion de pago</option>
                    <option ng-repeat="metodo in pay | orderBy:'name'" value="<%metodo.fin_paymentmethod_id%>"><% metodo.name | uppercase %></option><!--metodos_pagos -->
            </select>

        </div>
    </div>
    <div class='col-md-3' >  
        <div class="form-group has-info" >
            <!--<span class="badge badge-warning" ng-show="id_tiempo">*</span>-->
            <span class="badge badge-warning" ng-show="formCotizacion.condicion_pago_tiempo.$error.required">*</span>
            <label class="control-label"><i class="material-icons">edit</i>Condición tiempo pago</label>
            <select name="condicion_pago_tiempo" ng-model="objeto.pago_tiempo" class="form-control" ng-change="condicion_tiempo_pago_seleccionado(pago_tiempo)">
                    <option value="">Elige una condicion tiempo pago</option>
                    <option ng-repeat="tiempos in time | orderBy:'name'" value="<%tiempos.c_paymentterm_id%>"><% tiempos.name | uppercase %></option> <!--tiempos_pago -->
            </select>
        </div>
            
    </div>
    
</div>
    
	
  </div>
  </div>