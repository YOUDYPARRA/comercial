{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                    {!! Form::hidden('aviso','2')!!}
                    {!! Form::hidden('estatus','ENTREGADO')!!}
                    <button type="submit" class="btn btn-success btn-sm" title="AVISAR A COTIZADOR"><i class="material-icons">playlist_add_check</i></button>
{!!Form::close()!!}