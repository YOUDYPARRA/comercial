	<div class="form-group has-info" >
		{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Nombre del empleado','required'=>'','ng-model'=>'fiscal','ng-change'=>'tercerosLst("EMPLEADOS")')) !!}
		<ul class="list-unstyled">
            <li ng-repeat="fiscal in fiscales">
                <span class="input-group-addon"><a ng-click="cambiaNombreFiscal(fiscal);mayusculas()"><i class="material-icons">done</i><% fiscal.org_name %> <% fiscal.bpartner_name %> </a></span>               
            </li>
        </ul>
	</div>
	<div class="form-group has-info">
		{!! Form::text('numero_empleado','',['class'=>'form-control','placeholder'=>'Número de empleado','ng-model'=>'numero_empleado']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::text('iniciales','',['class'=>'form-control','placeholder'=>'Iniciales del empleado','ng-model'=>'iniciales']) !!}
		{!! Form::hidden('c_bpartner_id','<%c_bpartner_id%>',['class'=>'form-control']) !!}
	</div>						
	<div class="form-group has-info">
		{!! Form::text('org_name','<%org_name%>',['class'=>'form-control','readonly'=>'readonly']) !!}
	</div>						
	<div class="form-group has-info">
		{!! Form::email('email','',['class'=>'form-control','placeholder'=>'Correo electrónico','ng-model'=>'email']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::select('puesto',[''=>'Seleccione puesto:']+util::getPuestos(),null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::select('area',[''=>'Seleccione área:']+util::getAreas(),null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::select('departamento',[''=>'Seleccione departamento:']+util::getDepartamentos(),null,['class'=>'form-control']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::select('lugar_centro_costo',[''=>'Seleccione lugar del centro de costo','CH'=>'CH','GDL'=>'GDL','MER'=>'MER','MTY'=>'MTY','MX'=>'MX'],null,['class'=>'text-info','class'=>'form-control','required'=>'','ng-model'=>'lugar_centro_costo']) !!}
	</div>
	<div class="form-group has-info">
		{!! Form::select('tipo_usuario',[''=>'Seleccione tipo','ADMINISTRADOR'=>'ADMINISTRADOR','USUARIO'=>'USUARIO'],null,['class'=>'form-control']) !!}
	</div>