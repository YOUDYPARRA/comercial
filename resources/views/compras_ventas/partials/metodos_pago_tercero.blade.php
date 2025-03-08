        <div class='col-md-3'>   
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.fin_paymentmethod_id.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.fin_paymentmethod_id.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formVenta.fin_paymentmethod_id.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> METODO PAGO</label>
                <select name="fin_paymentmethod_id" ng-model="compra_venta.metodo_pago" class="form-control" required="" ng-change="getMetodoPagoName(compra_venta.metodo_pago,'*')">
                    <option value="">Elegir</option>
                    <option ng-repeat="metodo_pay in metodos_pago | orderBy:'name'" ng-if="metodo_pay.name == 'EFECTIVO' || metodo_pay.name =='CHEQUE NOMINATIVO' || metodo_pay.name =='TARJETAS DE CREDITO' || metodo_pay.name =='TRANSFERENCIA ELECTRONICA DE FONDO' || metodo_pay.name =='POR DEFINIR'" value="<%metodo_pay.fin_paymentmethod_id%>"><% metodo_pay.name %></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.condicion_pago_tiempo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.condicion_pago_tiempo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formVenta.condicion_pago_tiempo.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> CONDICION PAGO</label>
               <select name="condicion_pago_tiempo" ng-model="compra_venta.condicion_pago_tiempo" class="form-control" required="" ng-change="getCondicionPagoName(compra_venta.condicion_pago_tiempo,'*')">
                    <option value="">Elegir</option>
                    <option ng-repeat="condicion_pay in tiempos_pago | orderBy:'name'" value="<%condicion_pay.c_paymentterm_id%>"><% condicion_pay.name %></option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formCompra.condicion_facturacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formSolicitud.condicion_facturacion.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formVenta.condicion_facturacion.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> METODO FACTURACION</label>
                <select name="condicion_facturacion" ng-model="compra_venta.condicion_facturacion" class="form-control" required="" ng-change="getCondicionFacturaName(compra_venta.condicion_facturacion,'*')">
                    <option value="">Elegir</option>
                    <option ng-repeat="condicion_fact in condiciones_facturacion | orderBy:'descripcion'" value="<%condicion_fact.valor%>"> <%condicion_fact.descripcion%></option>
                </select>
            </div>
        </div>
        
