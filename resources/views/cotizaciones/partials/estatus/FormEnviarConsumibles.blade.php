{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    <button type="submit" class="btn btn-primary btn-xs" title="ENVIAR"><i class="material-icons">send</i></button>
                    {!! Form::hidden('estatus','ENVIADO')!!}
                    {!! Form::hidden('fecha_aprobacion_ventas',util::getHoy())!!}
                    {!! Form::hidden('fecha_aprobacion_marketing',util::getHoy())!!}
                    {!! Form::hidden('fecha_aprobacion_cobranza','')!!}
                    {!! Form::hidden('aviso','5')!!}
{!!Form::close()!!}