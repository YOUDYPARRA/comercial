<div class='form-group'>
    <div class="col-sm-3">
    @if(isset($objeto->id))
        <div class="form-group has-info">
            
            {!! Form::hidden('id',null,array('class'=>'form-control')) !!}
        </div>
        @endif
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> TIPO ÉNVIO</label>
            {!! Form::text('tipo_envio',null,array('class'=>'form-control')) !!}
        </div>
        
    </div>
</div>
