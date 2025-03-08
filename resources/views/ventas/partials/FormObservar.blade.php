{!! Form::model(['nombre_tipo'=>'venta','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['VentaController@observar']]) !!}
	                    @include('observaciones.partials.Form')
{!! Form::close() !!}