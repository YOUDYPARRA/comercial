@extends('app')
@section('content')
<div class="container">
    {!! Form::open(['route'=>['cotizaciones_digitales.store'],'files'=>'true']) !!}
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
       <div class="panel panel-heading">
           <h4>SUBIR CONFIRMACION DE CLIENTE.</h4>           
       </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                            {!! Form::file('file')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('id',$cotizacion->id,array('required'=>'','class'=>'form-control','id'=>'id')) !!}
                    </div>
                </div>
            </div>
            <div class="panel panel-footer">
                {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
            </div>
       
    </div> 
    {!! Form::close() !!}
</div>
<div class="container">
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
       @if(isset($cotizacion->cotizacion_digital))
           <label class="has-info">ARCHIVO GUARDADO CORRECTAMENTE.</label>
       @endif
   </div>
</div>
@endsection
