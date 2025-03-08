@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
			<div class="panel panel-info">
                <div class='panel-heading panel-info' > ACTUALIZAR <span class="badge">{{$objeto->id}}</span></div>
                {!! Form::model($objeto,['method'=>'PUT','action'=>['UnidadMedidaController@update',$objeto->id]]) !!}
                <div class='panel-body'>
                    @include('unidades_medidas.partials.Form')
                </div>
                <div class='panel-footer panel-info'> 
                    <button type='submit' class='btn btn-warning btn-lg'><i class='material-icons'>save</i>ACTUALIZAR</button> 
                </div>
                {!! Form::close() !!} 
			</div>
		</div>
	</div>
</div>

@endsection
