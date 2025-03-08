<div role="tabpanel" class="tab-pane fade in" id="htab4">
                    <div class="panel panel-info">
                        <!--<div class='panel-heading'><i class="material-icons">assessment</i></div>-->
                        <div class='panel-body'>

                        <!-- ------------------------------------------------------------------------ --------------------------------------- SUBMENU INICIO -->
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
                            <li class="active"><a href="#hsptab1" data-toggle="tab"><i class="material-icons">assessment</i> Costo de materiales</a></li>
                            <li><a href="#hsptab2" data-toggle="tab"><i class="material-icons"></i> Costo de ventas</a></li>
                            <li><a href="#hsptab3" data-toggle="tab"><i class="material-icons"></i> Costos de proyecto</a></li>
                            <!--<li><a href="#hstab4" data-toggle="tab"><i class="material-icons"></i></a></a></li>-->
                            <!--<li><a href="#htab5" data-toggle="tab"><i class="material-icons"></i> PRECALCULOS</a></li>-->
                        </ul>
            <div class="tab-content">
                <!--<div role="tabpanel" class="tab-pane fade in active" id="hstab1">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Equipo</div>
                        <div class='panel-body'>
                            <h3>submenu 1</h3>
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 1 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hsptab1">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Costo de materiales</div>
                        <div class='panel-body'>

    <!--<div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> NÚMERO DE PROYECTO</label>
            {!! Form::text('numero_proyecto',null,array('ng-model'=>'precalculos.numero_proyecto','class'=>'form-control')) !!}
    </div>-->
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Descripción de los elementos</b> </h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Equipo</b></h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Servicio Técnico</b></h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Total</b></h4></label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>%</h4></b></label>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Importe</b></h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>%</b></h4></label>
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>Importe</b></h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><h4><b>%</b></h4></label>
            </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i><h4><b>Importe</b></h4></label>
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i><h4><b>VENTA TOTAL</b> </h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('venta_total_t_i',null,array('ng-model'=>'precalculos.venta_total_t_i','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Valor de venta</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_e_i',null,array('ng-change'=>'calVentaTotalTI()','ng-model'=>'precalculos.valor_venta_e_i','class'=>'form-control','style'=>'text-align:center','numbers-only','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'></i></label>
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Valor de venta servicio</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('valor_venta_servicio_e_p',null,array('ng-model'=>'precalculos.valor_venta_servicio_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('valor_venta_servicio_e_i',null,array('ng-change'=>'calValorVentaServicioTI()','ng-model'=>'precalculos.valor_venta_servicio_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('valor_venta_servicio_s_p',null,array('ng-model'=>'precalculos.valor_venta_servicio_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_servicio_s_i',null,array('ng-change'=>'calVentaTotalTI();calValorVentaServicioSP();calValorVentaServicioTI();','ng-model'=>'precalculos.valor_venta_servicio_s_i','class'=>'form-control','style'=>'text-align:center','numbers-only','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('valor_venta_servicio_t_p',null,array('ng-model'=>'precalculos.valor_venta_servicio_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_servicio_t_i',null,array('ng-model'=>'precalculos.valor_venta_servicio_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo de ventas producto</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_producto_e_p',null,array('ng-model'=>'precalculos.costo_venta_producto_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_producto_e_i',null,array('ng-change'=>'calCostoVentaProductoEP();calCostoVentaProductoTI();','ng-model'=>'precalculos.costo_venta_producto_e_i','class'=>'form-control','style'=>'text-align:center','numbers-only','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('costo_venta_producto_s_p',null,array('ng-model'=>'precalculos.costo_venta_producto_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('costo_venta_producto_s_i',null,array('ng-change'=>'calCostoVentaProductoSP();calCostoVentaProductoTI();','ng-model'=>'precalculos.costo_venta_producto_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_producto_t_p',null,array('ng-model'=>'precalculos.costo_venta_producto_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_producto_t_i',null,array('ng-model'=>'precalculos.costo_venta_producto_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo de ventas terceros</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_terceros_e_p',null,array('ng-model'=>'precalculos.costo_venta_terceros_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('costo_venta_terceros_e_i',null,array('ng-change'=>'calCostoVentaTercerosEP();calCostoVentaTercerosTI();calSumasCostoMateriales();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.costo_venta_terceros_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('costo_venta_terceros_s_p',null,array('ng-model'=>'precalculos.costo_venta_terceros_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('costo_venta_terceros_s_i',null,array('ng-change'=>'calCostoVentaTercerosSP();calCostoVentaTercerosTI();','ng-model'=>'precalculos.costo_venta_terceros_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_terceros_t_p',null,array('ng-model'=>'precalculos.costo_venta_terceros_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_terceros_t_i',null,array('ng-model'=>'precalculos.costo_venta_terceros_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Reemplazo de partes servicio</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('remplazo_parte_servicio_e_p',null,array('ng-model'=>'precalculos.remplazo_parte_servicio_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('remplazo_parte_servicio_e_i',null,array('ng-change'=>'calReemplazoPartesServicioEP();calSumasCostoMateriales()','ng-model'=>'precalculos.remplazo_parte_servicio_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('remplazo_parte_servicio_s_p',null,array('ng-model'=>'precalculos.remplazo_parte_servicio_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('remplazo_parte_servicio_s_i',null,array('ng-change'=>'calReemplazoPartesServicioSP();calReemplazoPartesServicioTI();calSumasCostoMateriales();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.remplazo_parte_servicio_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('remplazo_parte_servicio_t_p',null,array('ng-model'=>'precalculos.remplazo_parte_servicio_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('remplazo_parte_servicio_t_i',null,array('ng-model'=>'precalculos.remplazo_parte_servicio_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>COSTO DE MATERIALES</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_material_e_p',null,array('ng-model'=>'precalculos.costo_material_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_e_i',null,array('ng-model'=>'precalculos.costo_material_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_material_s_p',null,array('ng-model'=>'precalculos.costo_material_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_s_i',null,array('ng-model'=>'precalculos.costo_material_s_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_material_t_p',null,array('ng-model'=>'precalculos.costo_material_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_t_i',null,array('ng-model'=>'precalculos.costo_material_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 1 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hsptab2">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Costo de ventas</div>
                        <div class='panel-body'>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Preparación de sitio</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_e_p',null,array('ng-model'=>'precalculos.preparacion_sitio_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_e_i',null,array('ng-change'=>'calPreparacionSitioEP();calPreparacionSitioTI()','ng-model'=>'precalculos.preparacion_sitio_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('preparacion_sitio_s_p',null,array('ng-model'=>'precalculos.preparacion_sitio_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('preparacion_sitio_s_i',null,array('ng-change'=>'calPreparacionSitioSP();calPreparacionSitioTI()','ng-model'=>'precalculos.preparacion_sitio_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_t_p',null,array('ng-model'=>'precalculos.preparacion_sitio_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_t_i',null,array('ng-model'=>'precalculos.preparacion_sitio_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Preparación de sitio a ser pagada a un agente</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_agente_e_p',null,array('ng-model'=>'precalculos.preparacion_sitio_agente_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('preparacion_sitio_agente_e_i',null,array('ng-change'=>'calPreparacionSitioAgenteEP();calPreparacionSitioAgenteTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.preparacion_sitio_agente_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('preparacion_sitio_agente_s_p',null,array('ng-model'=>'precalculos.preparacion_sitio_agente_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('preparacion_sitio_agente_s_i',null,array('ng-change'=>'calPreparacionSitioAgenteSP();calPreparacionSitioAgenteTI()','ng-model'=>'precalculos.preparacion_sitio_agente_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_agente_t_p',null,array('ng-model'=>'precalculos.preparacion_sitio_agente_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_agente_t_i',null,array('ng-model'=>'precalculos.preparacion_sitio_agente_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Preparación de sitio a ser pagada a un tercero</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_tercero_e_p',null,array('ng-model'=>'precalculos.preparacion_sitio_tercero_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('preparacion_sitio_tercero_e_i',null,array('ng-change'=>'calPreparacionSitioTerceroEP();calPreparacionSitioTerceroTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.preparacion_sitio_tercero_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('preparacion_sitio_tercero_s_p',null,array('ng-model'=>'precalculos.preparacion_sitio_tercero_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('preparacion_sitio_tercero_s_i',null,array('ng-change'=>'calPreparacionSitioTerceroSP();calPreparacionSitioTerceroTI()','ng-model'=>'precalculos.preparacion_sitio_tercero_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('preparacion_sitio_tercero_t_p',null,array('ng-model'=>'precalculos.preparacion_sitio_tercero_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_tercero_t_i',null,array('ng-model'=>'precalculos.preparacion_sitio_tercero_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo de instalación</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_e_p',null,array('ng-model'=>'precalculos.costo_instalacion_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_e_i',null,array('ng-change'=>'calCostoInstalacionEP();calCostoInstalacionTI()','ng-model'=>'precalculos.costo_instalacion_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('costo_instalacion_s_p',null,array('ng-model'=>'precalculos.costo_instalacion_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('costo_instalacion_s_i',null,array('ng-change'=>'calCostoInstalacionSP();calCostoInstalacionTI()','ng-model'=>'precalculos.costo_instalacion_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_t_p',null,array('ng-model'=>'precalculos.costo_instalacion_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_t_i',null,array('ng-model'=>'precalculos.costo_instalacion_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo de instalación pagados a un agente</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_agente_e_p',null,array('ng-model'=>'precalculos.costo_instalacion_agente_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('costo_instalacion_agente_e_i',null,array('ng-change'=>'calCostoInstalacionAgenteEP();calCostoInstalacionAgenteTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.costo_instalacion_agente_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('costo_instalacion_agente_s_p',null,array('ng-model'=>'precalculos.costo_instalacion_agente_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('costo_instalacion_agente_s_i',null,array('ng-change'=>'calCostoInstalacionAgenteSP();calCostoInstalacionAgenteTI()','ng-model'=>'precalculos.costo_instalacion_agente_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_agente_t_p',null,array('ng-model'=>'precalculos.costo_instalacion_agente_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_agente_t_i',null,array('ng-model'=>'precalculos.costo_instalacion_agente_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo de instalación pagados a terceros</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_terceros_e_p',null,array('ng-model'=>'precalculos.costo_instalacion_terceros_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('costo_instalacion_terceros_e_i',null,array('ng-change'=>'calCostoInstalacionTerceroEP();calCostoInstalacionTerceroTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.costo_instalacion_terceros_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('costo_instalacion_terceros_s_p',null,array('ng-model'=>'precalculos.costo_instalacion_terceros_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('costo_instalacion_terceros_s_i',null,array('ng-change'=>'calCostoInstalacionTerceroSP();calCostoInstalacionTerceroTI()','ng-model'=>'precalculos.costo_instalacion_terceros_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_instalacion_terceros_t_p',null,array('ng-model'=>'precalculos.costo_instalacion_terceros_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_terceros_t_i',null,array('ng-model'=>'precalculos.costo_instalacion_terceros_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Mano de obra subcontratada (Interna)</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('mano_obra_subcontr_interna_e_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_interna_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('mano_obra_subcontr_interna_e_i',null,array('ng-change'=>'calManoObraIternaEP();calManoObraIternaTI()','ng-model'=>'precalculos.mano_obra_subcontr_interna_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('mano_obra_subcontr_interna_s_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_interna_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('mano_obra_subcontr_interna_s_i',null,array('ng-change'=>'calManoObraIternaSP();calManoObraIternaTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.mano_obra_subcontr_interna_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('mano_obra_subcontr_interna_t_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_interna_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_interna_t_i',null,array('ng-model'=>'precalculos.mano_obra_subcontr_interna_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Mano de obra subcontratada a terceros</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('mano_obra_subcontr_terceros_e_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_terceros_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('mano_obra_subcontr_terceros_e_i',null,array('ng-change'=>'calManoObraTercerosEP();calManoObraTercerosTI()','ng-model'=>'precalculos.mano_obra_subcontr_terceros_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('mano_obra_subcontr_terceros_s_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_terceros_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('mano_obra_subcontr_terceros_s_i',null,array('ng-change'=>'calManoObraTercerosSP();calManoObraTercerosTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.mano_obra_subcontr_terceros_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('mano_obra_subcontr_terceros_t_p',null,array('ng-model'=>'precalculos.mano_obra_subcontr_terceros_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_t_i',null,array('ng-model'=>'precalculos.mano_obra_subcontr_terceros_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>   
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Capacitación al cliente</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_cliente_e_p',null,array('ng-model'=>'precalculos.capacitacion_cliente_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_cliente_e_i',null,array('ng-change'=>'calCapacitacionClienteEP();calCapacitacionClienteTI();calCostoVentas();calMargenBruto()','ng-model'=>'precalculos.capacitacion_cliente_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_cliente_s_p',null,array('ng-model'=>'precalculos.capacitacion_cliente_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('capacitacion_cliente_s_i',null,array('ng-change'=>'calCapacitacionClienteSP();calCapacitacionClienteTI();calCostoVentas();calMargenBruto();calGastoVentaDedicado()','ng-model'=>'precalculos.capacitacion_cliente_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_cliente_t_p',null,array('ng-model'=>'precalculos.capacitacion_cliente_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_cliente_t_i',null,array('ng-model'=>'precalculos.capacitacion_cliente_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>COSTO DE VENTAS</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_e_p',null,array('ng-model'=>'precalculos.costo_venta_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_e_i',null,array('ng-model'=>'precalculos.costo_venta_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_s_p',null,array('ng-model'=>'precalculos.costo_venta_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_s_i',null,array('ng-model'=>'precalculos.costo_venta_s_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_venta_t_p',null,array('ng-model'=>'precalculos.costo_venta_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_t_i',null,array('ng-model'=>'precalculos.costo_venta_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'></i><h4><b>MARGEN BRUTO</b></h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('margen_bruto_e_p',null,array('ng-model'=>'precalculos.margen_bruto_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_e_i',null,array('ng-model'=>'precalculos.margen_bruto_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('margen_bruto_s_p',null,array('ng-model'=>'precalculos.margen_bruto_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_s_i',null,array('ng-model'=>'precalculos.margen_bruto_s_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('margen_bruto_t_p',null,array('ng-model'=>'precalculos.margen_bruto_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_t_i',null,array('ng-model'=>'precalculos.margen_bruto_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 2 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hsptab3">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Costos de proyecto</div>
                        <div class='panel-body'>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Garantía en partes</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('garantia_parte_e_p',null,array('ng-model'=>'precalculos.garantia_parte_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_parte_e_i',null,array('ng-change'=>'calGarantiaPartesEP();calGarantiaPartesTI();','ng-model'=>'precalculos.garantia_parte_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('garantia_parte_s_p',null,array('ng-model'=>'precalculos.garantia_parte_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('garantia_parte_s_i',null,array('ng-change'=>'calGarantiaPartesSP();calGarantiaPartesTI();','ng-model'=>'precalculos.garantia_parte_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('garantia_parte_t_p',null,array('ng-model'=>'precalculos.garantia_parte_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_parte_t_i',null,array('ng-model'=>'precalculos.garantia_parte_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Garantía de mano de obra</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('garantia_mano_obra_e_p',null,array('ng-model'=>'precalculos.garantia_mano_obra_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_mano_obra_e_i',null,array('ng-change'=>'calGarantiaManoObraEP();calGarantiaManoObraTI();','ng-model'=>'precalculos.garantia_mano_obra_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>%</i></label>-->
                {!! Form::hidden('garantia_mano_obra_s_p',null,array('ng-model'=>'precalculos.garantia_mano_obra_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <!--<label class='control-label'><i class='material-icons'>monetization_on</i></label>-->
                {!! Form::hidden('garantia_mano_obra_s_i',null,array('ng-change'=>'calGarantiaManoObraSP();calGarantiaManoObraTI();','ng-model'=>'precalculos.garantia_mano_obra_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('garantia_mano_obra_t_p',null,array('ng-model'=>'precalculos.garantia_mano_obra_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_mano_obra_t_i',null,array('ng-model'=>'precalculos.garantia_mano_obra_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Comisión por pagar a un tercero</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_pagar_tercero_e_p',null,array('ng-model'=>'precalculos.comision_pagar_tercero_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_pagar_tercero_e_i',null,array('ng-change'=>'calComisionTerceroEP();calComisionTerceroTI();','ng-model'=>'precalculos.comision_pagar_tercero_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_pagar_tercero_s_p',null,array('ng-model'=>'precalculos.comision_pagar_tercero_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('comision_pagar_tercero_s_i',null,array('ng-change'=>'calComisionTerceroSP();calComisionTerceroTI();','ng-model'=>'precalculos.comision_pagar_tercero_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_pagar_tercero_t_p',null,array('ng-model'=>'precalculos.comision_pagar_tercero_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_pagar_tercero_t_i',null,array('ng-model'=>'precalculos.comision_pagar_tercero_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Comisión agente de ventas</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_agente_venta_e_p',null,array('ng-model'=>'precalculos.comision_agente_venta_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_agente_venta_e_i',null,array('ng-change'=>'calComisionAgenteEP();calComisionAgenteTI();','ng-model'=>'precalculos.comision_agente_venta_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_agente_venta_s_p',null,array('ng-model'=>'precalculos.comision_agente_venta_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('comision_agente_venta_s_i',null,array('ng-change'=>'calComisionAgenteSP();calComisionAgenteTI();','ng-model'=>'precalculos.comision_agente_venta_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('comision_agente_venta_t_p',null,array('ng-model'=>'precalculos.comision_agente_venta_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_agente_venta_t_i',null,array('ng-model'=>'precalculos.comision_agente_venta_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Servicios externos</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('servicio_externo_e_p',null,array('ng-model'=>'precalculos.servicio_externo_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('servicio_externo_e_i',null,array('ng-change'=>'calServicioExternoEP();calServicioExternoTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.servicio_externo_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('servicio_externo_s_p',null,array('ng-model'=>'precalculos.servicio_externo_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('servicio_externo_s_i',null,array('ng-change'=>'calServicioExternoSP();calServicioExternoTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.servicio_externo_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('servicio_externo_t_p',null,array('ng-model'=>'precalculos.servicio_externo_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('servicio_externo_t_i',null,array('ng-model'=>'precalculos.servicio_externo_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Capacitación al personal</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_personal_e_p',null,array('ng-model'=>'precalculos.capacitacion_personal_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('capacitacion_personal_e_i',null,array('ng-change'=>'calCapacitacionPersonalEP();calCapacitacionPersonalTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.capacitacion_personal_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_personal_s_p',null,array('ng-model'=>'precalculos.capacitacion_personal_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('capacitacion_personal_s_i',null,array('ng-change'=>'calCapacitacionPersonalSP();calCapacitacionPersonalTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.capacitacion_personal_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('capacitacion_personal_t_p',null,array('ng-model'=>'precalculos.capacitacion_personal_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_personal_t_i',null,array('ng-model'=>'precalculos.capacitacion_personal_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Publicidad/Patrocinios/Congresos</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('publicidad_patrocinio_congreso_e_p',null,array('ng-model'=>'precalculos.publicidad_patrocinio_congreso_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_e_i',null,array('ng-change'=>'calPublicidadEP();calPublicidadTI();','ng-model'=>'precalculos.publicidad_patrocinio_congreso_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('publicidad_patrocinio_congreso_s_p',null,array('ng-model'=>'precalculos.publicidad_patrocinio_congreso_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('publicidad_patrocinio_congreso_s_i',null,array('ng-change'=>'calPublicidadSP();calPublicidadTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.publicidad_patrocinio_congreso_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('publicidad_patrocinio_congreso_t_p',null,array('ng-model'=>'precalculos.publicidad_patrocinio_congreso_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_t_i',null,array('ng-model'=>'precalculos.publicidad_patrocinio_congreso_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Cargos bancarios</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('cargo_bancario_e_p',null,array('ng-model'=>'precalculos.cargo_bancario_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_e_i',null,array('ng-change'=>'calBancariosEP();calBancariosTI();','ng-model'=>'precalculos.cargo_bancario_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('cargo_bancario_s_p',null,array('ng-model'=>'precalculos.cargo_bancario_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_s_i',null,array('ng-change'=>'calBancariosSP();calBancariosTI();','ng-model'=>'precalculos.cargo_bancario_s_i','readonly'=>'readonly','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('cargo_bancario_t_p',null,array('ng-model'=>'precalculos.cargo_bancario_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_t_i',null,array('ng-model'=>'precalculos.cargo_bancario_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Costo financiero</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_financiero_e_p',null,array('ng-model'=>'precalculos.costo_financiero_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-deafult">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_financiero_e_i',null,array('ng-change'=>'calFinancieroEP();calFinancieroTI();','ng-model'=>'precalculos.costo_financiero_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_financiero_s_p',null,array('ng-model'=>'precalculos.costo_financiero_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('costo_financiero_s_i',null,array('ng-change'=>'calFinancieroSP();calFinancieroTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.costo_financiero_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_financiero_t_p',null,array('ng-model'=>'precalculos.costo_financiero_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_financiero_t_i',null,array('ng-model'=>'precalculos.costo_financiero_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Gastos de viaje cliente</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_cliente_e_p',null,array('ng-model'=>'precalculos.gasto_viaje_cliente_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('gasto_viaje_cliente_e_i',null,array('ng-change'=>'calGastoViajeClienteEP();calGastoViajeClienteTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.gasto_viaje_cliente_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_cliente_s_p',null,array('ng-model'=>'precalculos.gasto_viaje_cliente_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('gasto_viaje_cliente_s_i',null,array('ng-change'=>'calGastoViajeClienteSP();calGastoViajeClienteTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.gasto_viaje_cliente_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_cliente_t_p',null,array('ng-model'=>'precalculos.gasto_viaje_cliente_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_cliente_t_i',null,array('ng-model'=>'precalculos.gasto_viaje_cliente_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>  
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Gastos de viaje personal SMH</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_personal_smh_e_p',null,array('ng-model'=>'precalculos.gasto_viaje_personal_smh_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('gasto_viaje_personal_smh_e_i',null,array('ng-change'=>'calGastoViajeSmhEP();calGastoViajeSmhTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.gasto_viaje_personal_smh_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_personal_smh_s_p',null,array('ng-model'=>'precalculos.gasto_viaje_personal_smh_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('gasto_viaje_personal_smh_s_i',null,array('ng-change'=>'calGastoViajeSmhSP();calGastoViajeSmhTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.gasto_viaje_personal_smh_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_viaje_personal_smh_t_p',null,array('ng-model'=>'precalculos.gasto_viaje_personal_smh_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_personal_smh_t_i',null,array('ng-model'=>'precalculos.gasto_viaje_personal_smh_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Impuestos aduanales</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('impuesto_aduanal_e_p',null,array('ng-model'=>'precalculos.impuesto_aduanal_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_aduanal_e_i',null,array('ng-change'=>'calImpuestosAduanalesEP();calImpuestosAduanalesTI();','ng-model'=>'precalculos.impuesto_aduanal_e_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('impuesto_aduanal_s_p',null,array('ng-model'=>'precalculos.impuesto_aduanal_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('impuesto_aduanal_s_i',null,array('ng-change'=>'calImpuestosAduanalesSP();calImpuestosAduanalesTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.impuesto_aduanal_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('impuesto_aduanal_t_p',null,array('ng-model'=>'precalculos.impuesto_aduanal_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_aduanal_t_i',null,array('ng-model'=>'precalculos.impuesto_aduanal_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Flete</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('flete_e_p',null,array('ng-model'=>'precalculos.flete_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_e_i',null,array('ng-change'=>'calFleteEP();calFleteTI();','ng-model'=>'precalculos.flete_e_i ','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('flete_s_p',null,array('ng-model'=>'precalculos.flete_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_s_i',null,array('ng-change'=>'calFleteSP();calFleteTI();','ng-model'=>'precalculos.flete_s_i','class'=>'form-control','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('flete_t_p',null,array('ng-model'=>'precalculos.flete_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_t_i',null,array('ng-model'=>'precalculos.flete_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Seguro</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('seguro_e_p',null,array('ng-model'=>'precalculos.seguro_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('seguro_e_i',null,array('ng-change'=>'calSeguroEP();calSeguroTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.seguro_e_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('seguro_s_p',null,array('ng-model'=>'precalculos.seguro_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
                {!! Form::text('seguro_s_i',null,array('ng-change'=>'calSeguroSP();calSeguroTI();calCostosProyecto();calGastoVentaDedicado()','ng-model'=>'precalculos.seguro_s_i','class'=>'form-control','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('seguro_t_p',null,array('ng-model'=>'precalculos.seguro_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('seguro_t_i',null,array('ng-model'=>'precalculos.seguro_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>      
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>Costos de proyecto</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_proyecto_e_p',null,array('ng-model'=>'precalculos.costo_proyecto_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_e_i',null,array('ng-model'=>'precalculos.costo_proyecto_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_proyecto_s_p',null,array('ng-model'=>'precalculos.costo_proyecto_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_s_i',null,array('ng-model'=>'precalculos.costo_proyecto_s_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('costo_proyecto_t_p',null,array('ng-model'=>'precalculos.costo_proyecto_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_t_i',null,array('ng-model'=>'precalculos.costo_proyecto_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'></i><h4><b>MARGEN DE NEGOCIO</b></h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_venta_dedicado_e_p',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_e_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_e_i',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_e_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_venta_dedicado_s_p',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_s_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_s_i',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_s_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('gasto_venta_dedicado_t_p',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_t_p','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_t_i',null,array('ng-model'=>'precalculos.gasto_venta_dedicado_t_i','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
                        </div>
                        <div class="panel-footer">
<!--<button type="button" ng-controller="PrecalculoCtrl" ng-click="calVentaTotalTI();" class="btn btn-info btn-lg" title="Precálculo"><i class="material-icons"></i>CALCULAR </button>-->
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 3 -->
