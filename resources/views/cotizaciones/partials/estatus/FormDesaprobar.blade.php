{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
    {!! Form::hidden('fecha_aprobacion_ventas',util::getHoy())!!}
    {!! Form::hidden('fecha_aprobacion_marketing','')!!}
    {!! Form::hidden('fecha_aprobacion_cobranza','')!!}
    {!! Form::hidden('estatus','DESAPROBADO')!!}
    {!! Form::hidden('aviso','1')!!}
    <button type="submit" class="btn btn-warning btn-xs" title="RECHAZAR"><i class="material-icons">clear</i></button>
{!!Form::close()!!}