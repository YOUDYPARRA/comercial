{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('estatus','CONCRETADO')!!}
                    {!! Form::hidden('aviso','6')!!}
                    <button type="submit" class="btn btn-success btn-xs" title="CONCRETADO"><i class="material-icons">thumb_up</i></button>
{!!Form::close()!!}