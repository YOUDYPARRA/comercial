    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('org_name',null,['class'=>'form-control','placeholder'=>'Organización'])!!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Fecha cotización'])!!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('numero_cotizacion',null,['class'=>'form-control','placeholder'=>'No. Cotización'])!!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('nombre_fiscal',null,['class'=>'form-control','placeholder'=>'Nombre fiscal'])!!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('nombre_cliente',null,['class'=>'form-control','placeholder'=>'Nombre sucursal/lugar'])!!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('estatus',null,['class'=>'form-control','placeholder'=>'Estatus'])!!}
        </div>
    </div>
    @if( isset($request->aprobacion) && $request->aprobacion!='')
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::text('nombre_empleado',null,['class'=>'form-control','placeholder'=>'Autor'])!!}
        </div>
    </div>
    @endif
    <div class="col-md-2">
        <div class="form-group has-info">
            {!!Form::text('reporte',null,['class'=>'form-control','placeholder'=>'No. Reporte'])  !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!! Form::select('clase', array(''=>'','CM'=>'MOLECULAR','CST'=>'SERVICIO TECNICO'), '$request->clase',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!!Form::text('no_pedido',null,['class'=>'form-control','placeholder'=>'PEDIDO CLIENTE'])  !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            {!!Form::text('total',null,['class'=>'form-control','placeholder'=>'TOTAL'])  !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-info">
            <button type="submit" class="btn btn-raised btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
        </div>
    </div>
