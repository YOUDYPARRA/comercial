{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    <button type="submit" class="btn btn-success btn-xs" title="SOLICITUD"><i class="material-icons">thumb_up</i></button>
                    {!! Form::hidden('estatus','SOLICITUD')!!}
                    {!! Form::hidden('aviso','2')!!}
                    {!! Form::hidden('reporte','1')!!}
{!!Form::close()!!}