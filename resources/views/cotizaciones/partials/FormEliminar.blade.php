{!! Form::model($objeto, ['route'=>['cotizaciones.destroy',$objeto->id],'method'=>'DELETE']) !!}
      <button type="submit" class="btn btn-danger btn-xs" title="ELIMINAR"><i class="material-icons">deleted</i></button>
{!! Form::close() !!}
