@extends('app')
@section('content')

	<div class="panel panel-info">
		<div class='panel-heading panel-info' > LISTADO RESGUARDOS<span class="badge">TOTAL: {{$objetos->total()}}</span></div>
		<div class='panel-body'>
    		<table border=0 class="table table-striped"><thead>
    			<tr>
					<th>ORDEN DE SERVICIO</th>	
					<th>FECHA</th>
					<th>CLIENTE</th>	
					<th>ASIGNO</th>	
					<th>MARCA</th>	
					<th>MODELO</th>	
					<th>COORDINACION</th>
					<th>ESTATUS</th>
					<th>RESPONSABLE(s)</th>
					<th>CAPTURAR CON REPORTE</th>
					<th></th>					
				</tr></thead>				
    @foreach($objetos as $objeto)
        <tr>
			<td>{!! $objeto->servicio->folio!!}</td>
			<td>{!! $objeto->servicio->fecha_recepcion!!}</td>
			<td>{!! $objeto->servicio->nombre_fiscal!!}</td>
			<td>{!! $objeto->servicio->autor!!}</td>
			<td>{!! $objeto->servicio->marca!!}</td>
			<td>{!! $objeto->servicio->modelo!!}</td>
			<td>{!! $objeto->servicio->coordinacion!!}</td>
			<td>{{$objeto->estatus}}</td>
			<td>
				{{$objeto->iniciales}}				
			</td>
			<td>
			{!! Form::model($objeto,['method'=>'GET','action'=>['ServicioController@captura']]) !!}
				{!! Form::hidden('servicio',$objeto->servicio->id,['readonly'=>'readonly','required'=>'','class'=>'form-group'])!!}
				{!! Form::select('programacion', $programas, null,['class'=>'form-group']) !!}
				<button type="submit" class="btn btn-info btn-lg" title="CAPTURAR"><i class="material-icons">accessible</i></button>
			{!! Form::close() !!} 
			</td>
			<td>
				<!--<button type="button" class="btn btn-info btn-lg" ng-controller="OrdenServicioPdfCtrl" ng-click="openOrdenServicioPdf()" title="IMPRIMIR ORDEN"><i class="material-icons">picture_as_pdf</i></button>-->
			</td>
			
		</tr>
    @endforeach
</table>
</div>
<div class="panel-footer"> 
</div>
</div>
@endsection
