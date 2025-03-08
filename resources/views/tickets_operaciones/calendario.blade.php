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
				@foreach($fechas_arreglo as $l=> $fecha )
					@if($l==0)
						<th ng-init="diaSemana('{{$fecha}}')">{{--Fecha solicitud:--}} {{$fecha}} <%dia[{{$l}}]%></th>
					@else
						@if($l==count($fechas_arreglo)-1)
							<th ng-init="diaSemana('{{$fecha}}')">{{--Fecha compromiso:--}} {{$fecha}} <%dia[{{$l}}]%></th>
						@else
							<th ng-init="diaSemana('{{$fecha}}')">{{$fecha}} <%dia[{{$l}}]%>							</th>
						@endif
					@endif
				@endforeach
			</tr>
		</thead>
		<tbody>
			{{--print_r($objeto->id)--}}
			<tr ng-init="diferenciaDias('{{$objeto->created_at}}','{{$objeto->compromiso}}')">
				<td>CABECERA</td>
				<td>{{$objeto->nombre}}{{$objeto->id}}</td>
				<td>{{$objeto->autor}}</td>
				<td>{{$objeto->estatus}}</td>
				<%di%>
				<?php $k=0;$n=0;$ent=[];
				$n= "<% di | number:2%>"; 
				//$in=floatval($n);
				echo $n."=>";
				while($k < $n){  
				echo '<td bgcolor="#00cc00" align="center">'.$k.'</td>';
				 $k++;
				}
				 ?>
			</tr>
			@foreach($objeto->hilos()->orderBy('compromiso')->get() as $i=> $o )
			<tr>
				<td>{{$i+1}}</td>
				<td>{{$o->nombre}}{{$o->id}}</td>
				<td>{{$o->autor}}</td>
				<td>{{$o->estatus}}</td>
				@foreach($fechas_arreglo as $j => $fecha )
					@if($o->procesando($fecha))
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