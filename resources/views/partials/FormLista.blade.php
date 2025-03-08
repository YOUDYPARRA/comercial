		        <label>Documentos relacionados</label>
		        @if($objetos)
			        <table border=0 class="table table-striped"><thead>
					    <tr>
						<td>Número Único</td>	
						<td>CLIENTE</td>	
						<td>FOLIO DOCUMENTO</td>
						<td>ATENCION </td>	
						<td>ATIENDE</td>
						<td>COORDINACION</td>
						<td>GENERÓ</td>	
						<td> CREACIÓN</td>
						</tr>
						</thead>
					    @foreach($objetos as $objeto)
						 <tr>
							<td>{!! $objeto->id!!}</td>
							<td>{!! $objeto->nombre_fiscal!!}</td>
							<td>
							@if($objeto->clase=='S')
								{{'ORDEN DE SERVICIO'}}
							@endif
							@if($objeto->clase=='P')
								{{'REPORTE PROGRAMADO'}}
							@endif
							@if($objeto->clase=='F')
								{{'PRESTAMO'}}
							@endif
							@if($objeto->clase=='E')
								{{'ENTRADA EQUIPO'}}
							
							@endif
							{!! $objeto->folio!!}
							{!! $objeto->estatus!!}
							</td>
							<td>{!! $objeto->fecha_inicio !!} {!! $objeto->fecha_fin !!} {!! $objeto->hora_atencion !!}</td>
							<td>
							@foreach($objeto->personas_servicio as $atiende)
								{!! $atiende->iniciales !!}
							<br>
							@endforeach						
							</td>
							<td>{!! $objeto->coordinacion!!}</td>
							<td>{!! $objeto->autor!!}</td>
							<td>{!! $objeto->created_at!!}</td>
						</tr>
						@endforeach
					</table>
				@endif