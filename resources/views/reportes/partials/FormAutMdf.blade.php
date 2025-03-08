{!! Form::model(['nombre_tipo'=>'reporte','id_producto'=>$objeto->id],['method'=>'PUT','action'=>['ReporteController@correo',$objeto->id]]) !!}
    <button type="submit" class="btn btn-info btn-xs" title="AUTORIZAR "><i class="material-icons">send</i></button>
    {!! Form::hidden('nombre_tipo','reporte')!!}
    {!! Form::hidden('msj','Autorizacion para modificar reporte')!!}
    {!! Form::hidden('ruta_siguiente','reportes.index')!!}
    {!! Form::hidden('calificacion','AUTORIZADA')!!}
    {!! Form::hidden('vi','0')!!}
    {!! Form::hidden('modificable','1')!!}
{!! Form::close() !!}