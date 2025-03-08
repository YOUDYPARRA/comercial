{!! Form::model($objeto,['method'=>'PUT','action'=>array('PrestamoController@estatus',$objeto->id)]) !!}
                    {!! Form::select('calificacion',['APROBADO'=>'APROBADO','DESAPROBADO'=>'DESAPROBADO','CERRAR'=>'CERRAR','CANCELAR'=>'CANCELAR'],null,array('class'=>'form-control','style'=>'font-size:12px;color:red')) !!}
                    {!! Form::hidden('ruta_siguiente','prestamos') !!}
                    {!! Form::hidden('clase','prestamos')!!}
        <button type="submit" class="btn btn-danger btn-lg" title="ACTUALIZAR ESTATUS"><i class="material-icons">refresh</i></button>
{!!Form::close()!!}