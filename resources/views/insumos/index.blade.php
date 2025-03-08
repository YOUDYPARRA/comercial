@extends('app')
@section('content')
{!! Form::model($request->all(),['route'=>'insumos.index','method'=>'GET']) !!}
<div class="container">
		<ul class="nav nav-pills" >
  			<li role="presentation" >
      				<div class="panel panel-info">
        				<div class="panel-heading">
          					<h4 class="panel-title"><a data-toggle="collapse" href="#collapse2"><i class="material-icons">search</i> BUSCAR</a></h4>
        				</div>
        				<div id="collapse2" class="panel-collapse collapse">
          					<div class="panel-body">          <!--INICIO CUERPO DEL PANEL!-->          
          						<div class="col-md-2">
            					  	<div class="form-group label-floating has-info">
            					        <label class="control-label" for="numero_contrato_compra_venta">Organización</label>
                    					{!! Form::select('categoria1',['SMH'=>'SMH','IMS'=>'IMS'],'',['class'=>'form-control'])!!}
            					    </div>
          						</div>
          						<div class="col-md-2">
              						<div class="form-group label-floating has-info">
                    					<label class="control-label" for="numero_contrato_compra_venta">Registro sanitario</label>    
                    					{!! Form::select('estado',['SI'=>'SI','NO'=>'NO'],'',['class'=>'form-control'])!!}
                					</div>
          						</div>
          						<div class="col-md-2">
            					  	<div class="form-group label-floating has-info">
            					        <label class="control-label" for="numero_contrato_compra_venta">Código</label>
            					        {!! Form::text('codigo_proovedor',null,['class'=>'form-control','size'=>'5','placeholder'=>'Código']) !!}
            					    </div>
          						</div>
          						<div class="col-md-2">
            					  	<div class="form-group label-floating has-info">
            					        <label class="control-label" for="numero_contrato_compra_venta">Marca</label>
            					        {!! Form::text('marca',null,['class'=>'form-control','placeholder'=>'Marca'])!!}
            					  	</div>
          						</div>
          						<div class="col-md-2">
            					  	<div class="form-group label-floating has-info">
            					        <label class="control-label" for="numero_contrato_compra_venta">Modelo</label>
            					        {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo'])!!}
            					  	</div>
          						</div>
          						<div class="col-md-2">
            					  	<div class="form-group label-floating has-info">
            					        <label class="control-label" for="numero_contrato_compra_venta">Descripción</label>
            					        {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción'])!!}
            					  	</div>
          						</div>
          						<div class="col-md-2">
              						<button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
          						</div>          
          					</div>			          <!--FIN CUERPO PANEL!-->
    						<div class="panel panel-footer"></div>
        				</div>
      				</div>
  			</li>
  		</ul>     
</div>    
{!! Form::close() !!}
	<div class="panel panel-info">
		<div class="panel-heading">PRODUCTOS</div>
		<div class="panel-body">
			<p>TOTAL INSUMOS: {{ $objetos->total()}}</p>
        	{!! $objetos->appends($request->all())->render() !!}
			<table border="0" class="table table-striped table-condensed">
				<tr>
					<th>Organización</th>	
					<th>#</th>	
					<th>Código</td>	
					<th>Tipo equipo</th>	
					<th>Marca</th>	
					<th>Modelo</th>	
					<th>Descripción</th>
					<th>Unidad de compra</th>
					<th>Costo de producto</th>	
					<th>Moneda de compra</th>	
					<th>Unidad de venta</th>
					<th>Precio de venta</th>
					<th>Moneda de venta</th>
					<th>RS</th>
					<th></th>	
					<th></th>	
				</tr>
				@foreach($objetos as $objeto)
				<tr>
					<td>{!! $objeto->categoria1!!}</td>	
					<td>{!! $objeto->bandera_insumo!!}</td>	
					<td>{!! $objeto->codigo_proovedor!!}</td>	
					<td>{!! $objeto->tipo_equipo!!}</td>	
					<td>{!! $objeto->marca!!}</td>	
					<td>{!! $objeto->modelo!!}</td>	
					<td>{!! $objeto->descripcion!!} </td>
					<td>{!! $objeto->unidad_compra!!}</td>
					<td>{!! $objeto->costos!!}</td>
					<td>{!! $objeto->costo_moneda!!} </td> 
					<td>{!! $objeto->unidad_medida!!}</td>
					<td>@if($objeto->multiprecios)
							@foreach($objeto->precios as $precio)
								{!! $precio->etiqueta!!} {!! $precio->monto!!}<br>
							@endforeach
						@else
							{!! $objeto->precio !!}
						@endif
					</td>
					<td>{!! $objeto->tipo_cambio !!}</td>
					<td>{!! $objeto->estado!!}</td>	                                                               
					<td>
                        @can('acceso','insumos.edit')
                            <a href="{{ route('insumos.edit', $objeto->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
                        @endcan                              
                    </td>
                    <td>
                        @can('acceso','insumos.show')
                            <a href="{{ route('insumos.show', $objeto->id)}}" type="button" class="btn btn-danger" ><i class="material-icons">delete</i></a>
                        @endcan
	                    @can('acceso','almacenstock.create')
							{!! link_to_route('almacenstock.create','CONTROL STOCK',['id'=>$objeto->id]) !!}
						@endcan
                    </td>
				</tr>
 				@endforeach
			</table>
			{!! $objetos->appends($request->all())->render() !!}
		</div>				<!-- div BODY -->
		<div class="panel-footer"> 
		 	<a type="button" class="btn btn-raised btn btn-info" href="{{ route('insumos.create') }}"><i class="material-icons">add_shopping_cart</i> AGREGAR</a>
		</div>
	</div>
@endsection