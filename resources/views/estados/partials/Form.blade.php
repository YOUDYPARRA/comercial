<div class='form-group'>
<div class="row">
    <div class="col-sm-1">
        </div>
        <div class="col-sm-3">
            
                <div class="form-group">
                @if(isset($id) )
                    <label>ID</label>
                    {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id')) !!}
                @endif
                </div>
            <div class="form-group">
                <label>ORGANIZACION</label>
                        {!! Form::text('organizacion','SMH',array('class'=>'form-control')) !!}
            </div>
                <div class="form-group">
                    <label>CLASE</label>
                    {!! Form::text('clase',null,array('class'=>'form-control','required')) !!}
                     
                </div>
                <div class="form-group">
                    <label>SUBCLASE</label>
                    {!! Form::text('subclase',null,array('class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    <label>ESTADO</label>
                    {!! Form::text('estado',null,array('class'=>'form-control')) !!}                

                </div>
        </div>
        <div class="col-sm-3">
                    <label><h3>PROCESADOR</h3><h6>Este usuario obtiene boton cuando el documento tiene esta condicionante y condicion(puesto - tipo puesto) </h6></label>
                    <div class="form-group">
                        <label>CONDICIONANTE</label>
                        {!! Form::text('condicionante',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label>CONDICION</label>
                        {!! Form::text('condicion',null,array('class'=>'form-control')) !!}
                    </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>APROBADO</label>
                {!! Form::text('aprobacion',null,array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                <label>ETIQUETA APROBADO</label>
                {!! Form::text('etiqueta_aprobacion',null,array('class'=>'form-control')) !!}
            </div>                    
            <div class="form-group">
                <label>ETIQUETA DESAPROBADO</label>
                {!! Form::text('etiqueta_desaprobacion',null,array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                    <label>DESAPROBADO</label>
                    {!! Form::text('desaprobacion',null,array('class'=>'form-control')) !!}
            </div>
        </div>
    
</div>    
</div>
<div class="row">
    
<div class='form-group'>
    <div class="col-sm-2">
        <div class="form-group">
            <label>Condicionante Documento</label>
            {!! Form::text('dcondicionante',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
                <label>Condicion Documento</label>
                {!! Form::text('dcondicion',null,array('class'=>'form-control')) !!}
            </div>
    </div>
</div>
</div>

<div class='form-group'>

        <div class="col-sm-3">
        </div>
        
    <div class="row">
    <div class="container">
        <div class="col-sm-10">
                    <label><h3>AVISAR</h3><h6>Este usuario recibe correo electronico cuando este estado es usado (si no se llena se usa el mismo de procesa) siempre y cuando este tenga el permiso de la ruta </h6></label>
                    <div class="form-group">
                        <label>CONDICIONANTE</label>
                        {!! Form::text('tipo_busqueda_aviso',null,array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label>CONDICION</label>
                        {!! Form::text('condicion_aviso',null,array('class'=>'form-control')) !!}
                    </div>
        </div>        
    </div>
    </div>
</div>