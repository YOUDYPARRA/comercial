{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('estatus','ENVIADO')!!}
                    {!! Form::hidden('fecha_aprobacion_ventas','')!!}
                    {!! Form::hidden('fecha_aprobacion_marketing','')!!}
                    {!! Form::hidden('fecha_aprobacion_cobranza','')!!}
                    {!! Form::hidden('aviso','5')!!}
    <button type="submit" class="btn btn-primary btn-xs" title="ENVIAR"><i class="material-icons">send</i></button>
{!!Form::close()!!}