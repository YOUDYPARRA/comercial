@extends('app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">REGISTRO DE USUARIO</div> 
                <div class="panel-body" ng-controller="terceroCtrl">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}
                        <div class="form-group has-info">
                            {!! Form::text('id',null,['class'=> 'form-control','placeholder'=>'Número de empleado']) !!}
                        </div>
                        <div class="form-group has-info">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del empleado','required'=>'','ng-model'=>'fiscal','ng-change'=>'tercerosLst(empleados)']) !!}
                            <ul class="list-unstyled" style="margin-bottom: 15px;">
                                <li ng-repeat="fiscal in fiscales">
                                    <span class="input-group-addon"><a ng-click="cambiaNombreFiscal(fiscal.bpartner_name)"><i class="material-icons">done</i><% fiscal.bpartner_name %> </a></span>               
                                </li>
                            </ul>
                        </div>

                        <div class="form-group has-info">
                            {!! Form::text('iniciales','',['class'=>'form-control','placeholder'=>'Iniciales del empleado']) !!}
                        </div>  

                        <div class="form-group has-info">
                            {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'Correo electronico']) !!}
                        </div>
                        <div class="form-group has-info">
                            {!! Form::password('password', ['class'=> 'form-control','placeholder'=>'Contraseña']) !!}
                        </div>
 
                        <div class="form-group has-info">
                            {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=>'Confirmar contraseña']) !!}
                        </div>

                        <div class="form-group has-info">
        {!! Form::select('puesto',
                        [''=>'Seleccione puesto:',
                        'ASESOR'=>'ASESOR',
                        'COORDINADOR DE CONTRATOS'=>'COORDINADOR DE CONTRATOS',
                        'COORDINADOR DE SERVICIOS'=>'COORDINADOR DE SERVICIOS',
                        'DIRECTOR COMERCIAL'=>'DIRECTOR COMERCIAL',
                        'DIRECTOR MERCADOTECNIA'=>'DIRECTOR MERCADOTECNIA',
                        'EJECUTIVO DE VENTAS'=>'EJECUTIVO DE VENTAS',
                        'ESPECIALISTA DE LICITACIONES'=>'ESPECIALISTA DE LICITACIONES',
                        'GERENTE DE OPERACIONES'=>'GERENTE DE OPERACIONES',
                        'GERENTE DE VENTAS'=>'GERENTE DE VENTAS',
                        'GERENTE TÉCNICO ADMINISTRATIVO'=>'GERENTE TÉCNICO ADMINISTRATIVO'],
                        null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group has-info">
        {!! Form::select('area',
                        [''=>'Seleccione area:',
                        'DIRECCION COMERCIAL'=>'DIRECCION COMERCIAL',
                        'DIRECCION GENERAL'=>'DIRECCION GENERAL',
                        'MERCADOTECNIA'=>'MERCADOTECNIA',
                        'SERVICIO TÉCNICO'=>'SERVICIO TÉCNICO',
                        'VENTAS'=>'VENTAS',
                        'VENTAS CONSUMIBLES'=>'VENTAS CONSUMIBLES',
                        'VENTAS GOBIERNO'=>'VENTAS GOBIERNO',
                        'VENTAS PRIVADO'=>'VENTAS PRIVADO'],
                        null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group has-info">
        {!! Form::select('departamento',
                        [''=>'Seleccione departamento:',
                        'OPERACIONES'=>'OPERACIONES',
                        'MERCADOTECNIA'=>'MERCADOTECNIA',
                        'DIRECCION GENERAL'=>'DIRECCION GENERAL',
                        'VENTAS BAJIO'=>'VENTAS BAJIO',
                        'VENTAS MTY'=>'VENTAS MTY',
                        'VENTAS GDL'=>'VENTAS GDL',
                        'VENTAS GOBIERNO'=>'VENTAS GOBIERNO',
                        'VENTAS PRIVADO'=>'VENTAS PRIVADO',
                        'VENTAS THINPREP'=>'VENTAS THINPREP',
                        'TÉCNICO ADMINISTRATIVO'=>'TÉCNICO ADMINISTRATIVO'],
                        null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group has-info">
        {!! Form::select('centro_costo',
                        [''=>'Seleccione centro de costo:',
                        'APLICACIONES'=>'APLICACIONES',
                        'ADMINISTRACION Y FINANZAS'=>'ADMINISTRACION Y FINANZAS',
                        'CADENA DE SUMINISTRO'=>'CADENA DE SUMINISTRO',
                        'COMERCIAL'=>'COMERCIAL',
                        'DIRECCION GENERAL'=>'DIRECCION GENERAL',
                        'JURIDICO'=>'JURIDICO',
                        'MERCADOTECNIA'=>'MERCADOTECNIA',
                        'PROYECTOS'=>'PROYECTOS',
                        'RECURSOS HUMANOS'=>'RECURSOS HUMANOS',
                        'SERVICIO TECNICO'=>'SERVICIO TECNICO'],
                        null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group has-info">
        {!! Form::select('lugar_centro_costo',[''=>'Seleccione lugar del centro de costo','MX'=>'MX','BJ'=>'BJ','GDL'=>'GDL','MTY'=>'MTY'],null,['class'=>'text-info','class'=>'form-control','required'=>'','ng-model'=>'lugar_centro_costo']) !!}
    </div>
 
                        <div class="form-group has-info">
                        {!! Form::select('tipo_usuario',[''=>'Seleccione tipo','ADMINISTRADOR'=>'ADMINISTRADOR','USUARIO'=>'USUARIO'],
                        null,['class'=>'text-info','class'=>'form-control','required'=>'']) !!}
                        </div>

                        <div>
                            {!! Form::submit('GUARDAR',['class' => 'btn btn-raised btn-info']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection