{!! Form::model(['nombre_tipo'=>'cotizacion','observaciones'=>$objeto->observaciones,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['CotizacionController@observar']]) !!}
    @include('observaciones.partials.Form')
{!! Form::close() !!}