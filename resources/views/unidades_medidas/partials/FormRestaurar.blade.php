<h4><small>LISTADO </small></h4>
    <table border=1 class="table table-striped">
    <thead>
    <tr>
		<td>p_user_id</td>	
		<td>p_codigo_edi</td>	
		<td>p_symbol</td>	
		<td>p_name</td>	
		<td>p_description</td>	
		<td>p_std_precision</td>	
		<td>p_costing_precision</td>	
		<td>p_uom_type</td>	
		<td></td>	
	</tr>
</thead>
    
    @foreach($objetos as $objeto)
        <tr>	
	<td>{!! $objeto->p_user_id!!}</td>	
	<td>{!! $objeto->p_codigo_edi!!}</td>	
	<td>{!! $objeto->p_symbol!!}</td>	
	<td>{!! $objeto->p_name!!}</td>	
	<td>{!! $objeto->p_description!!}</td>	
	<td>{!! $objeto->p_std_precision!!}</td>	
	<td>{!! $objeto->p_costing_precision!!}</td>	
	<td>
	
		{!! Form::model($objeto, ['route'=>['unidades_medidas.destroy',$objeto->id],'method'=>'DELETE']) !!}
            <div class="panel-footer"> 
                
            	<button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">restore</i></button>
                
            </div>
        {!! Form::close() !!}
	</td>
	
</tr>
    @endforeach
</table>