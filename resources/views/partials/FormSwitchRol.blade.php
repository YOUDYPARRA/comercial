@can('acceso','users.switch_rol')
  @if(count(roles::opciones())>=1)
    {!! Form::open(['method'=>'PUT','action'=>['Admin\UserController@switch_rol']]) !!}
      <li>{!! Form::select('id', roles::opciones() ) !!}</li>
      {!! Form::submit('Guardar',array('class'=>'btn btn-success')) !!}
    {!! Form::close() !!}
    @else
    <li>{!! Form::select('id', roles::opciones() ) !!}</li>
  @endif
@endcan
