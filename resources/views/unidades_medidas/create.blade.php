@extends('app')
@section('content')
<div class="panel panel-info">
                <div class='panel-heading panel-info' > CREAR <span class="badge"></span></div>
                <div class='panel-body'>
                {!! Form::open(array('action' => 'CompraController@store','name'=>'formCompra')) !!} 
                    @include('unidades_medidas.partials.Form')
                </div>
                <div class='panel-footer'> 
                    <button type='submit' class='btn btn-warning btn-lg'><i class='material-icons'>save</i>GUARDAR</button> 
                    {!! Form::close() !!} 
                </div>
                <div class='panel-heading panel-info' > LISTADO UNIDADES DE MEDIDA <span class="badge"></span></div>
                <div class='panel-body'>
                    @include('unidades_medidas.partials.FormLista')
                </div>
</div>
@endsection
