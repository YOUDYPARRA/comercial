@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default" ng-controller="catalogoCtrl">
                
                <div class='panel-heading'>DATOS DE CALCULO ELIMINADOS</div>
                {!! Form::model(Request::all(),['route'=>'catalogos_calculo.index','method'=>'GET']) !!}
                    {!! Form::select('modelo',['0'=>'Seleccione Opcion']+\DB::table('insumos')->where('bandera_insumo','=','E')->lists('modelo', 'modelo'),null,['class'=>'form-control','ng-model'=>'modelo']) !!}
                    {!! Form::text('vi',0,array('readonly'=>'readonly','class'=>'form-control','size'=>'5')) !!}
                    <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
                {!! Form::close() !!}                    
                    <%conf.headerCrear%>
                    {!!$objetos->paginado!!}
                    <div class='panel-body'>
    <table border=0 class="table table-striped">
    <thead>
    	<tr>
    		<th>Id</th>	
			<th>Modelo</th>	
			<th>Usuario</th>	
			<th>flete</th>
			<th>Creado</th>
			<th>Eliminado</th>
                        <th></th>
			</tr>
		</thead>
    @foreach($objetos as $key=>$objeto)
        <tr>
        	<td>{!! $objeto->id!!}</td>
			<td>{!! $objeto->modelo!!}</td>	
			<td>{!! $objeto->usuario!!}</td>
                        <td>{!! $objeto->flete!!}</td>
                        <td>{!! $objeto->created_at!!}</td>
                        <td>{!! $objeto->deleted_at!!}</td>
			<td>
				<span type="button" class="btn btn-danger" ng-init="catalogo[{!!$key!!}]={!!$objeto->id!!}"  ng-click="restaura(catalogo[{!!$key!!}])"><i class="material-icons">settings_backup_restore</i> </span>
			</td>
		</tr>
    @endforeach
</table>

</div>
                    <div class="panel-footer"> 

                    </div>
            </div>
        </div>
    </div>
</div>

@endsection