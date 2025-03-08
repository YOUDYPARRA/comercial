@extends('app')
@section('content')
<h4><small>LISTADO </small></h4>
{!! $objetos->render() !!}
<p>TOTAL INSUMOS: {{ $objetos->total()}}</p>

    <table border=1 class="table table-striped" ng-controller="marcaProveedorCtrl">
    <thead><tr>
    <td>id</td>	
<td>nombre_proveedor</td>	
<td>marca_representada</td>	
<td>dias_entrega_maximo</td>	
<td>dias_entrega_minimo</td>	
<td>observación</td>    
<td></td>	
</tr></thead>
    
    @foreach($objetos as $key=>$objeto)
        <tr><td>{!! $objeto->id!!}</td>	
<td>{!! $objeto->nombre_proveedor!!}</td>	
<td>{!! $objeto->marca_representada!!}</td>	
<td>{!! $objeto->dias_entrega_maximo!!}</td>	
<td>{!! $objeto->dias_entrega_minimo!!}</td>	
<td>{!! $objeto->observacion!!}</td>
<td>
    
    @can('acceso','marcas_proveedores.edit')
        <a href="{{ route('marcas_proveedores.edit', $objeto->id)}}" type="button" class="btn btn-primary"><i class="material-icons">cached</i>EDITAR</a>
    @endcan
        
    @can('acceso','marcas_proveedores.destroy')
        <span type="button" class="btn btn-danger" ng-init="marcaProveedor[{{$key}}].id={{ $objeto->id }}"  ng-click="eliminar(marcaProveedor[{{$key}}])"><i class="material-icons">delete</i> </span>
    @endcan
</td>
</tr>
    @endforeach
</table>
@endsection