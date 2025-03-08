@extends('app')
@section('content')
<div class="panel panel-info" ng-controller="NumeroAletraCtrl">
  	<div class="panel-heading">CALENDARIO:<span class="badge"></span> </div>
  	<div class="panel-body panel-info">

	<table border='1' class="table table-striped table-bordered table-list table-responsive">
		<thead>
			<tr>
				<th>No.</th>
				<th>Tarea</th>
				<th>Autor</th>
				<th>Estatus</th>
				{{--<th>Solicitado</th>--}}
				@foreach($fechas_arreglo as $l=> $fecha ){{$fecha}}
					@if($l==0)
						<th ng-init="diaSemana('{{$fecha}}')">{{--Fecha solicitud:--}} {{$--fecha--}} <%dia[{{$l}}]%></th>
					@else
						@if($l==count($fechas_arreglo)-1)
							<th ng-init="diaSemana('{{$fecha}}')">{{--Fecha compromiso:--}} {{--$fecha--}} <%dia[{{$l}}]%></th>
						@else
							<th ng-init="diaSemana('{{$fecha}}')">{{$fecha}} <%dia[{{$l}}]%>							</th>
						@endif
					@endif
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($arrobj as $i=> $objeto )
			<tr>
				<td>{{$i+1}}</td>
				<td>{{$objeto->nombre}}</td>
				<td>{{$objeto->autor}}</td>
				<td>{{$objeto->estatus}}</td>
				<td>{{--$objeto->created_at--}}</td>
				@foreach($fechas_arreglo as $j => $fecha )
					@if($objeto->procesando($fecha))
						<?php $dia= "<%dia[$j]%>"; ?>
						@if($dia=='Sábado' || $dia=='Domingo')
							<td bgcolor="#ff0000" align="center">x</td>
						@else
							@if ($i %2==0)  
								<td bgcolor="#00ddff" align="center">{{--$dia--}}{{--$j--}}</td>
							@else
								<td bgcolor="#99eebb" align="center">{{--$dia--}}</td>
							@endif
						@endif
					@else
						<td></td>
					@endif
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
		
	</div>
</div>
@endsection