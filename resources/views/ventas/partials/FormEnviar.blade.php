{!! Form::model($objeto,['method'=>'POST','action'=>['VentaController@estatus',$objeto->id]]) !!}
                    {!! Form::hidden('calificacion','ENVIADO')!!}
                    {!! Form::hidden('ruta_siguiente','ventas.enviado')!!}
                    <button type="submit" class="btn btn-success btn-xs" title="ENVIAR"><i class="material-icons">send</i></button>
{!!Form::close()!!}