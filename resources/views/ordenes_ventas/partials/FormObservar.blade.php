{!! Form::model(['nombre_tipo'=>'orden_venta','observaciones'=>$objeto->observaciones,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['VentaController@observar']]) !!}
	                    @include('observaciones.partials.Form')
{!! Form::close() !!}