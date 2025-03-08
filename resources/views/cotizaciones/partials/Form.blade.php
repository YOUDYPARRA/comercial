<div class='form-group'>
    <%saludo %>
    <div class="col-sm-3">
    
        <div class="form-group">
            <label>ID</label>
            {!! Form::text('id',null,array('class'=>'form-control','id'=>'id')) !!}
        </div>
        
        <div class="form-group" >
            <label>CLIENTE <% nombre %></label>

            {!! Form::text('nombre_fiscal',null,array('required'=>'','class'=>'form-control','id'=>'nombre_fiscal', "ng-model"=>"fiscal","ng-change"=>"tercerosLst()")) !!}
        </div>
        
        <div class="form-group">
            <label>NÚMERO COTIZACIÓN</label>
            {!! Form::text('numero_cotizacion',null,array('required'=>'','class'=>'form-control','id'=>'numero_cotizacion')) !!}
        </div>
        
        <div class="form-group">
            <label>FECHA COTIZACIÓN</label>
            {!! Form::text('fecha',null,array('required'=>'','class'=>'form-control','id'=>'fecha')) !!}
        </div>
        
        <div class="form-group">
            <label>SUB TOTAL</label>
            {!! Form::text('subtotal',null,array('required'=>'','class'=>'form-control','id'=>'subtotal')) !!}
        </div>
        
        <div class="form-group">
            <label>IVA</label>
            {!! Form::text('iva',null,array('required'=>'','class'=>'form-control','id'=>'iva')) !!}
        </div>
        
        <div class="form-group">
            <label>TOTAL</label>
            {!! Form::text('total',null,array('required'=>'','class'=>'form-control','id'=>'total')) !!}
        </div>
        
        <div class="form-group">
            <label>APROBACIÓN VENTAS</label>
            {!! Form::text('aprobacion_ventas',null,array('required'=>'','class'=>'form-control','id'=>'aprobacion_ventas')) !!}
        </div>
        
        <div class="form-group">
            <label>FECHA APROBACIÓN DPTO VENTAS.</label>
            {!! Form::text('fecha_aprobacion_ventas',null,array('required'=>'','class'=>'form-control','id'=>'fecha_aprobacion_ventas')) !!}
        </div>
        
        <div class="form-group">
            <label>APROBACIÓN DTPO. MKT.</label>
            {!! Form::text('aprobacion_marketing',null,array('required'=>'','class'=>'form-control','id'=>'aprobacion_marketing')) !!}
        </div>
        
        <div class="form-group">
            <label>FECHA APROBACIÓN DPTO MKT.</label>
            {!! Form::text('fecha_aprobacion_marketing',null,array('required'=>'','class'=>'form-control','id'=>'fecha_aprobacion_marketing')) !!}
        </div>
        
        <div class="form-group">
            <label>VERSIÓN</label>
            {!! Form::text('version',null,array('required'=>'','class'=>'form-control','id'=>'version')) !!}
        </div>
        
        <div class="form-group">
            <label>NOMBRE EMPLEADO</label>
            {!! Form::text('nombre_empleado',null,array('required'=>'','class'=>'form-control','id'=>'nombre_empleado')) !!}
        </div>
        
        <div class="form-group">
            <label>ESTADO DE DOCUMENTO</label>
            {!! Form::text('estatus',null,array('required'=>'','class'=>'form-control','id'=>'estatus')) !!}
        </div>
        
        <div class="form-group">
            <label>CONTACTO</label>
            {!! Form::text('contacto',null,array('required'=>'','class'=>'form-control','id'=>'contacto')) !!}
        </div>
        
        <div class="form-group">
            <label>E-MAIL</label>
            {!! Form::text('correo',null,array('required'=>'','class'=>'form-control','id'=>'correo')) !!}
        </div>
        
        <div class="form-group">
            <label>TELÉFONO</label>
            {!! Form::text('telefono',null,array('required'=>'','class'=>'form-control','id'=>'telefono')) !!}
        </div>
        
        <div class="form-group">
            <label>CELULAR</label>
            {!! Form::text('celular',null,array('required'=>'','class'=>'form-control','id'=>'celular')) !!}
        </div>
        
        <div class="form-group">
            <label>TIPO MONEDA</label>
            {!! Form::text('tipo_moneda',null,array('required'=>'','class'=>'form-control','id'=>'tipo_moneda')) !!}
        </div>
        
        <div class="form-group">
            <label>TIPO CLIENTE</label>
            {!! Form::text('tipo_cliente',null,array('required'=>'','class'=>'form-control','id'=>'tipo_cliente')) !!}
        </div>
        
        <div class="form-group">
            <label>APROBACIÓN DPTO COBRANZA.</label>
            {!! Form::text('aprobacion_cobranza',null,array('required'=>'','class'=>'form-control','id'=>'aprobacion_cobranza')) !!}
        </div>
        
        <div class="form-group">
            <label>FECHA APROBACIÓN DPTO COBRANZA.</label>
            {!! Form::text('fecha_aprobacion_cobranza',null,array('required'=>'','class'=>'form-control','id'=>'fecha_aprobacion_cobranza')) !!}
        </div>
        
        <div class="form-group">
            <label>ID PARTNER</label>
            {!! Form::text('c_bpartner_id',null,array('required'=>'','class'=>'form-control','id'=>'c_bpartner_id')) !!}
        </div>
        
        <div class="form-group">
            <label>ID CONTACTO</label>
            {!! Form::text('c_location_id',null,array('required'=>'','class'=>'form-control','id'=>'c_location_id')) !!}
        </div>
        
        <div class="form-group">
            <label>ID CONTACTO</label>
            {!! Form::text('ad_user_id',null,array('required'=>'','class'=>'form-control','id'=>'ad_user_id')) !!}
        </div>
        
        <div class="form-group">
            <label>RFC</label>
            {!! Form::text('rfc',null,array('required'=>'','class'=>'form-control','id'=>'rfc')) !!}
        </div>
        
        <div class="form-group">
            <label>NOMBRE CLIENTE</label>
            {!! Form::text('nombre_cliente',null,array('required'=>'','class'=>'form-control','id'=>'nombre_cliente')) !!}
        </div>
        
        <div class="form-group">
            <label>CALLE</label>
            {!! Form::text('calle_entrega',null,array('required'=>'','class'=>'form-control','id'=>'calle_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>COLONIA</label>
            {!! Form::text('colonia_entrega',null,array('required'=>'','class'=>'form-control','id'=>'colonia_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>C.P.</label>
            {!! Form::text('codigo_postal_entrega',null,array('required'=>'','class'=>'form-control','id'=>'codigo_postal_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>CIUDAD ENTREGA</label>
            {!! Form::text('ciudad_entrega',null,array('required'=>'','class'=>'form-control','id'=>'ciudad_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>ESTADO</label>
            {!! Form::text('estado_entrega',null,array('required'=>'','class'=>'form-control','id'=>'estado_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>PAÍS</label>
            {!! Form::text('pais_entrega',null,array('required'=>'','class'=>'form-control','id'=>'pais_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>REPRESENTANTE LEGAL</label>
            {!! Form::text('representante_legal',null,array('required'=>'','class'=>'form-control','id'=>'representante_legal')) !!}
        </div>
        
        <div class="form-group">
            <label>FECHA ENTREGA</label>
            {!! Form::text('fecha_entrega',null,array('required'=>'','class'=>'form-control','id'=>'fecha_entrega')) !!}
        </div>
        
        <div class="form-group">
            <label>DPTO.</label>
            {!! Form::text('departamento',null,array('required'=>'','class'=>'form-control','id'=>'departamento')) !!}
        </div>
        
    </div>
</div>
