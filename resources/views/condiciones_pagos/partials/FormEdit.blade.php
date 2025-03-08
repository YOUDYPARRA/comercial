<div class='form-group'>
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
    @if(isset($objeto->id))
        <div class="form-group  has-info">
            {!! Form::hidden('id',null,array('readonly'=>'readonly','class'=>'form-control')) !!}
        </div>
        @endif
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>MARCA</label>
            {!! Form::select('id_marca',MarcasProveedores::getListMarcasProveedores(),$objeto->id_marca,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ETIQUETA</label>
            {!! Form::text('etiqueta',null,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> INSTITUTO</label>
            {!! Form::select('instituto',['PRIVADO'=>'PRIVADO','GOBIERNO'=>'GOBIERNO'],$objeto->instituto,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i>DESCRIPCIÓN CONDICIÓN</label>
            {!! Form::text('condicion',null,array('class'=>'form-control')) !!}
        </div>
        
    </div>
</div>
