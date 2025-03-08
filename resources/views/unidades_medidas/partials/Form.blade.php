<div class="row">
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>OPERACION</label>
                {!! Form::select('p_codigo_edi',['C'=>'COMPRA','V'=>'VENTA',],null,['class'=>'form-control','required'=>'']) !!}
            </div>
        </div>
        <div class='col-md-3'> 
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>NOMBRE</label>
                {!! Form::text('p_name',null,array('class'=>'form-control','placeholder'=>'Nombre de la unidad','required'=>'')) !!}
            </div>
        </div>
</div> 