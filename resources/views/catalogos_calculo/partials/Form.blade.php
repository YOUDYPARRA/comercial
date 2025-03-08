<div class="panel panel-info">
<div class='panel-heading'><i class="material-icons">assignment</i> CATÁLOGO FLETE </div>
<div class='panel-body'>
        @if(isset($id))
            {!! Form::hidden('id','null',array('ng-init'=>'catalogo_calculo.id='.$id,'ng-model'=>'catalogo_calculo.id','class'=>'form-control')) !!}
        @endif
       
        <div class="form-group label-floating has-info">
            <!--<label class='control-label'><i class='material-icons'>create</i> MODELO</label>-->
            {!! Form::text('modelo',null,array('ng-model'=>'catalogo_calculo.modelo','class'=>'form-control')) !!}
        </div>
        
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> FLETE </label>
            {!! Form::text('flete',null,array('ng-model'=>'catalogo_calculo.flete','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
</div>
        <div class="panel-footer"> </div>  
</div>
<div class="panel panel-info">
<div class='panel-heading'><i class="material-icons">assignment</i> CATÁLOGO IMPUESTOS ADUANALES </div>
<div class='panel-body'>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> FRACCIÓN ARANCELARIA</label>
            {!! Form::text('fraccion_arancelaria',null,array('ng-model'=>'catalogo_calculo.fraccion_arancelaria','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> IGI/IGE (%)</label>
            {!! Form::text('igi_ige',null,array('ng-model'=>'catalogo_calculo.igi_ige','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> DTA (%)</label>
            {!! Form::text('dta',null,array('ng-change'=>'calImpuestosImportacion()','ng-model'=>'catalogo_calculo.dta','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> HONORARIOS AGENTE ADUANAL (%)</label>
            {!! Form::text('h_agente_aduanal',null,array('ng-model'=>'catalogo_calculo.h_agente_aduanal','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> IVA (%)</label>
            {!! Form::text('iva',null,array('ng-model'=>'catalogo_calculo.iva','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> PORCENTAJE EN IMPUESTO DE IMPORTACIÓN (%)</label>
            {!! Form::text('porcentaje_impuesto_importacion',null,array('ng-model'=>'catalogo_calculo.porcentaje_impuesto_importacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
    </div>
</div>
        <div class="panel-footer"> 
            
        </div>  
</div>
<div class="panel panel-info">
<div class='panel-heading'><i class="material-icons">assignment</i> CATÁLOGO HORAS CS </div>
<div class='panel-body'>
    <div class="row">
        <div class='col-md-3'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> TIEMPO PREVENTIVO</label>
            {!! Form::text('tiempo_preventivo',null,array('ng-model'=>'catalogo_calculo.tiempo_preventivo','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-3'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> PREVENTIVOS EN UN AÑO</label>
            {!! Form::text('preventivo_anual',null,array('ng-change'=>'calManoObraHrs()','ng-model'=>'catalogo_calculo.preventivo_anual','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-3'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> INGENIEROS DURANTE LA INSTALACIÓN</label>
            {!! Form::text('ingeniero_instalacion',null,array('ng-model'=>'catalogo_calculo.ingeniero_instalacion','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-3'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> TIEMPO DE INSTALACIÓN</label>
            {!! Form::text('tiempo_instalacion',null,array('ng-model'=>'catalogo_calculo.tiempo_instalacion','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
            {!! Form::hidden('usuario',null,array('ng-model'=>'catalogo_calculo.usuario','class'=>'form-control')) !!}
        </div>
        </div>
    </div>        
            
        
</div>
        <div class="panel-footer"> 
            
        </div>  
</div>

<div class="panel panel-info">
<div class='panel-heading'><i class="material-icons">assignment</i> CATÁLOGO INSTALACIÓN Y GARANTÍA </div>
<div class='panel-body'>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> COSTO HORA (USD)</label>
            {!! Form::text('costo_hora',null,array('ng-change'=>'calManoObraUsd()','ng-model'=>'catalogo_calculo.costo_hora','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>    
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> TIEMPO DE INSTALACIÓN TOTAL (HRS)</label>
            {!! Form::text('tiempo_instalacion_total',null,array('ng-model'=>'catalogo_calculo.tiempo_instalacion_total','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> TIEMPO DE VIAJE PROMEDIO PARA INSTALACIÓN (HRS)</label>
            {!! Form::text('tiempo_viaje_instalacion',null,array('ng-model'=>'catalogo_calculo.tiempo_viaje_instalacion','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> COSTO DE VISITA AL SITIO DE PROYECTOS (USD)</label>
            {!! Form::text('costo_visita_proyectos',null,array('ng-change'=>'calCostoInstalacion()','ng-model'=>'catalogo_calculo.costo_visita_proyectos','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> IMPUESTO DE IMPORTACIÓN REFACCIONES (%)</label>
            {!! Form::text('impuesto_importacion_refacciones',null,array('ng-model'=>'catalogo_calculo.impuesto_importacion_refacciones','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group label-floating has-info">
            <label class='control-label'><i class='material-icons'>create</i> COSTO DE PARTES (USD)</label>
            {!! Form::text('costo_parte',null,array('ng-change'=>'calImportacionPartes()','ng-model'=>'catalogo_calculo.costo_parte','class'=>'form-control','placeholder'=>'SOLO NÚMEROS','numbers-only','ng-required'=>'si')) !!}
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> COSTO DE INSTALACIÓN (USD)</label>
            {!! Form::text('costo_instalacion',null,array('ng-model'=>'catalogo_calculo.costo_instalacion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        
        <div class='col-md-4'>
        <div class="form-group  has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> MANO DE OBRA GARANTÍA (HRS)</label>
            {!! Form::text('mano_obra_garantia_hrs',null,array('ng-model'=>'catalogo_calculo.mano_obra_garantia_hrs','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> GASTO DE IMPORTACIÓN DE PARTES (USD)</label>
            {!! Form::text('gasto_importacion_partes',null,array('ng-model'=>'catalogo_calculo.gasto_importacion_partes','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> MANO DE OBRA GARANTÍA (USD)</label>
            {!! Form::text('mano_obra_garantia_usd',null,array('ng-model'=>'catalogo_calculo.mano_obra_garantia_usd','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> COSTOS DE GARANTÍA (USD)</label>
            {!! Form::text('costos_garantia',null,array('ng-model'=>'catalogo_calculo.costos_garantia','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
        <div class='col-md-4'>
        <div class="form-group has-warning">
            <label class='control-label'><i class='material-icons'>lock</i> TOTAL DE COSTOS DE INSTALACIÓN Y GARANTÍA (USD)</label>
            {!! Form::text('total_costo_instalacion_garantia',null,array('ng-model'=>'catalogo_calculo.total_costo_instalacion_garantia','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
        </div>
    </div>
</div>
        <div class="panel-footer"> 
        </div>
        </div>

