                <div role="tabpanel" class="tab-pane fade in" id="htab3">
                    <div class="panel panel-info">
                        <!--<div class='panel-heading'><i class="material-icons">perm_media</i></div>-->
                        <div class='panel-body'>

                        <!-- ------------------------------------------------------------------------ --------------------------------------- SUBMENU INICIO -->
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
                            <li class="active"><a href="#hstab1" data-toggle="tab"><i class="material-icons">perm_media</i> Equipo</a></li>
                            <li><a href="#hstab2" data-toggle="tab"><i class="material-icons"></i> Compras y servicios terceros</a></li>
                            <li><a href="#hstab3" data-toggle="tab"><i class="material-icons"></i> Garantias, marketing, bancarios</a></li>
                            <li><a href="#hstab4" data-toggle="tab"><i class="material-icons"></i> Comisiones a terceros</a></a></li>
                            <!--<li><a href="#htab5" data-toggle="tab"><i class="material-icons"></i> PRECALCULOS</a></li>-->
                        </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="hstab1">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Equipo</div>
                        <div class='panel-body'>
<div class="row">
    <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i></label>
            {!! Form::hidden('id_cotizaciones_paquetes_insumos',null,array('ng-model'=>'precalculos.id_cotizaciones_paquetes_insumos','class'=>'form-control')) !!}
    </div>
    <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'>FECHA DE ACTUALIZACIÓN DE CATÁLOGO</label>
            {!! Form::text('fecha_catalogo',null,array('ng-model'=>'precalculos.fecha_catalogo','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label><i class='material-icons'>nombre_icono</i> EQUIPO </label>
            {!! Form::text('precio','<%model%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label ><i class='material-icons'>nombre_icono</i> PRECIO </label>
            {!! Form::text('precio','<%monto%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label ><i class='material-icons'>nombre_icono</i><p class="text-muted"> MONEDA </p></label>
            {!! Form::text('moneda',null,array('ng-model'=>'precalculos.moneda','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label ><i class='material-icons'>nombre_icono</i><p class="text-default"> FECHA </p></label>
            {!! Form::text('fecha_tipo_cambio',null,array('ng-model'=>'precalculos.fecha_tipo_cambio','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
</div>
        
        
<div class="row">
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label ><i class='material-icons'>nombre_icono</i> TIPO DE CAMBIO</label>
            {!! Form::text('tipo_cambio',null,array('ng-model'=>'precalculos.tipo_cambio','class'=>'form-control','placeholder'=>'Solo Números','numbers-only')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group label-floating has-info">
            <label><i class='material-icons'>nombre_icono</i> PRECIO DOLARES</label>
            {!! Form::text('precio_dolares',null,array('ng-change'=>'calPrecioDescuento()','ng-model'=>'precalculos.precio_dolares','class'=>'form-control','placeholder'=>'Solo Números','numbers-only')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group label-floating has-info">
            <label><i class='material-icons'>nombre_icono</i> DESCUENTO</label>
            {!! Form::text('descuento',null,array('ng-model'=>'precalculos.descuento','class'=>'form-control','ng-change'=>'calPrecioDescuento()','placeholder'=>'Solo Números','numbers-only')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group has-warning">
            <label><p class="text-warning"><i class='material-icons'>lock</i>PRECIO DOLARES CON DESCUENTO</p></label>
            {!! Form::text('precio_dolares_descuento',null,array('ng-model'=>'precalculos.precio_dolares_descuento','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
</div>
<!-- --------------------------------------------------------------------------------------------------------------------------------------------------- -->
<hr style="height: 5px;background-color: #0066CC" />
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4> CONCEPTO </H4></label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4> MONTO </H4></label>
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4> PORCENTAJE </H4></label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i> IMPUESTOS DE IMPORTACIÓN (ARANCELES)</label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_importacion',null,array('ng-model'=>'precalculos.impuesto_importacion','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('porcentaje_impuesto_importacion',null,array('ng-change'=>'calImpImp();calSubtotal1();calPrecioVenta()','ng-model'=>'precalculos.porcentaje_impuesto_importacion','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i> AGENTE ADUANAL</label>
            </div>
        </div>
        <div class='col-md-4'>    
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('agente_aduanal',null,array('ng-model'=>'precalculos.agente_aduanal','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
        <div class='col-md-4'> 
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('h_agente_aduanal',null,array('ng-change'=>'calImpAgente();calSubtotal1();calPrecioVenta()','ng-model'=>'precalculos.h_agente_aduanal','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>FLETE NACIONAL E INTERNACIONAL</label>
            </div>
        </div>
        <div class='col-md-4'> 
            <div class="form-group label-floating has-default">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete',null,array('ng-change'=>'calPorFlete();calSubtotal1();calPrecioVenta()','ng-model'=>'precalculos.flete','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-4'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('porcentaje_flete',null,array('ng-model'=>'precalculos.porcentaje_flete','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-default">
                <label><i class='material-icons'></i>INSTALACIÓN</label>
            </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('costo_instalacion',null,array('ng-change'=>'calPorInstalacion();calSubtotal1();calPrecioVenta()','ng-model'=>'precalculos.costo_instalacion','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_costo_instalacion',null,array('ng-model'=>'precalculos.porcentaje_costo_instalacion','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>PREPARACIÓN DE SITIO</label>
            </div>
        </div>
        <div class='col-md-4'>   
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('preparacion_sitio',null,array('ng-change'=>'calPorSitio();calSubtotal1();calPrecioVenta()','ng-model'=>'precalculos.preparacion_sitio','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_preparacion_sitio',null,array('ng-model'=>'precalculos.porcentaje_preparacion_sitio','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<!--<hr style="height: 5px;background-color: #0066CC" />-->
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 1 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hstab2">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Compras y servicios terceros</div>
                        <div class='panel-body'>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4>COMPRAS Y SERVICIOS TERCEROS</H4></label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
</div>
<div class="row">
<div class='col-md-4'>        
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'></i>INSUMOS</label>
            </div>
</div>
<div class='col-md-4'>      
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            
        </div>
</div>
<div class='col-md-4'>      
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
        </div>
</div>
</div>
<div class="row">
<div class='col-md-12'>        
<table>
<tr ng-repeat="todo in insumos" ng-if="todo.insumo_bandera_insumo === 'T' && todo.insumo_bandera_insumo != '0.00'" ng-init="setTotals(todo.precio,todo.insumo_proovedor)"><!-- ng-init="setTotals(todo)">-->
    <td>
        {!! Form::text('modelo_insumos','<%todo.insumo_proovedor%>',array('class'=>'form-control','size'=>'40','readonly'=>'readonly',)) !!}
    </td>
    <td>
        {!! Form::text('precio_compra_insumos','<%todo.precio | number:2%>',array('class'=>'form-control','style'=>'text-align:center','size'=>'40','readonly'=>'readonly',)) !!}
    </td>
    <td>
        {!! Form::text('porcentaje_insumos',null,array('class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center','size'=>'40')) !!}
    </td>
</tr>
<tr ng-repeat="todo in insumo" ng-init="setTotals(todo.precio,todo.codigo_proovedor)"><!-- ng-init="setTotals(todo)">-->
    <td>
        {!! Form::text('modelo_insumos','<%todo.codigo_proovedor%>',array('class'=>'form-control','size'=>'40','readonly'=>'readonly',)) !!}
    </td>
    <td>
        {!! Form::text('precio_compra_insumos','<%todo.precio | number:2%>',array('class'=>'form-control','style'=>'text-align:center','size'=>'40','readonly'=>'readonly',)) !!}
    </td>
    <td>
        {!! Form::text('porcentaje_insumos',null,array('class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center','size'=>'40')) !!}
    </td>
</tr>
</table>
    </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>SUBTOTAL 1</h4></label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('subtotal_1',null,array('ng-model'=>'precalculos.subtotal_1','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_1',null,array('ng-model'=>'precalculos.porcentaje_subtotal_1','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-success">
                <label class='control-label'><i class='material-icons'></i><h4>MARGEN BRUTO</h4></label>
            </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('margen_bruto',null,array('ng-model'=>'precalculos.margen_bruto','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_margen_bruto',null,array('ng-model'=>'precalculos.porcentaje_margen_bruto','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<!--<hr style="height: 5px;background-color: #0066CC" />-->
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 2 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hstab3">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Garantias, marketing, bancarios</div>
                        <div class='panel-body'>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4>GARANTIAS, MARKETING, BANCARIOS</H4></label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>GARANTIA PRIMER AÑO</label>
            </div>
        </div>
        <div class='col-md-4'>   
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('total_costo_instalacion_garantia',null,array('ng-change'=>'calSubtotal2();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.total_costo_instalacion_garantia','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>   
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_garantia',null,array('ng-model'=>'precalculos.porcentaje_garantia','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>RESERVA DE REFACCIONES</label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-default">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('reserva_refaccion',null,array('ng-change'=>'calReserva();calSubtotal2();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.reserva_refaccion','class'=>'form-control','numbers-only','style'=>'text-align:center','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_reserva_refaccion',null,array('ng-model'=>'precalculos.porcentaje_reserva_refaccion','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>GARANTÍA ADICIONAL</label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('garantia_adicional',null,array('ng-change'=>'calSubtotal2();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.garantia_adicional','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_garantia_adicional',null,array('ng-model'=>'precalculos.porcentaje_garantia_adicional','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>PATROCINIOS. CONGRESOS, PUBLICACIONES</label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i>Ingresa el valor requerido</label>
            {!! Form::text('patrocinio_congreso_publicacion',null,array('ng-change'=>'calSubtotal2();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.patrocinio_congreso_publicacion','class'=>'form-control','numbers-only','style'=>'text-align:center','pattern'=>'.{1,}','required title'=>'Debe digitar un caracter como minimo')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_patrocinio_congreso_publicacion',null,array('ng-model'=>'precalculos.porcentaje_patrocinio_congreso_publicacion','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>CARGOS BANCARIOS</label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i>Ingresa el valor requerido</label>
            {!! Form::text('cargo_bancario',null,array('ng-change'=>'calSubtotal2();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.cargo_bancario','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_cargo_bancario',null,array('ng-model'=>'precalculos.porcentaje_cargo_bancario','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>SUBTOTAL 2</h4></label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('subtotal_2',null,array('ng-model'=>'precalculos.subtotal_2','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_2',null,array('ng-model'=>'precalculos.porcentaje_subtotal_2','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<hr style="height: 5px;background-color: #0066CC" />

                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 3 -->
                <div role="tabpanel" class="tab-pane fade in active" id="hstab4">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Comisiones a terceros</div>
                        <div class='panel-body'>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i><H4>COMISIONES A TERCEROS</H4></label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i></label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>FINANCIERA</label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('financiera',null,array('ng-model'=>'precalculos.financiera','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'>Ingrese el porcentaje requerido<i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_financiera',null,array('ng-change'=>'calFinanciera();calSubtotal3();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.porcentaje_financiera','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>DISTRIBUIDOR</label>
            </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('distribuidor',null,array('ng-model'=>'precalculos.distribuidor','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'>Ingrese el porcentaje requerido<i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_distribuidor',null,array('ng-change'=>'calDistribuidor();calSubtotal3();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.porcentaje_distribuidor','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>OTROS</label>
            </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('otros',null,array('ng-model'=>'precalculos.otros','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'>Ingrese el porcentaje requerido<i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_otros',null,array('ng-change'=>'calOtros();calSubtotal3();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.porcentaje_otros','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>SUBTOTAL 3</h4></label>
            </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('subtotal_3',null,array('ng-model'=>'precalculos.subtotal_3','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_3',null,array('ng-model'=>'precalculos.porcentaje_subtotal_3','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<hr style="height: 5px;background-color: #0066CC" />
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><H4>CAPACITACIÓN</H4></label>
            </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i>Ingrese el valor requerido</label>
            {!! Form::text('capacitacion',null,array('ng-change'=>'calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.capacitacion','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>  
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_capacitacion',null,array('ng-model'=>'precalculos.porcentaje_capacitacion','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i><H4>COMISIÓN</H4></label>
            </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('comision',null,array('ng-model'=>'precalculos.comision','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'>Ingrese el porcentaje requerido<i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_comision',null,array('ng-change'=>'calComision();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();','ng-model'=>'precalculos.porcentaje_comision','class'=>'form-control','numbers-only','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-success">
                <label class='control-label'><i class='material-icons'></i><h4>MARGEN DEL NEGOCIO</h4></label>
            </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('margen_negocio',null,array('ng-model'=>'precalculos.margen_negocio','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_margen_negocio',null,array('ng-model'=>'precalculos.porcentaje_margen_negocio','class'=>'form-control','readonly'=>'readonly','style'=>'text-align:center')) !!}
        </div>
        </div>
</div>  
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-success">
                <label class='control-label'><i class='material-icons'></i><h3><b>PRECIO DE VENTA</b> </h3></label>
            </div>
        </div>
        <div class='col-md-6'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>monetization_on</i><span class="badge"><h2><% precalculos.precio_venta | currency%></h2></span> <span class="badge"><h2><%monedas%></h2></span></label>
            {!! Form::hidden('precio_venta',null,array('ng-model'=>'precalculos.precio_venta','class'=>'form-control','style'=>'font-size:20px')) !!}
        </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group label-floating has-success">
<!--            <label class="control-label" for="addon1">  <span class="badge"><h3></h3></span></label>-->
        </div>
        </div>
</div>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> OBSERVACIONES</label>
            {!! Form::textarea('observaciones', null, ['size' => '30x2','ng-model'=>'precalculos.observaciones','class'=>'form-control']) !!}
        </div>                        
                        </div>
                    </div>
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 4 -->
            <!--    <div role="tabpanel" class="tab-pane fade in active" id="hstab5">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Comisiones a terceros</div>
                        <div class='panel-body'>
                            <h3>submenu 5</h3>
                        </div>
                    </div> 
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 5 -->
            </div> <!-- --------------------------------------------------------------------------------------------------- TAB CONTENT -->


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        </div><!-- PANEL BODY -->
                        <div class="panel-footer"> 
<!--<button type="button" ng-controller="PrecalculoCtrl" ng-click="subTotales();calPrecioVenta();calImpMargenBruto();calMargenNegocio();porcentajes();" class="btn btn-info btn-lg" title="Precálculo"><i class="material-icons"></i>CALCULAR </button>-->
                        </div>  <!-- FOOTER -->
                    </div><!-- PANEL PANEL INFO -->
                </div>  <!-- -------------------------------------------------------------------------------------------------------------------------------- TAB PANEL 3 -->
