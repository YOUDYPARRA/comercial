{!! Form::model(['nombre_tipo'=>'F','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['PrestamoController@observar']]) !!}
    @include('observaciones.partials.Form')
{!! Form::close() !!}