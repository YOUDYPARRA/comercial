@extends('app')
@section('content')
<div class="panel panel-info">
        <div class='panel-heading panel-info' > LISTADO DE EQUIPOS DEL CONTRATO:<span class="badge">{!! $objeto->folio_contrato!!}</span></div>
        <div class='panel-body'>

@can('acceso','contratos.destroy')
<h4><small>¿ELIMINAR CONTRATO DE SERVICIO?: {!! $objeto->folio_contrato!!}</small></h4>
    <table border=1 class="table table-striped">
    <thead><tr><td>
            {!! Form::model($objeto, ['route'=>['contratos.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                    </div>
                {!! Form::close() !!}
            </td>   
        </tr></thead>
    {{$objeto->observacion_detalle}}
    <tr>
        <th>ACTUALIZADO</th>
        <td>{{$objeto->updated_at}}</td>
    </tr>
    <th>CREADO</th>
        <td>{{$objeto->created_at}}</td>
    </tr>
</table>
@endcan
<table border=0 class="table table-striped">
    <thead>
        <tr>
            <th>#..</th>
            <th>FOLIO</th>
            <th>CLIENTE</th>
            <th>DIRECCION</th>
            <th>FECHA ATENCION</th>
            <th>EQUIPO</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>SERIE</th>
            <th>TIPO SERV.</th>
            <th>COORDINACION</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($objeto->r_conts_eqps as $eq_f_serv)
            <tr>
                <td>{!! $objeto->folio_contrato!!}</td>
                <td>{!! $objeto->instituto!!}</td>
                <td>{!! $eq_f_serv->nombre_fiscal!!}</td>
                <td>{!! $eq_f_serv->nombre_cliente!!}</td>
                <td>{!! $eq_f_serv->fecha_inicio !!}  {!! $eq_f_serv->fecha_fin!!}</td>
                <td>{!! $eq_f_serv->equipo!!}</td>
                <td>{!! $eq_f_serv->marca!!}</td>
                <td>{!! $eq_f_serv->modelo!!}</td>
                <td>{!! $eq_f_serv->numero_serie!!}</td>
                <td>{!! $eq_f_serv->tipo_servicio!!}</td>
                <td>{!! $eq_f_serv->coordinacion!!}</td>
                <td></td>
            </tr>           
        @endforeach
            
    </tbody>
</table>
</div>
</div>
@endsection