@extends('app')
@section('content')
<h4><small>LISTADO GRUPOS ELIMINADOS</small></h4>
<div class="container" >
    <%grupo.vista=2%>
    {!! $objetos->render() !!}
    <h4> Total: {{ $objetos->total() }}</h4>
    <div class="panel-heading" ng-controller="GrupoUsuarioCtrl">
        <table border=1 class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <td>GRUPO</td>	
                    </tr>
                    <tr></tr>

                </thead>

            @foreach($objetos as $key => $objeto)
                <tr>
                    <td>
                        {!! $objeto->grupo!!}
                    {!! $objeto->observacion!!}
                    </td>
                    <td>
                        <div class="panel-footer"> 
                            <button type="submit" class="btn btn-raised btn-warning btn-xs" ng-init="grupo[{{$key}}].id={{ $objeto->id }}" ng-click="restauraGrupo(grupo[{{$key}}])">Restaurar</button>	
                        </div>
                    </td>
        </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
