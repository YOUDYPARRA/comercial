{!! Form::model($objeto,['method'=>'POST','action'=>['VentaController@estatus',$objeto->id]]) !!}
                    {!! Form::hidden('calificacion','SURTIDO')!!}
                    {!! Form::hidden('ruta_siguiente','')!!}
                    <button type="submit" class="btn btn-success btn-sm" title="SURTIDO"><i class="material-icons">playlist_add_check</i></button>
{!!Form::close()!!}