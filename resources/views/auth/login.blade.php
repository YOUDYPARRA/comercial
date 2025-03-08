@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Identificarse</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'auth/login', 'class' => 'form']) !!}
                            <div class="form-group has-info">
                                <label for="email" class="col-md-1 control-label"><i class="material-icons">face</i></label>
                                {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'CORREO']) !!}
                            </div>
                            <div class="form-group has-info">
                                <label for="password" class="col-md-1 control-label"><i class="material-icons">https</i></label>
                                {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'CONTRASEÑA']) !!}
                            </div>
                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Recuerdame</label>
                            </div>
                            <div class="has-info">
                                {!! Form::submit('INGRESAR',['class' => 'btn btn-info']) !!}
                                <hr>
                                <p><a href='https://sites.google.com/smh.com.mx/inicio/p%C3%A1gina-principal'>Manual de inicio </a> <a href='https://sites.google.com/smh.com.mx/inicio/manuales?authuser=0'> Otros Manuales </a></p>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
