{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('calificacion','CANCELADO')!!}
                    {!! Form::hidden('estatus','CANCELADO')!!}
<button type="submit" class="btn btn-warning btn-xs" title="CANCELAR"><i class="material-icons">cancel</i></button>
{!!Form::close()!!}
