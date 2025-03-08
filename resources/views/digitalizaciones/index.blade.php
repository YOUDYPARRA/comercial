@extends('app')
@section('content')
@foreach($objetos as $objeto)
<p>DIGITALIZACION </p>
<table>
<tr>{{--NOMBRE ARCHIVO--}}</tr>
	<td>{{--NOMBRE ARCHIVO--}}
		{{$objeto->digitalizacion}}
	</td>
	<td>{{--NOMBRE DESCARGAR ARCHIVO--}}
	<a href="{{ route('digitalizaciones.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="OBTENER DIGITALZACION"><i class="material-icons">cloud_download</i></a>
	</td>
	<td>{{--NOMBRE ELIMINAR ARCHIVO--}}
	{!! Form::model($objeto, ['route'=>['digitalizaciones.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <button type="submit" class="btn btn-danger btn-xs" title="ELIMINAR"><i class="material-icons">deleted</i></button>
    {!! Form::close() !!}
	</td>
</tr>
</table>
@endforeach
{{--$id--}}
{{--$subclase--}}
<a href="/digitalizaciones/create/{{$id}}?subclase={{$subclase}}&clase={{$request->clase}}&borrar={{$request->borrar}}" type="button" class="btn btn-primary btn-xs" title="SUBIR ARCHIVO" ><i class="material-icons">cloud_upload</i></a>
{{--<a href="/digitalizaciones/{{$id}}/ticket?clase={{$request->clase}}&borrar={{$request->borrar}}" type="button" class="btn btn-primary btn-xs" title="REFRESCAR"><i class="material-icons">refresh</i></a>--}}
@endsection