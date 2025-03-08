@extends('app')
@section('content')
    <h4><small>¿ELIMINAR REPORTE?: {!! $objeto->folio!!} , CON NÚMERO  {!! $objeto->folio !!}</small></h4>
        <table border=1 class="table table-striped">
            <tr>
                <td>
                    {!! Form::model($objeto, ['route'=>['reportes.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','reportes.destroy')
                            @if($objeto->estatus=='ESPERA' && (count($objetos)==0))
                                <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">delete</i></button>
                            @endif
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            {{$objeto->observacion_detalle}}
            <tr>
                <td>ACTUALIZADO</td>
                <td>{{$objeto->updated_at}}</td>
            </tr>
            <tr>
                <td>CREADO</td>
                <td>{{$objeto->created_at}}</td>
            </tr>
        </table>
        @include('partials.FormLista')
@endsection



