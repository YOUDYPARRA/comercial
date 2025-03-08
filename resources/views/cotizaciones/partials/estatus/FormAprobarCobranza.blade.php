{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    <button type="submit" class="btn btn-primary btn-xs" title="APROBAR"><i class="material-icons">done</i></button>
                    {!! Form::hidden('fecha_aprobacion_cobranza',util::getHoy())!!}                    
                    {!! Form::hidden('estatus','APROBADO')!!}
                    {!! Form::hidden('aviso','2')!!}
{!!Form::close()!!}