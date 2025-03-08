<div class="row">
  {!! Form::model([],['method'=>'PUT','action'=>['CotizacionController@proceso',$objeto->id]]) !!}
        <span class="badge badge-info">COTIZACION: {!!Form::checkbox('cotizacion','true',$objeto->cotizacion)!!}</span><br>
        <span class="badge badge-primary">VENTA: {!!Form::checkbox('VENTA','venta',$objeto->venta)!!}</span><br>
        <span class="badge badge-warning">COMPRA: {!!Form::checkbox('COMPRA','compra',$objeto->venta)!!}</span><br>
        <span class="badge badge-success">VENTA COMPRA: {!!Form::checkbox('venta_compra', 'VENTA_COMPRA',$objeto->venta_compra)!!}</span>
        <button type="submit" class="btn btn-warning btn-sm" title="GUARDAR"><i class="material-icons">check</i></button>
  {!! Form::close() !!}
</div>
