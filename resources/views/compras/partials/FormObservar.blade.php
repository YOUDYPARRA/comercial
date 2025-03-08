{!! Form::model(['nombre_tipo'=>'compra','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['CompraController@observar']]) !!}
	                    @include('observaciones.partials.Form')
	                {!! Form::close() !!}