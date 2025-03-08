<!--<h4><small>LISTADO </small></h4>-->
    <table border=0 class="table table-striped">
    <thead>
    <tr>
    	<!--<td>id</td>	
		<td>p_uom_id</td>	
		<td>p_user_id</td>	-->
		<th>OPERACION</th>	
		<th>NOMBRE</th>	
		<!--<td>SIMBOLO</td>	
		<td>DESCRIPCION</td>	
		<td>DECIMALES TOTALES</td>	
		<td>DECIMALES COSTEO</td>	
		<td>TIPO UNIDAD</td>	-->
		<td></td>
		<td></td>
	</tr>
</thead>
    
    @foreach($objetos as $objeto)
<tr>
	<!--<td>{!! $objeto->id!!}</td>	
	<td>{!! $objeto->p_uom_id!!}</td>	
	<td>{!! $objeto->p_user_id!!}</td>	-->
	<td>{!! $objeto->p_codigo_edi!!}</td>	
	<td>{!! $objeto->p_name!!}</td>	
	<!--<td>{!! $objeto->p_symbol!!}</td>	
	<td>{!! $objeto->p_description!!}</td>	
	<td>{!! $objeto->p_std_precision!!}</td>	
	<td>{!! $objeto->p_costing_precision!!}</td>	
	<td>{!! $objeto->p_uom_type!!}</td>	-->
	<td>
		<a href="{{ route('unidades_medidas.edit', $objeto->id)}}" type="button" class="btn btn-warning" title="ACTUALIZAR"><i class="material-icons">cached</i></a>
	</td>
	<td>
		{!! Form::model($objeto, ['route'=>['unidades_medidas.destroy',$objeto->id],'method'=>'DELETE']) !!}
            <button type="submit" class="btn btn-danger btn-lg" title="ELIMINAR"><i class="material-icons">deleted</i></button>                       
        {!! Form::close() !!}
	</td>
</tr>
    @endforeach
</table>