{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('fecha_aprobacion_cobranza',util::getHoy())!!}                    
                    {!! Form::hidden('estatus','ACEPTADO')!!}
                    {!! Form::hidden('aviso','2')!!}
                    <button type="submit" class="btn btn-primary btn-xs" title="APROBAR"><i class="material-icons">done</i></button>
{!!Form::close()!!}