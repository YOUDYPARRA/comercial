<div class='form-group'>
    <div class="col-sm-3">

        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> ID</label>
            {!! Form::text('id',null,array('readonly'=>'readonly','class'=>'form-control')) !!}
        </div>

        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> NOMBRE DE ROL</label>
            {!! Form::text('id_rol',null,array('class'=>'form-control')) !!}
            {!! Form::select('id_rol',util::roles(),null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>nombre_icono</i> USUARIO</label>
            {!! Form::text('id_usuario',null,array('class'=>'form-control')) !!}
            {!! Form::select('id_usuario',BuscarUsuario::usuarios(),null,['class'=>'form-control']) !!}
        </div>

    </div>
</div>
