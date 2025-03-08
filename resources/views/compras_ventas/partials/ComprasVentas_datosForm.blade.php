<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS ORDEN <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <div ng-if="verTipoActualizacion">
        <div class="row">
            <div class='col-md-6'>       
                <div class="form-group has-warning">
                    <span class="badge badge-warning" ng-show="t_a">*</span>
                    <label class='control-label'><i class='material-icons'></i> TIPO ACTUALIZACION</label>
                    <select name="tipo_actualizacion" ng-model="tipo_actualizacion" class="form-control" ng-click="t_a = false" ng-change="bloquear(tipo_actualizacion)"required>
                        <option value="">Elige una opción</option>
                        <option value="actualizar">ACTUALIZAR</option>
                        <option value="version">CREA VERSION</option>
                    </select>
                </div>
            </div>
        </div><!-- FIN ROW -->
    </div>
<fieldset ng-disabled="esc_p1">
    <div class="row">
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> NUMERO COTIZACION</label>
            {!! Form::text('numero_cotizacion',null,array('ng-model'=>'compra_venta.numero_cotizacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> NUMERO CONTRATO</label>
            {!! Form::text('numero_contrato',null,array('ng-model'=>'compra_venta.numero_contrato','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formVenta.fecha_entrega.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCompra.fecha_entrega.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.fecha_entrega.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> FECHA PROBABLE ENTREGA</label>
                <md-datepicker ng-model="fecha_entrega" md-placeholder="Selecciona la fecha =>" ng-change="selectEntrega(fecha_entrega)"></md-datepicker>
                {!! Form::hidden('fecha_entrega',null,array('required'=>'','ng-model'=>'compra_venta.fecha_entrega','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-click'=>'id_entrega = false;','ng-blur'=>'validaFecha(compra_venta.fecha_entrega);')) !!}
                <span ng-show="formSolicitud.fecha_entrega.$error.pattern"><p class="text-danger">Formato incorrecto, Formato DD-MM-YYYY</p></span>
                <span ng-show="formCompra.fecha_entrega.$error.pattern"><p class="text-danger">Formato incorrecto, Formato DD-MM-YYYY</p></span>
                <span ng-show="formVenta.fecha_entrega.$error.pattern"><p class="text-danger">Formato incorrecto, Formato DD-MM-YYYY</p></span>
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> FECHA PEDIDO</label>
                <div class='input-group date'>
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span> 
                </span>
                    {!! Form::text('fecha',null,array('class'=>'form-control','id'=>'fecha_pedido','placeholder'=>'Fecha','ng-model'=>'compra_venta.fecha','readonly'=>'readonly')) !!}
                </div>
                 
            </div>      
        </div>
    </div>
    <div class="row">
        <div class='col-md-3'>       
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formSolicitud.tipo_cambio.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCompra.tipo_cambio.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formVenta.tipo_cambio.$error.required">*</span>
             <label class='control-label'><i class='material-icons'></i> TIPO CAMBIO</label>
                {!! Form::text('tipo_cambio',null,array('ng-model'=>'compra_venta.tipo_cambio','class'=>'form-control','placeholder'=>'Solo Números','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i> DEPARTAMENTO</label>
                {!! Form::text('departamento',null,array('ng-model'=>'compra_venta.departamento','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>  
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>AUTOR</label>
                {!! Form::text('vendedor',null,array('ng-model'=>'compra_venta.autor','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i> EJECUTIVO ASIGNADO</label>
                {!! Form::text('vendedor',null,array('ng-model'=>'compra_venta.atribuir','class'=>'form-control')) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div ng-if="verNombreClienteBusqueda">
        <div class='col-md-6' >
            <div class="form-group has-info">
                <!--<div class="dropdown">-->
                <span class="badge badge-warning" ng-show="formSolicitud.nombre_cliente.$error.required">*</span>
            <label class='control-label'><i class='material-icons'>search</i> NOMBRE CLIENTE</label>
                {!! Form::text('nombre_cliente',null,array('ng-model'=>'compra_venta.nombre_fiscal','class'=>'form-control','ng-change'=>'tercerosLst(compra_venta.nombre_fiscal,"*","Y","*")','required')) !!}
                </div>
        </div>
        <div class='col-md-6' >
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>done</i></label>
                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Selecciona una opción: <span class="caret"></span><span class="badge"> <%proovedores.length%></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li ng-repeat="tercero in proovedores" role="presentation">
                            <a role="menuitem" ng-click="selectTercero(tercero);"><% tercero.value | uppercase %> = <% tercero.bpartner_name | uppercase %> </a>        
                        <!--<span role="menuitem" class="badge" ng-click="selectTercero(tercero)"><% tercero.value%> < - - > <% tercero.bpartner_name%> </span>         -->
                        </li>
                    </ul>
                </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-3' ng-if="verNombreCliente">   
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> NOMBRE CLIENTE</label>
                {!! Form::text('nombre_cliente',null,array('ng-model'=>'compra_venta.nombre_fiscal','class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formVenta.rfc.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formCompra.rfc.$error.required">*</span>
            <label class='control-label'><i class='material-icons'></i> RFC</label>
                {!! Form::text('rfc',null,array('ng-model'=>'compra_venta.rfc','class'=>'form-control','required')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CONTACTO</label>
            {!! Form::text('contacto_cliente',null,array('ng-model'=>'compra_venta.representante_tercero','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>   
            <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CORREO</label>
            {!! Form::text('correo_cliente',null,array('ng-model'=>'compra_venta.correo_representante_tercero','class'=>'form-control')) !!}
            </div>
        </div>
    </div>
</fieldset>
</div><!--FIN ROW -->
        
       
<div class="panel-body"> 
<fieldset ng-disabled="esc_p2">
    <div class="row">
        <div class='col-md-3' ng-if="ver_form_compra">       
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.centro_costo.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.centro_costo.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> CENTRO DE COSTO</label>
                <select name="centro_costo" ng-model="compra_venta.centro_costo" ng-options="centros_costo.c_costcenter_id as centros_costo.costccenter_name for centros_costo in centros_costos" class="form-control" required>
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_form_compra">       
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.gerente.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.gerente.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> GERENTE</label>
                <select name="gerente" ng-model="compra_venta.gerente" ng-options="usuario.ad_user_id as usuario.name for usuario in usuarios" class="form-control" required ng-change="getGerenteName(compra_venta.ad_org_id,compra_venta.gerente)">
                     <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formCompra.id_doctype_target.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formSolicitud.id_doctype_target.$error.required">*</span>
            <span class="badge badge-warning" ng-show="formVenta.id_doctype_target.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>TIPO TRANSACCION</label>
                <select name="id_doctype_target" ng-model="compra_venta.id_doctype_target" ng-options="transaccion.c_doctype_id as transaccion.name for transaccion in tipos_transaccion" class="form-control" required>
                    <option value="">Elegir. . .</option>
                </select>
            </div>
        </div>
        <div class="col-md-3" ng-if="ver_form_venta">
           <div class="form-group has-info">
               <span class="badge badge-warning" ng-show="formVenta.stock.$error.required">*</span>
               <label class='control-label'><i class='material-icons'></i> CONTAR PARA STOCK</label>
               <select name="stock" ng-model="compra_venta.stock" class="form-control" required="">
                   <option value="SI">SI</option>
                   <option value="NO">NO</option>
               </select>
           </div>
       </div>
        <div class='col-md-3' ng-if="ver_form_cotizacion"> 
            <div class="form-group has-info" >
                <label class='control-label'><i class='material-icons'></i> EQUIPO</label>
                {!! Form::text('equipo',null,array('ng-model'=>'compra_venta.equipo','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3' ng-if="ver_form_cotizacion"> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i> NO. SERIE</label>
                {!! Form::text('numero_serie',null,array('ng-model'=>'compra_venta.numero_serie','class'=>'form-control')) !!}
            </div>
        </div>
    </div>
        
        </fieldset>
    </div><!-- FIN BODY -->

</div>
