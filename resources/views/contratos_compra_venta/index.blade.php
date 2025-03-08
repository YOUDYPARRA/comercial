@extends('app')
@section('content')
<!--<div class="container">
	<!--	<div class="row">
		<div class="col-md-14 col-md-offset-0">-->
			<div class="panel panel-info">
				<div class="panel-heading">CONTRATOS DE COMPRA VENTA</div>
				<div class="panel-body">
					{!!$objetos->render()!!}
					{!! Form::model(Request::all(),['route'=>'contratos_compra_venta.index','method'=>'GET']) !!}
					<table border="0" class="table table-striped">
    					<thead><tr>
							<td>
								<div class="form-group label-floating has-info">
            						<label class="control-label" for="numero_contrato_compra_venta">No. Contrato</label>
                					{!! Form::text('numero_contrato_compra_venta',null,array('class'=>'form-control','size'=>'5')) !!}
            					</div>
        					</td>
							<td>
									<button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
							</td>	
						</tr></thead>
					{!! Form::close() !!}
<!--FIN DE BUSQUEDA!-->
<!--INICIA INDEXADO!-->
					<table border="0" class="table table-striped" ng-controller="ContratoCompraVentaCtrl">
					    <thead><tr>
						    <th>ORGANIZACIÓN</th>	
						    <th>NO. COTIZACIÓN</th>	
							<th>NO. CONTRATO</th>	
						    <th>FECHA</th>		
						    <th>SOLICITANTE</th>
						    <th>NOMBRE FISCAL</th>
							<th></th>
							<th></th>
							<th></th>
						</tr></thead>
					    @foreach($objetos as $key =>$objeto)
						<tr>{{--!! $objeto !!--}}
							<td>{!! $objeto->organizacion!!}</td>
							<td>{!! $objeto->cotizacion->numero_cotizacion!!}</td>
							<td>{!! $objeto->numero_contrato_compra_venta !!}</td>
							<td>{!! $objeto->cotizacion->fecha !!}</td>	
							<td>{!! $objeto->cotizacion->iniciales_asignado!!}</td>
							<td>{!! $objeto->cotizacion->nombre_fiscal!!}</td>
							<td>
								<button type="button" ng-controller="contratoCompraVentaPdfCtrl" class="btn btn-info btn-xs" ng-click="openContrato({{$objeto->id}});" title="VER CONTRATO"><i class="material-icons">picture_as_pdf</i></button>
								<button type="button" ng-controller="contratoCompraVentaPdfAnexoCtrl" class="btn btn-info btn-xs" ng-click="openAnexo({{$objeto->id}});" title="VER ANEXO"><i class="material-icons">picture_as_pdf</i></button>
					            @can('acceso','contratos_compra_venta.edit')
					                <a href="{{ route('contratos_compra_venta.edit', $objeto->id)}}" type="button" class="btn btn-primary btn-xs" title="ACTUALIZAR CONTRATO"><i class="material-icons">cached</i></a> 
					            @endcan
					            @can('acceso','contratos_compra_venta.destroy')
					                <button type="button" class="btn btn-danger btn-xs" ng-init="contrato_compra_venta[{{$key}}].id={{ $objeto->id }}" ng-click="eliminar(contrato_compra_venta[{{$key}}])" title="ELIMINAR CONTRATO"><i class="material-icons">delete</i> </button>
					            @endcan
								<button type="button" ng-controller="PagareCtrl" class="btn btn-info btn-xs" ng-click="comprobarPagare({{$objeto->id_cotizacion}})"  title="Crear pagaré"><i class="material-icons">local_atm</i></button>
								<button type="button" ng-controller="pagarePdfCtrl" class="btn btn-info btn-xs" ng-click="openPagarePdf({{$objeto}})" title="VER PAGARE"><i class="material-icons">picture_as_pdf</i></button>
							</td>
							<td>
								{{--NOTIFICAR AL SOLICITANTE--}}
								{!! Form::model($objeto,['method'=>'PUT','action'=>['ContratoCompraVentaController@update',$objeto->id]]) !!}
				                    {!! Form::hidden('aviso','2')!!}
				                    {!! Form::hidden('estatus','ENTREGADO')!!}
				                    <button type="submit" class="btn btn-success btn-sm" title="AVISAR A COTIZADOR"><i class="material-icons">playlist_add_check</i></button>
								{!!Form::close()!!}
								{{--FIN NOTIFICAR AL SOLICITANTE--}}
								{{--SUBIR ARCHIVO--}}
								@can('acceso','digitalizaciones.create')
									<a href="digitalizaciones/create/{{$objeto->id}}?clase=CON" type="button" class="btn btn-primary btn-xs" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
								@endcan	
								@can('acceso','digitalizaciones.show')
									@foreach($objeto->digitalizaciones->where('clase','CON') as $dig)
										<a href="digitalizaciones/{{$dig->id}}" type="button" class="btn btn-success btn-xs" title="VER ARCHIVO"><i class="material-icons">cloud_download</i></a>								
									@endforeach								
								@endcan	
								{{--FIN SUBIR ARCHIVO--}}
							</td>
						</tr>
					    @endforeach
					</table>
					
				</div>				<!-- div BODY -->
				<div class="panel-footer"> 
				{!! $objetos->appends($request->all())->render() !!}
				</div>
			</div>
		<!--</div>
	</div>
</div>-->
@endsection