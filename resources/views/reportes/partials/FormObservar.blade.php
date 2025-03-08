{!! Form::model(['nombre_tipo'=>'reporte','observaciones'=>$objeto->observacion,'id_producto'=>$objeto->id],['method'=>'POST','action'=>['ReporteController@observar']]) !!}
    @include('observaciones.partials.Form')
{!! Form::close() !!}