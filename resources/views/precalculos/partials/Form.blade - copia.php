<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">face</i> DATOS CLIENTE </div>
    <div class='panel-body'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ID</label>
            {!! Form::text('id',null,array('ng-model'=>'id','class'=>'form-control')) !!}
        </div>
        
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> CATÁLOGO</label>
            {!! Form::text('id_catalogo',null,array('ng-model'=>'id_catalogo','class'=>'form-control')) !!}
        </div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>SUCURSAL</label>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>NO DE PROYECTO</label>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>NO DE COTIZACIÓN</label>
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>FECHA</label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>CLIENTE</label>
            </div>
        </div>
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>VENDEDOR</label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-12'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>DESCRIPCIÓN CORTA DEL SERVICIO/EQUIPO OFRECIDO</label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>PLAZO DE ENTREGA</label>
            </div>
        </div>
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>TERMINOS DE PAGO</label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>MONEDA</label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>MES ESERADO DE FACTURACIÓN</label>
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>NO DE MESES DE GARANTIA</label>
            </div>
        </div>
</div>

        
    </div>
        <div class="panel-footer"> </div>  
</div>

<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">devices_other</i> DATOS EQUIPO </div>
    <div class='panel-body'>
    </div>
        <div class="panel-footer"> </div>  
</div>
        <!------------------------------------------------------------------------------------------------------------------------------- -->
<!--
<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">perm_media</i> DATOS CALCULO IMAGENOLOGIA </div>
    <div class='panel-body'>-->
<!------------------------------------------------------ -->
<div class="form-group">
 <ul class="nav nav-pills">
  <li role="presentation">
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" href="#imagenologia"><i class="material-icons">perm_media</i> DATOS CÁLCULO IMAGENOLOGÍA</a></h4></div>
        <div id="imagenologia" class="panel-collapse collapse">
            <div class="panel-body"> 
<div class="container">

        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> COTIZACIÓN-PAQUETES-INSUMOS</label>
            {!! Form::text('id_cotizaciones_paquetes_insumos',null,array('ng-model'=>'id_cotizaciones_paquetes_insumos','class'=>'form-control')) !!}
        </div>
        
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> FECHA CATÁLOGO</label>
            {!! Form::text('fecha_catalogo',null,array('ng-model'=>'fecha_catalogo','class'=>'form-control')) !!}
        </div>
<div class="row">
    <div class='col-md-3'>  
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>EQUIPO</label>
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>PRECIO_COMPRA</label>
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>MONEDA</label>
            {!! Form::text('moneda',null,array('ng-model'=>'moneda','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> FECHA</label>
            {!! Form::text('fecha_tipo_cambio',null,array('ng-model'=>'fecha_tipo_cambio','class'=>'form-control')) !!}
        </div>
    </div>
</div>
        
        
<div class="row">
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> TIPO DE CAMBIO</label>
            {!! Form::text('tipo_cambio',null,array('ng-model'=>'tipo_cambio','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> PRECIO DOLARES</label>
            {!! Form::text('precio_dolares',null,array('ng-model'=>'precio_dolares','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> DESCUENTO</label>
            {!! Form::text('descuento',null,array('ng-model'=>'descuento','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> PRECIO DOLARES CON DESCUENTO</label>
            {!! Form::text('precio_dolares_descuento',null,array('ng-model'=>'precio_dolares_descuento','class'=>'form-control')) !!}
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------- -->
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_importacion',null,array('ng-model'=>'impuesto_importacion','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-4'>  
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('porcentaje_impuesto_importacion',null,array('ng-model'=>'porcentaje_impuesto_importacion','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('agente_aduanal',null,array('ng-model'=>'agente_aduanal','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-4'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('h_agente_aduanal',null,array('ng-model'=>'h_agente_aduanal','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete',null,array('ng-model'=>'flete','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-4'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
                {!! Form::text('porcentaje_flete',null,array('ng-model'=>'porcentaje_flete','class'=>'form-control')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group has-info">
                <label><i class='material-icons'></i>INSTALACIÓN</label>
            </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('costo_instalacion',null,array('ng-model'=>'costo_instalacion','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_costo_instalacion',null,array('ng-model'=>'porcentaje_costo_instalacion','class'=>'form-control')) !!}
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('preparacion_sitio',null,array('ng-model'=>'preparacion_sitio','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_preparacion_sitio',null,array('ng-model'=>'porcentaje_preparacion_sitio','class'=>'form-control')) !!}
        </div>
        </div>
</div>
<hr style="height: 5px;background-color: #0066CC" />
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
                {!! Form::text('modelo_insumos',null,array('ng-model'=>'modelo_insumos','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('precio_compra_insumos',null,array('ng-model'=>'precio_compra_insumos','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_insumos',null,array('ng-model'=>'porcentaje_insumos','class'=>'form-control')) !!}
        </div>
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
            {!! Form::text('subtotal_1',null,array('ng-model'=>'subtotal_1','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_1',null,array('ng-model'=>'porcentaje_subtotal_1','class'=>'form-control')) !!}
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
            {!! Form::text('margen_bruto',null,array('ng-model'=>'margen_bruto','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_margen_bruto',null,array('ng-model'=>'porcentaje_margen_bruto','class'=>'form-control')) !!}
        </div>
        </div>
</div>
<hr style="height: 5px;background-color: #0066CC" />
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('total_costo_instalacion_garantia',null,array('ng-model'=>'total_costo_instalacion_garantia','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>   
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_garantia',null,array('ng-model'=>'porcentaje_garantia','class'=>'form-control')) !!}
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('reserva_refaccion',null,array('ng-model'=>'reserva_refaccion','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_reserva_refaccion',null,array('ng-model'=>'porcentaje_reserva_refaccion','class'=>'form-control')) !!}
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
            {!! Form::text('garantia_adicional',null,array('ng-model'=>'garantia_adicional','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_garantia_adicional',null,array('ng-model'=>'porcentaje_garantia_adicional','class'=>'form-control')) !!}
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
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('patrocinio_congreso_publicacion',null,array('ng-model'=>'patrocinio_congreso_publicacion','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_patrocinio_congreso_publicacion',null,array('ng-model'=>'porcentaje_patrocinio_congreso_publicacion','class'=>'form-control')) !!}
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
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('cargo_bancario',null,array('ng-model'=>'cargo_bancario','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_cargo_bancario',null,array('ng-model'=>'porcentaje_cargo_bancario','class'=>'form-control')) !!}
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
            {!! Form::text('subtotal_2',null,array('ng-model'=>'subtotal_2','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_2',null,array('ng-model'=>'porcentaje_subtotal_2','class'=>'form-control')) !!}
        </div>
        </div>
</div>
<hr style="height: 5px;background-color: #0066CC" />
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('financiera',null,array('ng-model'=>'financiera','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_financiera',null,array('ng-model'=>'porcentaje_financiera','class'=>'form-control')) !!}
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('distribuidor',null,array('ng-model'=>'distribuidor','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_distribuidor',null,array('ng-model'=>'porcentaje_distribuidor','class'=>'form-control')) !!}
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('otros',null,array('ng-model'=>'otros','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_otros',null,array('ng-model'=>'porcentaje_otros','class'=>'form-control')) !!}
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
            {!! Form::text('subtotal_3',null,array('ng-model'=>'subtotal_3','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>           
        <div class="form-group label-floating has-warning">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_subtotal_3',null,array('ng-model'=>'porcentaje_subtotal_3','class'=>'form-control')) !!}
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
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('capacitacion',null,array('ng-model'=>'capacitacion','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>  
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_capacitacion',null,array('ng-model'=>'porcentaje_capacitacion','class'=>'form-control')) !!}
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('comision',null,array('ng-model'=>'comision','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'>      
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_comision',null,array('ng-model'=>'porcentaje_comision','class'=>'form-control')) !!}
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
            {!! Form::text('margen_negocio',null,array('ng-model'=>'margen_negocio','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-4'> 
        <div class="form-group label-floating has-success">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>%</label>
            {!! Form::text('porcentaje_margen_negocio',null,array('ng-model'=>'porcentaje_margen_negocio','class'=>'form-control')) !!}
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
            <label class='control-label'><i class='material-icons'>monetization_on</i> </label>
            {!! Form::text('precio_venta',null,array('ng-model'=>'precio_venta','class'=>'form-control')) !!}
        </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group label-floating has-success">
            <label class="control-label" for="addon1">  <span class="badge"><h3>USD</h3></span></label>
        </div>
        </div>
</div>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> OBSERVACIONES</label>
            {!! Form::textarea('observaciones', null, ['size' => '30x2','ng-model'=>'observaciones','class'=>'form-control']) !!}
        </div>
</div><!-- CONTAINER -->
    </div> <!-- BODY -->
    
    </div>
          <!--<div class="panel-footer">Panel Footer</div>-->
        </div>
      </div>
  </li>
</ul>
</div>
        <!-------------------------------------------------------------------------------------------------------------- -->
<!--
    </div>
        <div class="panel-footer"> 
                <button type="button" ng-controller=""  class="btn btn-warning btn-lg" ng-click=""><i class="material-icons">blur_on</i>BORRAR</button>
        </div>  
</div>-->
        <!-- ------------------------------------------------------------------------------------------------------------- -->
        <!--
<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">assignment</i> DATOS PRECALCULO </div>
    <div class='panel-body'>-->
<div class="form-group">
 <ul class="nav nav-pills">
  <li role="presentation">
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" href="#precalculo"><i class="material-icons">assessment</i> DATOS PRECALCULO</a></h4></div>
        <div id="precalculo" class="panel-collapse collapse">
            <div class="panel-body"> 
<div class="container">
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> NÚMERO DE PROYECTO</label>
            {!! Form::text('numero_proyecto',null,array('ng-model'=>'numero_proyecto','class'=>'form-control')) !!}
        </div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label class='control-label'><i class='material-icons'></i><h4><b>Descripción de los elementos</b> </h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>Equipo</h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>Servicio Técnico</h4></label>
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i><h4>Total</h4></label>
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label class='control-label'></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i>%</label>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i>Importe</label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i>%</label>
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i>Importe</label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group  has-warning">
                <label class='control-label'><i class='material-icons'></i>%</label>
            </div>
        </div>
        <div class='col-md-2'> 
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'></i>Importe</label>
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
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>monetization_on</i></label>
            {!! Form::text('venta_total_t_i',null,array('ng-model'=>'venta_total_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_e_i',null,array('ng-model'=>'valor_venta_e_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('valor_venta_servicio_e_p',null,array('ng-model'=>'valor_venta_servicio_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_servicio_e_i',null,array('ng-model'=>'valor_venta_servicio_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('valor_venta_servicio_s_p',null,array('ng-model'=>'valor_venta_servicio_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_servicio_s_i',null,array('ng-model'=>'valor_venta_servicio_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('valor_venta_servicio_t_p',null,array('ng-model'=>'valor_venta_servicio_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('valor_venta_servicio_t_i',null,array('ng-model'=>'valor_venta_servicio_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_producto_e_p',null,array('ng-model'=>'costo_venta_producto_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_producto_e_i',null,array('ng-model'=>'costo_venta_producto_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_producto_s_p',null,array('ng-model'=>'costo_venta_producto_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_producto_s_i',null,array('ng-model'=>'costo_venta_producto_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_producto_t_p',null,array('ng-model'=>'costo_venta_producto_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_producto_t_i',null,array('ng-model'=>'costo_venta_producto_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_terceros_e_p',null,array('ng-model'=>'costo_venta_terceros_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_terceros_e_i',null,array('ng-model'=>'costo_venta_terceros_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_terceros_s_p',null,array('ng-model'=>'costo_venta_terceros_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_terceros_s_i',null,array('ng-model'=>'costo_venta_terceros_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_terceros_t_p',null,array('ng-model'=>'costo_venta_terceros_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_terceros_t_i',null,array('ng-model'=>'costo_venta_terceros_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('remplazo_parte_servicio_e_p',null,array('ng-model'=>'remplazo_parte_servicio_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('remplazo_parte_servicio_e_i',null,array('ng-model'=>'remplazo_parte_servicio_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('remplazo_parte_servicio_s_p',null,array('ng-model'=>'remplazo_parte_servicio_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('remplazo_parte_servicio_s_i',null,array('ng-model'=>'remplazo_parte_servicio_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('remplazo_parte_servicio_t_p',null,array('ng-model'=>'remplazo_parte_servicio_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('remplazo_parte_servicio_t_i',null,array('ng-model'=>'remplazo_parte_servicio_t_i','class'=>'form-control')) !!}
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
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_material_e_p',null,array('ng-model'=>'costo_material_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_e_i',null,array('ng-model'=>'costo_material_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_material_s_p',null,array('ng-model'=>'costo_material_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_s_i',null,array('ng-model'=>'costo_material_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_material_t_p',null,array('ng-model'=>'costo_material_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_material_t_i',null,array('ng-model'=>'costo_material_t_i','class'=>'form-control')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Preparación de sitio</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_e_p',null,array('ng-model'=>'preparacion_sitio_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_e_i',null,array('ng-model'=>'preparacion_sitio_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_s_p',null,array('ng-model'=>'preparacion_sitio_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_s_i',null,array('ng-model'=>'preparacion_sitio_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_t_p',null,array('ng-model'=>'preparacion_sitio_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_t_i',null,array('ng-model'=>'preparacion_sitio_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_agente_e_p',null,array('ng-model'=>'preparacion_sitio_agente_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_agente_e_i',null,array('ng-model'=>'preparacion_sitio_agente_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_agente_s_p',null,array('ng-model'=>'preparacion_sitio_agente_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_agente_s_i',null,array('ng-model'=>'preparacion_sitio_agente_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_agente_t_p',null,array('ng-model'=>'preparacion_sitio_agente_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_agente_t_i',null,array('ng-model'=>'preparacion_sitio_agente_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_tercero_e_p',null,array('ng-model'=>'preparacion_sitio_tercero_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_tercero_e_i',null,array('ng-model'=>'preparacion_sitio_tercero_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_tercero_s_p',null,array('ng-model'=>'preparacion_sitio_tercero_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_tercero_s_i',null,array('ng-model'=>'preparacion_sitio_tercero_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('preparacion_sitio_tercero_t_p',null,array('ng-model'=>'preparacion_sitio_tercero_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('preparacion_sitio_tercero_t_i',null,array('ng-model'=>'preparacion_sitio_tercero_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_e_p',null,array('ng-model'=>'costo_instalacion_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_e_i',null,array('ng-model'=>'costo_instalacion_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_s_p',null,array('ng-model'=>'costo_instalacion_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_s_i',null,array('ng-model'=>'costo_instalacion_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_t_p',null,array('ng-model'=>'costo_instalacion_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_t_i',null,array('ng-model'=>'costo_instalacion_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_agente_e_p',null,array('ng-model'=>'costo_instalacion_agente_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_agente_e_i',null,array('ng-model'=>'costo_instalacion_agente_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacionl_agente_s_p',null,array('ng-model'=>'costo_instalacionl_agente_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_agente_s_i',null,array('ng-model'=>'costo_instalacion_agente_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_agente_t_p',null,array('ng-model'=>'costo_instalacion_agente_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_agente_t_i',null,array('ng-model'=>'costo_instalacion_agente_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_terceros_e_p',null,array('ng-model'=>'costo_instalacion_terceros_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_terceros_e_i',null,array('ng-model'=>'costo_instalacion_terceros_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_terceros_s_p',null,array('ng-model'=>'costo_instalacion_terceros_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_terceros_s_i',null,array('ng-model'=>'costo_instalacion_terceros_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_instalacion_terceros_t_p',null,array('ng-model'=>'costo_instalacion_terceros_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_instalacion_terceros_t_i',null,array('ng-model'=>'costo_instalacion_terceros_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_interna_e_p',null,array('ng-model'=>'mano_obra_subcontr_interna_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_interna_e_i',null,array('ng-model'=>'mano_obra_subcontr_interna_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_interna_s_p',null,array('ng-model'=>'mano_obra_subcontr_interna_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_interna_s_i',null,array('ng-model'=>'mano_obra_subcontr_interna_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_interna_t_p',null,array('ng-model'=>'mano_obra_subcontr_interna_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_interna_t_i',null,array('ng-model'=>'mano_obra_subcontr_interna_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_e_p',null,array('ng-model'=>'mano_obra_subcontr_terceros_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_e_i',null,array('ng-model'=>'mano_obra_subcontr_terceros_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_s_p',null,array('ng-model'=>'mano_obra_subcontr_terceros_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_s_i',null,array('ng-model'=>'mano_obra_subcontr_terceros_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_t_p',null,array('ng-model'=>'mano_obra_subcontr_terceros_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('mano_obra_subcontr_terceros_t_i',null,array('ng-model'=>'mano_obra_subcontr_terceros_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_cliente_e_p',null,array('ng-model'=>'capacitacion_cliente_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_cliente_e_i',null,array('ng-model'=>'capacitacion_cliente_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_cliente_s_p',null,array('ng-model'=>'capacitacion_cliente_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_cliente_s_i',null,array('ng-model'=>'capacitacion_cliente_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_cliente_t_p',null,array('ng-model'=>'capacitacion_cliente_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_cliente_t_i',null,array('ng-model'=>'capacitacion_cliente_t_i','class'=>'form-control')) !!}
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
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_e_p',null,array('ng-model'=>'costo_venta_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_e_i',null,array('ng-model'=>'costo_venta_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_s_p',null,array('ng-model'=>'costo_venta_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_s_i',null,array('ng-model'=>'costo_venta_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_venta_t_p',null,array('ng-model'=>'costo_venta_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_venta_t_i',null,array('ng-model'=>'costo_venta_t_i','class'=>'form-control')) !!}
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
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('margen_bruto_e_p',null,array('ng-model'=>'margen_bruto_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_e_i',null,array('ng-model'=>'margen_bruto_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('margen_bruto_s_p',null,array('ng-model'=>'margen_bruto_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_s_i',null,array('ng-model'=>'margen_bruto_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('margen_bruto_t_p',null,array('ng-model'=>'margen_bruto_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('margen_bruto_t_i',null,array('ng-model'=>'margen_bruto_t_i','class'=>'form-control')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-success">
                <label ><i class='material-icons'></i><h4>Garantía en partes</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_parte_e_p',null,array('ng-model'=>'garantia_parte_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_parte_e_i',null,array('ng-model'=>'garantia_parte_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_parte_s_p',null,array('ng-model'=>'garantia_parte_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_parte_s_i',null,array('ng-model'=>'garantia_parte_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_parte_t_p',null,array('ng-model'=>'garantia_parte_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_parte_t_i',null,array('ng-model'=>'garantia_parte_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_mano_obra_e_p',null,array('ng-model'=>'garantia_mano_obra_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_mano_obra_e_i',null,array('ng-model'=>'garantia_mano_obra_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_mano_obra_s_p',null,array('ng-model'=>'garantia_mano_obra_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_mano_obra_s_i',null,array('ng-model'=>'garantia_mano_obra_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('garantia_mano_obra_t_p',null,array('ng-model'=>'garantia_mano_obra_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('garantia_mano_obra_t_i',null,array('ng-model'=>'garantia_mano_obra_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_pagar_tercero_e_p',null,array('ng-model'=>'comision_pagar_tercero_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_pagar_tercero_e_i',null,array('ng-model'=>'comision_pagar_tercero_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_pagar_tercero_s_p',null,array('ng-model'=>'comision_pagar_tercero_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_pagar_tercero_s_i',null,array('ng-model'=>'comision_pagar_tercero_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_pagar_tercero_t_p',null,array('ng-model'=>'comision_pagar_tercero_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_pagar_tercero_t_i',null,array('ng-model'=>'comision_pagar_tercero_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_agente_venta_e_p',null,array('ng-model'=>'comision_agente_venta_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_agente_venta_e_i',null,array('ng-model'=>'comision_agente_venta_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_agente_venta_s_p',null,array('ng-model'=>'comision_agente_venta_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_agente_venta_s_i',null,array('ng-model'=>'comision_agente_venta_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('comision_agente_venta_t_p',null,array('ng-model'=>'comision_agente_venta_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('comision_agente_venta_t_i',null,array('ng-model'=>'comision_agente_venta_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('servicio_externo_e_p',null,array('ng-model'=>'servicio_externo_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('servicio_externo_e_i',null,array('ng-model'=>'servicio_externo_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('servicio_externo_s_p',null,array('ng-model'=>'servicio_externo_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('servicio_externo_s_i',null,array('ng-model'=>'servicio_externo_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('servicio_externo_t_p',null,array('ng-model'=>'servicio_externo_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('servicio_externo_t_i',null,array('ng-model'=>'servicio_externo_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_personal_e_p',null,array('ng-model'=>'capacitacion_personal_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_personal_e_i',null,array('ng-model'=>'capacitacion_personal_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_personal_s_p',null,array('ng-model'=>'capacitacion_personal_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_personal_s_i',null,array('ng-model'=>'capacitacion_personal_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('capacitacion_personal_t_p',null,array('ng-model'=>'capacitacion_personal_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('capacitacion_personal_t_i',null,array('ng-model'=>'capacitacion_personal_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_e_p',null,array('ng-model'=>'publicidad_patrocinio_congreso_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_e_i',null,array('ng-model'=>'publicidad_patrocinio_congreso_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_s_p',null,array('ng-model'=>'publicidad_patrocinio_congreso_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_s_i',null,array('ng-model'=>'publicidad_patrocinio_congreso_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_t_p',null,array('ng-model'=>'publicidad_patrocinio_congreso_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('publicidad_patrocinio_congreso_t_i',null,array('ng-model'=>'publicidad_patrocinio_congreso_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('cargo_bancario_e_p',null,array('ng-model'=>'cargo_bancario_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_e_i',null,array('ng-model'=>'cargo_bancario_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('cargo_bancario_s_p',null,array('ng-model'=>'cargo_bancario_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_s_i',null,array('ng-model'=>'cargo_bancario_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('cargo_bancario_t_p',null,array('ng-model'=>'cargo_bancario_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('cargo_bancario_t_i',null,array('ng-model'=>'cargo_bancario_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_financiero_e_p',null,array('ng-model'=>'costo_financiero_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_financiero_e_i',null,array('ng-model'=>'costo_financiero_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_financiero_s_p',null,array('ng-model'=>'costo_financiero_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_financiero_s_i',null,array('ng-model'=>'costo_financiero_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_financiero_t_p',null,array('ng-model'=>'costo_financiero_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_financiero_t_i',null,array('ng-model'=>'costo_financiero_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_cliente_e_p',null,array('ng-model'=>'gasto_viaje_cliente_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_cliente_e_i',null,array('ng-model'=>'gasto_viaje_cliente_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_cliente_s_p',null,array('ng-model'=>'gasto_viaje_cliente_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_cliente_s_i',null,array('ng-model'=>'gasto_viaje_cliente_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_cliente_t_p',null,array('ng-model'=>'gasto_viaje_cliente_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_cliente_t_i',null,array('ng-model'=>'gasto_viaje_cliente_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_personal_smh_e_p',null,array('ng-model'=>'gasto_viaje_personal_smh_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_personal_smh_e_i',null,array('ng-model'=>'gasto_viaje_personal_smh_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_personal_smh_s_p',null,array('ng-model'=>'gasto_viaje_personal_smh_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_personal_smh_s_i',null,array('ng-model'=>'gasto_viaje_personal_smh_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_viaje_personal_smh_t_p',null,array('ng-model'=>'gasto_viaje_personal_smh_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_viaje_personal_smh_t_i',null,array('ng-model'=>'gasto_viaje_personal_smh_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('impuesto_aduanal_e_p',null,array('ng-model'=>'impuesto_aduanal_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_aduanal_e_i',null,array('ng-model'=>'impuesto_aduanal_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('impuesto_aduanal_s_p',null,array('ng-model'=>'impuesto_aduanal_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_aduanal_s_i',null,array('ng-model'=>'impuesto_aduanal_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('impuesto_aduanal_t_p',null,array('ng-model'=>'impuesto_aduanal_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('impuesto_aduanal_t_i',null,array('ng-model'=>'impuesto_aduanal_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('flete_e_p',null,array('ng-model'=>'flete_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_e_i',null,array('ng-model'=>'flete_e_i ','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('flete_s_p',null,array('ng-model'=>'flete_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_s_i',null,array('ng-model'=>'flete_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('flete_t_p',null,array('ng-model'=>'flete_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('flete_t_i',null,array('ng-model'=>'flete_t_i','class'=>'form-control')) !!}
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
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('seguro_e_p',null,array('ng-model'=>'seguro_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('seguro_e_i',null,array('ng-model'=>'seguro_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('seguro_s_p',null,array('ng-model'=>'seguro_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('seguro_s_i',null,array('ng-model'=>'seguro_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('seguro_t_p',null,array('ng-model'=>'seguro_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-info">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('seguro_t_i',null,array('ng-model'=>'seguro_t_i','class'=>'form-control')) !!}
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
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_proyecto_e_p',null,array('ng-model'=>'costo_proyecto_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_e_i',null,array('ng-model'=>'costo_proyecto_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_proyecto_s_p',null,array('ng-model'=>'costo_proyecto_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_s_i',null,array('ng-model'=>'costo_proyecto_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('costo_proyecto_t_p',null,array('ng-model'=>'costo_proyecto_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-warning">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('costo_proyecto_t_i',null,array('ng-model'=>'costo_proyecto_t_i','class'=>'form-control')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'></i><h4>GASTOS DE VENTA DEDICADOS</h4></label>
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_venta_dedicado_e_p',null,array('ng-model'=>'gasto_venta_dedicado_e_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_e_i',null,array('ng-model'=>'gasto_venta_dedicado_e_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_venta_dedicado_s_p',null,array('ng-model'=>'gasto_venta_dedicado_s_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_s_i',null,array('ng-model'=>'gasto_venta_dedicado_s_i','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-1'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>%</i></label>
                {!! Form::text('gasto_venta_dedicado_t_p',null,array('ng-model'=>'gasto_venta_dedicado_t_p','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-2'> 
            <div class="form-group label-floating has-success">
                <label class='control-label'><i class='material-icons'>monetization_on</i></label>
                {!! Form::text('gasto_venta_dedicado_t_i',null,array('ng-model'=>'gasto_venta_dedicado_t_i','class'=>'form-control')) !!}
            </div>
        </div>
</div>


    </div>
    </div>
    </div>
          <!--<div class="panel-footer">Panel Footer</div>-->
        </div>
      </div>
  </li>
</ul>
</div>
<!--
    </div>
        <div class="panel-footer"> </div>  
</div> -->