@extends('app')
@section('content')
<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>#</th>
					<th>EQUIPO</th>
					<th>MARCA</th>
					<th>MODELO</th>
					<th>SERIE</th>	
					<th>FECHA INCIO</th>
					<th>FECHA FIN</th>
					<th>TIPO SERVICIO</th>
				</tr>
				</thead>
    @foreach($objeto->r_conts_eqps as $ob)
	    <tr>
			<th>{{$ob->id}}</th>
			<th>{{$ob->equipo}}</th>
			<th>{{$ob->marca}}</th>
			<th>{{$ob->modelo}}</th>
			<th>{{$ob->numero_serie}}</th>
			<th>{{$ob->fecha_inicio}}</th>
			<th>{{$ob->fecha_fin}}</th>
			<th>{{$ob->tipo_servicio}}</th>
			
		</tr>
    @endforeach
    </table>
<div class="panel panel-info">
	<div class='panel-heading'><i class='material-icons'>DETALLE CAPTURA</div>
	<div class='panel-body'>
		<div class="container">
		<div class="span8">
			
		</div>
			<div class="row">
	          <div class="col-sm-4">
	          	<h4>{{$objeto->equipo}} <span class="label label-default">{{$objeto->marca}}</span></h4>
	          </div>
	          <div class="col-sm-4">
	          	<h4><span class="label label-default">{{$objeto->modelo}}</span></h4>
	          </div>
	          <div class="col-sm-4">
	          	<h4> <span class="label label-default">{{$objeto->numero_serie}}</span></h4>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-3">
	          	<h5>CONTRATO: {{$objeto->folio_contrato}} {{$objeto->folio_contrato_venta}}</h5>
	          	<h5>{{$objeto->autor}}</h5>
	          	<h5>{{$objeto->created_at}}</h5>
	          	<h5>{{$objeto->updated_at}}</h5>
	          	
	          </div>
	          <div class="col-md-5">
	          	<h5>{{$objeto->nombre_fiscal}}</h5>
	          	<h5>{{$objeto->rfc}}</h5>
				<h5>{{$objeto->calle_fiscal}}</h5>
				<h5>{{$objeto->colonia_fiscal}}</h5>
				<h5>{{$objeto->c_p_fiscal}}</h5>
				<h5>{{$objeto->ciudad_fiscal}}</h5>
				<h5>{{$objeto->estado_fiscal}}</h5>
				<h5>{{$objeto->pais_fiscal}}</h5>
				<h5>{{$objeto->numero_fiscal}}</h5>
	          </div>
	          <div class="col-md-4"></div>
	          	<h5>{{$objeto->nombre_cliente}}</h5>
	            <h5>{{$objeto->calle}}</h5>
	            <h5>{{$objeto->colonia}}</h5>
	            <h5>{{$objeto->c_p}}</h5>
	            <h5>{{$objeto->ciudad}}</h5>
	            <h5>{{$objeto->estado}}</h5>
	            <h5>{{$objeto->pais}}</h5>
	            <h5>{{$objeto->numero}}</h5>
	            <h5>{{$objeto->numero_exterior}}</h5>
	        </div>			
		</div>
	</div>
	<div class="panel-footer">
		{!! link_to_route('expendios.index','REGRESAR') !!}

	</div>
</div>
@endsection