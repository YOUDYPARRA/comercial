{!! Form::open(['route'=>['remisiones.archivar'],'files'=>'true']) !!}
	<div class="container">
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
       <div class="panel panel-heading">
           <h4>SUBIR ARCHIVO.</h4>           
       </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                            {!! Form::file('file')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('id',$objeto->id,array('class'=>'form-control')) !!}
                        {!! Form::hidden('numero_cotizacion',$objeto->numero_cotizacion,array('class'=>'form-control')) !!}
                        {!! Form::hidden('numero_orden_venta',$objeto->auto,array('class'=>'form-control')) !!}
                        
                    </div>
                </div>
            </div>
            <div class="panel panel-footer">
                {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
            </div>
    </div> 
</div>
<div class="container">
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
       @if($objeto->archivo_digital)
           <label class="has-info">ARCHIVO GUARDADO CORRECTAMENTE.</label>
       @endif
   </div>
</div>
{!!Form::close()!!}