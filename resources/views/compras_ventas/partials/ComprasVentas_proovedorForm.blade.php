<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS <%tercero%></div>
    <div class="panel-body"> 
        <fieldset ng-disabled="esc_p4">
            <div class='col-md-6'> 
  	            <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.nombre_proovedores.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.nombre_proovedores.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.nombre_proovedores.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'>search</i> BUSCAR NOMBRE</label>
                    {!! Form::text('nombre_proovedores',null,array('class'=>'form-control',"ng-model"=>"compra_venta.nombre_tercero","ng-change"=>"tercerosLst(compra_venta.nombre_tercero,organizacion,'*','Y')","placeholder"=>"Nombre proveedor")) !!}
                    {!! Form::hidden('p_delivery_location_id',null,array('class'=>'form-control',"ng-model"=>"compra_venta.p_delivery_location_id","placeholder"=>"Nombre",'ng-disabled'=>'nombre_proovedores','readonly')) !!}
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'>check</i> <span class="badge"><%proovedores.length%></span></label>
                    <select name="nombre_tercero" ng-model="tipo" class="form-control" ng-change="selectProovedor(tipo)" >
                        <option value="">Elige una opción</option>
                        <option ng-repeat="option in proovedores" value="<%option%>"><% option.value | uppercase %> => <%option.bpartner_name%></option>
                    </select>
                </div>    
            </div>
            <div class="row">
            <div class='col-md-3'>     
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.direccion_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.direccion_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.direccion_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> DIRECCION</label>
                    {!! Form::text('direccion_tercero',null,['ng-model'=>'compra_venta.direccion_tercero','class'=>'form-control','readonly'=>'true','required'=>'']) !!}
                </div>
            </div>
            <div class='col-md-3'>      
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.cp_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.cp_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.cp_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> CODIGO POSTAL</label>
                    {!! Form::text('cp_tercero',null,['ng-model'=>'compra_venta.cp_tercero','class'=>'form-control','required']) !!}
                </div>
            </div>        
            <div class='col-md-3'>  
                <div class="form-group has-info"> 
                    <span class="badge badge-warning" ng-show="formCompra.colonia_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.colonia_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.colonia_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> COLONIA</label>
                    {!! Form::text('colonia_tercero',null,['ng-model'=>'compra_venta.colonia_tercero','class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class='col-md-3'>  
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.ciudad_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.ciudad_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.ciudad_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> CIUDAD </label>
                    {!! Form::text('ciudad_tercero',null,['ng-model'=>'compra_venta.ciudad_tercero','class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class='col-md-3'>          
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.estado_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.estado_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.estado_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> ESTADO </label>
                    {!! Form::text('estado_tercero',null,['ng-model'=>'compra_venta.estado_tercero','class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class='col-md-3'>    
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formCompra.pais_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formSolicitud.pais_tercero.$error.required">*</span>
                    <span class="badge badge-warning" ng-show="formVenta.pais_tercero.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> PAIS </label>
                    {!! Form::text('pais_tercero',null,['ng-model'=>'compra_venta.pais_tercero','class'=>'form-control','readonly'=>'true','required']) !!}
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formCompra.tipo_moneda.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formSolicitud.tipo_moneda.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formVenta.tipo_moneda.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> TIPOS DE MONEDA</label>
                <select name="tipo_moneda" ng-model="compra_venta.tipo_moneda" ng-options="precio.m_pricelist_id as precio.name for precio in tipos_moneda | orderBy:'name'" class="form-control" ng-change="setMoneda(compra_venta.tipo_moneda)" required>
                    <option value="">Elegir. . .</option>
                </select>

            </div>
        </div>
        <div class='col-md-3' ng-if="ver_form_compra">
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.tipo_envio.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formSolicitud.tipo_envio.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> TIPO ENVIO: <span class="badge"><%tipos_envio.length%></span></label>
                <select name="tipo_envio" ng-model="compra_venta.tipo_envio" ng-options="option.m_shipper_id as option.name for option in metodos_envio | orderBy:'name'" class="form-control" required ng-change="getTipoEnvioName(compra_venta.tipo_envio,'*')">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_form_compra">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formCompra.fecha_embarque.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formSolicitud.fecha_embarque.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> FECHA EMBARQUE</label>
                <div class='input-group date'>
                <md-datepicker ng-model="fecha_embarque" md-placeholder="Selecciona la fecha =>" ng-change="selectEmbarque(fecha_embarque)"></md-datepicker>
                    {!! Form::hidden('fecha_embarque',null,array('required'=>'','ng-model'=>'compra_venta.fecha_embarque','class'=>'form-control','ng-change'=>'selectFecha()','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(compra_venta.fecha_embarque);','placeholder'=>'00-00-0000')) !!}
                    <span ng-show="formCompra.fecha_embarque.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                    <span ng-show="formSolicitud.fecha_embarque.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formCompra.id_warehouse.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formSolicitud.id_warehouse.$error.required">*</span>
                <span class="badge badge-warning" ng-show="formVenta.id_warehouse.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> ALMACEN</label>
                <select name="id_warehouse" ng-model="compra_venta.id_warehouse" ng-options="almacen.m_warehouse_id as almacen.name for almacen in tipos_almacen.objetos | orderBy:'name'" class="form-control" required>
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        
            @include('compras_ventas.partials.metodos_pago_tercero')
            <div class='col-md-3' ng-if="ver_form_compra"> 
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'></i>SR/AUTORIZACIÓN PROVEEDOR</label>
                    {!! Form::text('numero_orden',null,['class'=>'form-control','ng-model'=>'compra_venta.sr','placeholder'=>'SR']) !!}
                </div>
            </div>
        </div>
        </fieldset>
    </div> <!-- FIN BODY -->
</div>