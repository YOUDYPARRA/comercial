{!!Form::select('aprobador[]',$aprobadores, null, ['multiple' => true])!!}
{!! Form::hidden('estatus','ENVIADO')!!}
    <button type="submit" class="btn btn-primary btn-xs" title="ENVIAR"><i class="material-icons">send</i></button>