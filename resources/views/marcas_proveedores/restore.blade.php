@extends('app')
@section('content')
<h4><small>MARCAS ELIMINADAS </small></h4>
<table border=1 class="table table-striped" ng-controller="marcaProveedorCtrl"><thead><tr><td>id</td>	
<td>nombre_proveedor</td>	
<td>marca_representada</td>	
<td>dias_entrega_maximo</td>	
<td>dias_entrega_minimo</td>	
<td>observacion</td>    
<td></td>	
</tr></thead>
    
    @foreach($objetos as $key=> $objeto)
        <tr><td>{!! $objeto->id!!}</td>	
<td>{!! $objeto->nombre_proveedor!!}</td>	
<td>{!! $objeto->marca_representada!!}</td>	
<td>{!! $objeto->dias_entrega_maximo!!}</td>	
<td>{!! $objeto->dias_entrega_minimo!!}</td>	
<td>{!! $objeto->observacion!!}</td>    
<td><span type="button" class="btn btn-danger" ng-init="marcaProveedor[{{$key}}].id={{ $objeto->id }}"  ng-click="eliminar(marcaProveedor[{{$key}}])"><i class="material-icons">settings_backup_restore</i> </span></td>	
</tr>
    @endforeach
</table>
@endsection