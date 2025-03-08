{!! Form::model(['nombre_tipo'=>'reporte','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'PUT','action'=>['ReporteController@correo',$objeto->id]]) !!}
    {!! Form::hidden('nombre_tipo','reporte')!!}
    {!! Form::hidden('msj','Solicitud para modificar reporte')!!}
    {!! Form::hidden('ruta_siguiente','reportes.index')!!}
    {!! Form::hidden('calificacion','SOLICITUD')!!}
    <button type="submit" class="btn btn-info btn-xs" title="SOLICITAR MODIFICACION DE REPORTE"><i class="material-icons">send</i></button>
{!! Form::close() !!}