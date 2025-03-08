{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}                    
        {!! Form::hidden('estatus','APROBADO')!!}
        {!! Form::hidden('fecha_aprobacion_marketing',util::getHoy())!!}
        {!! Form::hidden('aviso','5')!!}
        <button type="submit" class="btn btn-primary btn-xs" title="APROBAR"><i class="material-icons">done_all</i>AAPROBAR</button>
{!!Form::close()!!}