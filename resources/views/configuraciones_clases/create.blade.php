@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0" >
            <div class="panel panel-info" ng-controller="">
                <div class="panel-heading"><i class="material-icons">note_add</i> CREAR REGISTRO<span ng-show="progress" class="badge badge-warning"> Cargando ...</span></div>
                <div class="panel-body" ng-init="n='NUEVO'">
                    <div class='panel panel-default'>
                        <div class='panel-heading'><i class='material-icons'></i></div>
                        {!! Form::open(['route'=>'configuracion_clase.store','name'=>'formConfiguracion']) !!}
                        <div class='panel-body'>
                            @include('configuraciones_clases.partials.Form')
                        </div>
                        <div class='panel-footer'>
                            {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary','ng-click'=>'')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
