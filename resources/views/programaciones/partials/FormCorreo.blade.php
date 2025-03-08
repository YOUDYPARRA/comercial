{!! Form::model($objeto,['method'=>'PUT','action'=>['ProgramacionController@correo',$objeto->id]]) !!}
    {!! Form::hidden('calificacion','ENVIADO')!!}
    {!! Form::hidden('msj','NUEVO REPORTE DE SERVICIO PROGRAMADO PARA ATENCION'.$objeto->fecha_inicio.' '.$objeto->hora_atencion)!!}
    {!! Form::hidden('ruta_siguiente','programaciones')!!}
    {!! Form::hidden('nombre_tipo','programaciones')!!}
    <button type="submit" class="btn btn-success btn-sm" title="ENVIAR AVISO"><i class="material-icons">send</i></button>
{!!Form::close()!!}