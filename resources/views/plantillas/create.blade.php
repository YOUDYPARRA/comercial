@extends('app')
@section('content')
<div class="container" ng-controller="plantillaCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
            <div class='panel-heading'><i class='material-icons'>note_add</i> CREAR PLANTILLA </div>
            <div class='panel-body'>{{--INICIO BODY--}}
                {!! Form::text('nombre',null,array('ng-model'=>'objeto.nombre','class'=>'form-control','placeholder'=>'NOMBRE')) !!}
                {!! Form::text('clase',null,array('ng-model'=>'objeto.clase','class'=>'form-control','placeholder'=>'CLASE')) !!}
                {!! Form::textarea('plantilla',null,['size'=>'100x6','style'=>'resize:both','ng-model'=>'objeto.plantilla','ng-change'=>'countLength(objeto.plantilla.length)'])!!}

                <span class="form-help"><%1500-chrLength%>Characters</span>
            </div>{{--FIN BODY--}}
            <div class='panel-footer'> 
                <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-disabled="save"><i class="material-icons">save</i></button>
                <span><%rsl.msg%></span>
            </div>
        </div>
    </div>
</div>
</div>
@endsection