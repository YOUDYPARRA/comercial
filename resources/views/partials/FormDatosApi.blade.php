<div class="panel-body"> 

    <div class="row">
        <div class='col-md-3'>       
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> CENTRO DE COSTO</label>
                <select name="centro_costo" ng-model="objeto.centro_costo" ng-options="centros_costo.c_costcenter_id as centros_costo.costccenter_name for centros_costo in centros_costos" class="form-control" required>
                     <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.centro_costo.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_gerente">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> GERENTE</label>
                <select name="gerente" ng-model="objeto.gerente" ng-options="usuario.ad_user_id as usuario.name for usuario in usuarios" class="form-control" required>
                     <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.gerente.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
                <label class="control-label"><i class="material-icons">edit</i>CAMPAÑA PUBLICITARIA</label>
                <select name="id_camp_publ" ng-model="objeto.id_camp_publ" ng-options="publicidad.c_campaign_id as publicidad.name for publicidad in campanas_publicidad" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.id_camp_publ.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3" ng-if="ver_almacen">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> ALMACEN</label>
                <select name="id_warehouse" ng-model="objeto.id_warehouse" ng-options="almacen.m_warehouse_id as almacen.name for almacen in tipos_almacen.objetos | orderBy:'name'" class="form-control" required>
                     <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.id_warehouse.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">edit</i>TIPO TRANSACCION</label>
                <select name="id_doctype_target" ng-model="objeto.id_doctype_target" ng-options="transaccion.c_doctype_id as transaccion.name for transaccion in tipos_transaccion" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.id_doctype_target.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> METODO PAGO</label>
                <select name="fin_paymentmethod_id" ng-model="objeto.metodo_pago" ng-options="metodo.fin_paymentmethod_id as metodo.name for metodo in metodos_pago" class="form-control" required>
                  <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.fin_paymentmethod_id.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_condicion_pago_marca"> 
            <div class="form-group has-info">
                <label class='control-label' ng-style="focus"><i class='material-icons'>edit</i> CONDICION PAGO MARCA <span class="badge"><%condiciones_marcas.length%></span></label>
                <select name="condicion_pago_marca" ng-model="objeto.condicion_pago_marca" ng-options="marca_proveedor.marca_representada as marca_proveedor.marca_representada for marca_proveedor in marcas_proveedores | orderBy:'marcas_proveedores.marca_representada'" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.condicion_pago_marca.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> CONDICION PAGO TIEMPO</label>
                <select name="condicion_pago_tiempo" ng-model="objeto.condicion_pago_tiempo" ng-options="tiempo_pago.c_paymentterm_id as tiempo_pago.name for tiempo_pago in tiempos_pago | orderBy:'name'" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.condicion_pago_tiempo.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> TIPO ENVIO: <span class="badge"><%tipos_envio.length%></span></label>
                <select name="tipo_envio" ng-model="objeto.tipo_envio" ng-options="option.m_shipper_id as option.name for option in metodos_envio | orderBy:'name'" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.tipo_envio.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_fecha_embarque">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i> FECHA EMBARQUE</label>
            <div class='input-group date'>
                {!! Form::text('fecha_embarque',null,array('required'=>'','ng-model'=>'objeto.fecha_embarque','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-click'=>'id_embarque = false')) !!}
                <span ng-show="formPrestamo.fecha_embarque.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                <p class="text-warning" ng-show="id_embarque"><i class="material-icons">warning</i></p>
            </div>
        </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> METODO FACTURACION</label>
                <select name="condicion_facturacion" ng-model="objeto.condicion_facturacion" ng-options="facturacion.valor as facturacion.descripcion for facturacion in condiciones_facturacion | orderBy:'name'" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
                <div role="alert">
                    <span class="error" ng-show="formPrestamo.condicion_facturacion.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> LISTA MONEDA</label>
                <select name="tipo_moneda" ng-model="objeto.tipo_moneda" ng-options="precio.m_pricelist_id as precio.name for precio in tipos_moneda | orderBy:'name'" class="form-control" ng-click="id_precios = false" required>
                    <option value="">Elegir. . .</option>
                </select>
                <span class="error" ng-show="formPrestamo.tipo_moneda.$error.required"><i class="material-icons" title="¡ REQUERIDO !">warning</i>  </span>
                <p class="text-warning" ng-show="id_precio"><i class="material-icons">warning</i></p>
            </div>
        </div>
    </div>
        
        
    </div>