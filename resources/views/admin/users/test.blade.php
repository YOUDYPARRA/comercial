<!--{!! Form::open(['route'=>'users.store','method'=>'POST']) !!}-->
						<!--<div class="form-group">
							 {!! Form::label('clave','CLAVE') !!} 
							{!! Form::text('clave',['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('empleado','Empleado') !!}
							{!! Form::text('empleado',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('iniciales','Iniciales') !!}
							{!! Form::text('iniciales',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email','Correo electronico') !!}
							{!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Contraseña']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('password','Contraseña') !!}
							{!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('puesto','Puesto') !!}
							{!! Form::text('puesto',['class'=>'form-control','placeholder'=>'Puesto']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('area','Area') !!}
							{!! Form::text('area',['class'=>'form-control','placeholder'=>'Area']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('area','Departamento') !!}
							{!! Form::text('area',['class'=>'form-control','placeholder'=>'Departamento']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('area','Centro de Costos') !!}
							{!! Form::text('area',['class'=>'form-control','placeholder'=>'Centro de Costos']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('type','Tipo de usuario') !!}
							{!! Form::select('type',[''=>'Selecciones tipo','User'=>'Usuario','admin'=>'Administrador'],null,['class'=>'form-control']) !!}
						</div> -->
						<!--<button type="submit" class="btn btn-default">GUARDAR</button>
						{!! Form::close() !!}-->

						<div class="form-group has-info">
							{!! Form::text('name','',['class'=>'text-info','class'=>'form-control','placeholder'=>'NOMBRE DE EMPLEADO','required'=>'','ng-model'=>'empleado']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::text('iniciales','',['class'=>'text-info','class'=>'form-control','placeholder'=>'INICIALES DE EMPLEADO','required'=>'','ng-model'=>'iniciales']) !!}
						</div>						
						<div class="form-group has-info">
							{!! Form::text('email','',['class'=>'text-info','class'=>'form-control','placeholder'=>'CORREO ELECTRONICO','required'=>'','ng-model'=>'email']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::password('password',['class'=>'text-info','class'=>'form-control','placeholder'=>'CONTRASEÑA','required'=>'']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::text('puesto','',['class'=>'text-info','class'=>'form-control','placeholder'=>'PUESTO','required'=>'','ng-model'=>'puesto']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::text('area','',['class'=>'text-info','class'=>'form-control','placeholder'=>'AREA','required'=>'','ng-model'=>'puesto']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::text('departamento','',['class'=>'text-info','class'=>'form-control','placeholder'=>'DEPARTAMENTO','required'=>'','ng-model'=>'departamento']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::text('centro_costo','',['class'=>'text-info','class'=>'form-control','placeholder'=>'CENTRO DE COSTOS','required'=>'','ng-model'=>'centro_costos']) !!}
						</div>
						<div class="form-group has-info">
							{!! Form::select('tipo_usuario',[''=>'Seleccione tipo','ADMINISTRADOR'=>'ADMINISTRADOR','USUARIO'=>'USUARIO'],null,['class'=>'text-info','class'=>'form-control','required'=>'','ng-model'=>'centro_costo']) !!}
						</div>