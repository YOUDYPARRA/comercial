<div class='form-group'>
    <div class="col-sm-3">
    
        <div class="form-group has-info">
            {!! Form::hidden('id',null,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group  has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> AGENTE ADUANAL</label>
            {!! Form::text('agente_aduanal',null,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> UBICACIÓN</label>
            {!! Form::text('ubicacion',null,array('class'=>'form-control')) !!}
        </div>
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> TELEFONO</label>
            {!! Form::text('telefono',null,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> FAX</label>
            {!! Form::text('fax',null,array('class'=>'form-control')) !!}
        </div>
        
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> CORREO ELECTRONICO</label>
            {!! Form::text('email',null,array('class'=>'form-control')) !!}
        </div>
        
    </div>
</div>
