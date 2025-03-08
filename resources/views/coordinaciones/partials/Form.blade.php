<div class='form-group'>
    <div class="col-sm-3">
    
        <div class="form-group label-floating has-info">
            <label class='control-label'></label>
            @if(isset($id))
                {!! Form::text('id',null,array('class'=>'form-control','placeholder'=>'id')) !!}
            @endif
            @if(isset($objeto->nombre))
            <div class="form-group has-info">
            <label>Nombre Coordinacion</label>
                {!! Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'nombre')) !!}
            </div>            
            @else
            <div class="form-group has-info">
            <label>Nombre Coordinacion</label>
                {!! Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'nombre')) !!}
            </div>
            @endif
            <div class="form-group has-info">
            {!! Form::text('atributo',null,array('class'=>'form-control','placeholder'=>'atributo')) !!}
            </div>
            <div class="form-group has-info">
                <label>Coordinacion de equipo</label>
                @if(isset($objeto->coordinacion))
                    {!! Form::select('coordinacion',equipos::getEquipos(), $objeto->coordinacion,['class'=>'form-control'])!!}
                @else
                    {!! Form::select('coordinacion',equipos::getEquipos(),'',['class'=>'form-control']) !!}
                @endif
            </div>
            <div class="form-group has-info">
            {!! Form::text('modelo',null,array('class'=>'form-control','placeholder'=>'modelo')) !!}
            </div>
        </div>
        
    </div>
</div>
