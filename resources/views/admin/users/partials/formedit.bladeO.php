						<div class="form-group has-info">
							<label for="id">Clave</label>
<!-- 							{!! Form::text('clave',$user->id,array('class'=>'form-control','id'=>'clave',"placeholder"=>"clave",'required'=>'')) !!} -->
							<input type="text" class="form-control" id="id" name="id" value="{{$user->id}}" required="" >
						</div>
						<div class="form-group has-info">
							<label for="name">Nombre</label>
							<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required="" >
						</div>
						<div class="form-group has-info">
							<label for="iniciales">Iniciales</label>
							<input type="text" class="form-control" id="iniciales" name="iniciales" value="{{$user->iniciales}}" required="" >
						</div>
						<div class="form-group has-info">
							<label for="correo">Correo</label>
							<input type="email" class="form-control" id="correo" name="correo" value="{{$user->email}}" required="" >
						</div>
						<div class="form-group has-info">
						<label for="correo">Contraseña</label>
							{!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
						</div>
						<div class="form-group has-info">
							<label for="puesto">Puesto</label>
							{!! Form::select('puesto',
						[''=>'Seleccione puesto:']+
                                               util::getPuestos()
						,
						$user->puesto,['class'=>'form-control']) !!}
						</div>
						<div class="form-group has-info">
							<label for="puesto">Area</label>
							{!! Form::select('area',
						[''=>'Seleccione área:']+util::getAreas(),
						$user->area,['class'=>'form-control']) !!}
						</div>
						<div class="form-group has-info">
							<label for="puesto">Departamento</label>
							{!! Form::select('departamento',
						[''=>'Seleccione departamento:']+util::getDepartamentos(),
						null,['class'=>'form-control']) !!}
						</div>
						
						<div class="form-group has-info">
							<label for="puesto">Lugar centro de costo</label>
							{!! Form::select('lugar_centro_costo',[''=>'Seleccione lugar del centro de costo','MX'=>'MX','BJ'=>'BJ','GDL'=>'GDL','MTY'=>'MTY'],
							null,['class'=>'text-info','class'=>'form-control','required'=>'']) !!}
						</div>
						<div class="form-group has-info">
							<label for="puesto">Tipo de usuario</label>
							{!! Form::select('tipo_usuario',[''=>'Seleccione tipo','ADMINISTRADOR'=>'ADMINISTRADOR','USUARIO'=>'USUARIO'],
						null,['class'=>'text-info','class'=>'form-control','required'=>'']) !!}
							<!-- <select class="form-control" name="tipo_usuario">
								 
								if($user->tipo_usuario == "ADMINISTRADOR"){
								  	echo "
								  	<option value='$user->tipo_usuario' selected>ADMINISTRADOR</option>
  									<option value='' >USUARIO</option>";
  								}
								else{
									echo "
									<option value=''>ADMINISTRADOR</option>
  									<option value='$user->tipo_usuario' selected>USUARIO</option>
  									";
  								}
								
							</select> -->
						</div>