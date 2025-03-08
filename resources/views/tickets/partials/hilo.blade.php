<div class="col-md-1">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>PRIORIDAD</label>
        {!!Form::select('prioridad',[1,2,3], null,['class'=>'form-control'])!!}
            {!! Form::hidden('clase',null) !!}
                {!! Form::hidden('id_foraneo',null) !!}
            @if($objeto->id)
                {!! Form::hidden('id',null) !!}
            @endif
    </div>
</div>
<div class="col-md-4">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>TITULO</label>
        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'NOMBRE/TÍTULO','readonly'=>'readonly']) !!}
    </div>
</div>
<div class="col-md-3">
    <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>MODULO</label>
            {!! Form::text('modulo',null,['class'=>'form-control','placeholder'=>'MODULO/SISTEMA']) !!}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>ATENCION</label>
            @if(count($departamento=Clasificaciones::listClasificacion(['clase'=>'revision','folio'=>'']))>=1)
                {!!Form::select('departamento',$departamento, null,['class'=>'form-control','placeholder'=>'ATENCION'])!!}
            @endif
    </div>
</div>
<div class="col-md-2">
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'></i>ESTADO</label>
            @if(count($clasificaciones=Clasificaciones::listClasificacion(['clase'=>'estado','folio'=>'']))>=1)
                {!!Form::select('estatus',$clasificaciones, null,['class'=>'form-control','placeholder'=>'ESTATUS'])!!}
            @endif
    </div>
</div>