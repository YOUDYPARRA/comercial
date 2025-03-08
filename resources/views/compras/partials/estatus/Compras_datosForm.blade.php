<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS ORDEN <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> NUMERO COTIZACION</label>
            {!! Form::text('numero_cotizacion',null,array('ng-model'=>'compra_venta.numero_cotizacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> NUMERO CONTRATO</label>
            {!! Form::text('numero_contrato',null,array('ng-model'=>'compra_venta.numero_contrato','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-3' ng-show="verFecha_entrega">        
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> FECHA PROBABLE ENTREGA</label>
                <div class='input-group date'>
                {!! Form::text('fecha_entrega',null,array('required'=>'','class'=>'form-control','id'=>'fecha_entrega','placeholder'=>'Fecha probable entrega','ng-model'=>'compra_venta.fecha_entrega')) !!}
                </div>
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> FECHA PEDIDO</label>
                <div class='input-group date'>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span> 
                </span>
                    {!! Form::text('fecha',null,array('required'=>'','class'=>'form-control','id'=>'fecha_pedido','placeholder'=>'Fecha','ng-model'=>'compra_venta.fecha','readonly'=>'readonly')) !!}
                </div>
            </div>      
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>       
            <div class="form-group has-warning">
             <label class='control-label'><i class='material-icons'>lock</i> TIPO CAMBIO</label>
                {!! Form::text('tipo_cambio',null,array('ng-model'=>'compra_venta.tipo_cambio','class'=>'form-control','numbers-only','placeholder'=>'Solo Números')) !!}
               <!--{!! Form::hidden('estatus',null,array('ng-model'=>'estatus','class'=>'form-control')) !!}-->
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-warning">
                <label class='control-label'><i class='material-icons'>lock</i> DEPARTAMENTO</label>
                {!! Form::text('departamento',null,array('ng-model'=>'compra_venta.departamento','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-warning">
                <label class='control-label'><i class='material-icons'>lock</i> EJECUTIVO</label>
                {!! Form::text('vendedor',null,array('ng-model'=>'compra_venta.autor','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-warning">
            <!--<label class='control-label'><i class='material-icons'>edit</i> CONTACTO CLIENTE</label>-->
<!--         {{--   {!! Form::text('contacto_cliente',null,array('ng-model'=>'compra_venta.contacto_cliente','class'=>'form-control','readonly'=>'readonly')) !!}--}}-->
            </div>
        </div>
    </div>

    <div class="row">
        <div ng-show="verNombreClienteBusqueda">
        <div class='col-md-6' >
            <div class="form-group has-info">
                <!--<div class="dropdown">-->
            <label class='control-label'><i class='material-icons'>search</i> NOMBRE CLIENTE</label>
                
                {!! Form::text('nombre_cliente',null,array('ng-model'=>'compra_venta.nombre_fiscal','class'=>'form-control','ng-change'=>'tercerosLst(compra_venta.nombre_fiscal)')) !!}
                </div>
        </div>
        <div class='col-md-6' >
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>done</i></label>
                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Selecciona una opción: <span class="caret"></span><span class="badge"> <%proovedores.length%></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li ng-repeat="tercero in proovedores" role="presentation">
                            <!--<a role="menuitem" ng-click="selectTercero(tercero)"><% tercero.value | uppercase %> = <% tercero.bpartner_name | uppercase %> </a>         -->
                        <span role="menuitem" class="badge" ng-click="selectTercero(tercero)"><% tercero.value%> < - - > <% tercero.bpartner_name%> </span>         
                        </li>
                    </ul>
                </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4' ng-show="verNombreCliente">   
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> NOMBRE CLIENTE</label>
                {!! Form::text('nombre_cliente',null,array('ng-model'=>'compra_venta.nombre_fiscal','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-2'>   
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> RFC</label>
                {!! Form::text('rfc',null,array('ng-model'=>'compra_venta.rfc','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> CONTACTO</label>
            {!! Form::text('contacto_cliente',null,array('ng-model'=>'compra_venta.representante_tercero','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> CORREO</label>
            {!! Form::text('correo_cliente',null,array('ng-model'=>'compra_venta.correo_representante_tercero','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-12' ng-show="verNota_cliente">
            <div class="form-group has-warning">
               <label class='control-label'><i class='material-icons'>lock</i> OBSERVACIONES PARA EL CLIENTE</label>
               {!! Form::text('nota',null,array('ng-model'=>'compra_venta.nota','class'=>'form-control')) !!}
            </div>
        </div>
    </div>

</div>
        
       
<div class="panel-body"> 

    <div class="row">
        <div class='col-md-3'>       
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> CENTRO DE COSTO</label>
                <select  ng-model="compra_venta.centro_costo" ng-options="centros_costo.c_costcenter_id as centros_costo.costccenter_name for centros_costo in centros_costos" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> GERENTE</label>
                <select  ng-model="compra_venta.gerente" ng-options="usuario.c_bpartner_id as usuario.name for usuario in usuarios" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
                <label class="control-label"><i class="material-icons">edit</i>CAMPAÑA PUBLICITARIA</label>
                <select  ng-model="compra_venta.id_camp_publ" ng-options="publicidad.c_campaign_id as publicidad.name for publicidad in campanas_publicidad" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class="col-md-3" ng-show="ver_almacen">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> ALMACEN</label>
                <select  ng-model="compra_venta.id_warehouse" ng-options="almacen.m_warehouse_id as almacen.name for almacen in tipos_almacen.objetos | orderBy:'name'" class="form-control">
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">edit</i>TIPO TRANSACCION</label>
                <select  ng-model="compra_venta.id_doctype_target" ng-options="transaccion.c_doctype_id as transaccion.name for transaccion in tipos_transaccion" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> METODO PAGO</label>
                <select  ng-model="compra_venta.metodo_pago" ng-options="metodo.fin_paymentmethod_id as metodo.name for metodo in metodos_pago" class="form-control">
                  <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3' ng-show="ver_condicion_pago_marca"> 
            <div class="form-group has-info">
                <label class='control-label' ng-style="focus"><i class='material-icons'>edit</i> CONDICION PAGO MARCA <span class="badge"><%condiciones_marcas.length%></span></label>
                <select  ng-model="compra_venta.condicion_pago_marca" ng-options="marca_proveedor.marca_representada as marca_proveedor.marca_representada for marca_proveedor in marcas_proveedores | orderBy:'marcas_proveedores.marca_representada'" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> CONDICION PAGO TIEMPO</label>
                <select  ng-model="compra_venta.condicion_pago_tiempo" ng-options="tiempo_pago.c_paymentterm_id as tiempo_pago.name for tiempo_pago in tiempos_pago | orderBy:'name'" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> TIPO ENVIO: <span class="badge"><%tipos_envio.length%></span></label>
                <select  ng-model="compra_venta.tipo_envio" ng-options="option.m_shipper_id as option.name for option in metodos_envio | orderBy:'name'" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3' ng-show="ver_fecha_embarque">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>edit</i> FECHA EMBARQUE</label>
            <div class='input-group date'>
                {!! Form::text('fecha_embarque',null,array('required'=>'','class'=>'form-control','placeholder'=>'dd-mm-aaaa','ng-model'=>'compra_venta.fecha_embarque')) !!}
                <!--{!! Form::text('fecha_embarque',null,array('required'=>'','class'=>'form-control','id'=>'fecha_embarque','placeholder'=>'Fecha Embarque','ng-model'=>'compra.fecha_embarque')) !!}-->
            </div>
        </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> METODO FACTURACION</label>
                <select  ng-model="compra_venta.condicion_facturacion" ng-options="facturacion.valor as facturacion.descripcion for facturacion in condiciones_facturacion | orderBy:'name'" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'>edit</i> LISTA DE PRECIO</label>
                <select  ng-model="compra_venta.tipo_moneda" ng-options="precio.m_pricelist_id as precio.name for precio in tipos_moneda | orderBy:'name'" class="form-control">
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
    </div>
        
        
    </div>
</div>
