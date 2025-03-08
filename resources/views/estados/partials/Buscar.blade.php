{!! Form::model(Request::all(),['route'=>'estado.index','method'=>'GET']) !!}
<div class="form-group label-floating has-info">
    <div class="col-sm-4">
        <div class="form-group">
                <label>RECURSO</label>
                {!! Form::text('recurso',null,array('class'=>'form-control')) !!}
            </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ETIQUETA</label>
            {!! Form::text('etiqueta',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CLASE</label>
            {!! Form::text('clase',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label>CONDICION</label>
            {!! Form::text('condicion',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ESTADO</label>
            {!! Form::text('estado',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>SUB CLASE</label>
            {!! Form::text('subclase',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CONDICIONANTE DOC.</label>
            {!! Form::text('dcondicionante',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CONDICION DOC.</label>
            {!! Form::text('dcondicion',null,array('class'=>'form-control')) !!}
        </div>
    </div>
                <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
</div>
<hr>
{!! Form::close() !!}