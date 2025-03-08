{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
    {!! Form::textarea('nota',null,['size'=>'10x2'])!!}
                    <button type="submit" class="btn btn-info btn-sm" title="AGREGAR OBSERVACION"><i class="material-icons">message</i></button>
{!!Form::close()!!}