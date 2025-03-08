<div class='form-group'>
    <div class="col-sm-3">
    
        <div class="form-group label-floating has-info">
            @if(isset($id))
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ID</label>
            {!! Form::text('id',null,array('class'=>'form-control','readonly'=>'readonly')) !!}
            @endif
        </div>
        
        <div class="form-group">
            <label class='control-label'> EQUIPO o COORDINACION</label>
            {!! Form::select('linea',
                        [''=>'.',
                        'ULTRASONIDO'=>'ULTRASONIDO',
                        'MASTOGRAFIA'=>'MASTOGRAFÍA',
                        'RAYOS X'=>'RAYOS X',
                        'DENSITOMETRIA'=>'DENSITOMETRÍA',
                        'TOMOGRAFIA'=>'TOMOGRAFÍA',
                        'RESONANCIA MAGNETICA'=>'RESONANCIA MAGNÉTICA',
                        'FLUOROSCOPIA'=>'FLUOROSCOPÍA',
                        'HIT'=>'HIT',
                        'THINPREP'=>'THINPREP'],
                        null,['class'=>'text-info','class'=>'form-control','required'=>'','id'=>'tipo_equipo']) !!} 
        </div>
        
        <div class="form-group">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> COMPONENTE</label>
            {!! Form::text('componente',null,array('class'=>'form-control')) !!}
        </div>
        
    </div>
</div>
