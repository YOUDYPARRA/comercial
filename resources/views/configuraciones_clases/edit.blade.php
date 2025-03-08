@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0" >
            <div class="panel panel-info" >{{$objeto->id}}
                <div class="panel-heading"><i class="material-icons">note_add</i> ACTUALIZAR REGISTRO<span ng-show="progress" class="badge badge-warning"> Cargando ...</span></div>
                <div class="panel-body">
                    <div class='panel panel-default'>
                        <div class='panel-heading'><i class='material-icons'></i></div>
                        {!! Form::model($objeto, ['route'=>['configuracion_clase.update',$objeto->id],'method'=>'PUT','name'=>'formConfiguracion']) !!}
                        <div class='panel-body'>
                                    @include('configuraciones_clases.partials.Form')
                        </div>
                        <div class='panel-footer'>
                            <button type="submit" class="btn btn-raised btn-info btn-lg"><i class="material-icons">cached</i>ACTUALIZAR</button>
                         </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
