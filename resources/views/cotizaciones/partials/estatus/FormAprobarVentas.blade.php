{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('fecha_aprobacion_ventas',util::getHoy())!!}
                    {!! Form::hidden('fecha_aprobacion_marketing','')!!}
                    {!! Form::hidden('fecha_aprobacion_cobranza','')!!}
                    {!! Form::hidden('estatus','APROBADO')!!}
                    {!! Form::hidden('aviso','4')!!}
                    <button type="submit" class="btn btn-primary btn-xs" title="APROBAR"><i class="material-icons">done</i>APROBAR</button>
{!!Form::close()!!}