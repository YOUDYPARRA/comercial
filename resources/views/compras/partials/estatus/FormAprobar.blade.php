{!! Form::model($objeto,['method'=>'PUT','action'=>['CompraController@estatus',$objeto->id]]) !!}
                    {!! Form::select('calificacion',['APROBADO'=>'APROBADO','DESAPROBADO'=>'DESAPROBADO'],null,array('class'=>'form-control','style'=>'font-size:12px;color:red')) !!}
        <button type="submit" class="btn btn-danger btn-xs" title="ACTUALIZAR ESTATUS"><i class="material-icons">refresh</i></button>
                    {!! Form::hidden('ruta_siguiente','compras.Index')!!}
{!!Form::close()!!}