{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
    {!! Form::hidden('estatus','AUTORIZADO')!!}
    {!! Form::hidden('reporte','1')!!}
    {!! Form::hidden('aviso','7')!!}
    <button type="submit" class="btn btn-success btn-xs" title="AUTORIZAR"><i class="material-icons">thumb_up</i></button>
{!!Form::close()!!}