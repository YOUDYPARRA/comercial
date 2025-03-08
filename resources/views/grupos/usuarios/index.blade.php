@extends('app')
@section('content')
<div class="container" >
<div class="panel-heading">GRUPOS - USUARIOS</div>
<div class="panel-body" ng-controller="GrupoUsuarioCtrl">
    <%grupo.vista=1%>
        @include('grupos.partials.Form')
    </div>
</div>
@endsection