	{{--INICIO BUSCAR--}}
		<div class="container">
		    <div class="panel panel-default">
		<ul class="nav nav-pills" >
		  <li role="presentation" >
		    <div class="panel-group">
		      <div class="panel panel-info">
		        <div class="panel-heading">
		          <h4 class="panel-title">
		            <a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR</a>
		          </h4>
		        </div>
		        <div id="collapse2" class="panel-collapse collapse">
		          <div class="panel-body">
		          <!--INICIO CUERPO DEL PANEL!-->
		          <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('fecha_inicio',null,['class'=>'form-group','placeholder'=>'fecha'])!!}
		                  </div>
		              </div>
		          </div>
		          <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('nombre_cliente',null,['class'=>'form-group','placeholder'=>'cliente'])!!}
		                  </div>
		              </div>
		          </div>
		          <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('org_name','SMH',['class'=>'form-group','placeholder'=>'organizacion'])!!}
		                  </div>
		              </div>
		          </div>
		          <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('sucursal',null,['class'=>'form-group','placeholder'=>'sucursal'])!!}
		                  </div>
		              </div>
		          </div>
		          <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('instituto',null,['class'=>'form-group','placeholder'=>'instituto'])!!}
		                  </div>
		              </div>
		          </div>
		           <div class="col-md-2">
		              <div class="form-group has-info">
		                  <div class="form-group">
		                      {!! Form::text('estatus',null,['class'=>'form-group','placeholder'=>'estatus'])!!}
		                  </div>
		              </div>
		          </div>
		          <div class="row">
			          	<div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('complejidad_servicio',null,['class'=>'form-group','placeholder'=>'probabilidad'])!!}
			                  </div>
			              </div>
			          </div>
			          <div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('estado',null,['class'=>'form-group','placeholder'=>'ESTADO'])!!}
			                  </div>
			              </div>
			          </div>
			          <div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('dato',null,['class'=>'form-group','placeholder'=>'ganado/perdido'])!!}
			                  </div>
			              </div>
			          </div>
			          <div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('autor',null,['class'=>'form-group','placeholder'=>'INICIALES AGENTE'])!!}
			                  </div>
			              </div>
			          </div>
			          <div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('compromiso',null,['class'=>'form-group','placeholder'=>'COMPROMISO'])!!}
			                  </div>
			              </div>
			          </div>
			          <div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('fecha_atencion',null,['class'=>'form-group','placeholder'=>'MES VENTA'])!!}
			                  </div>
			              </div>
			          </div>

		          </div>
		          <div class="row">
		          	<div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('equipo',null,['class'=>'form-group','placeholder'=>'MODALIDAR/EQUIPO'])!!}
			                  </div>
			              </div>
			          </div>
		          	<div class="col-md-2">
			              <div class="form-group has-info">
			                  <div class="form-group">
			                      {!! Form::text('id',null,['class'=>'form-group','placeholder'=>'ID'])!!}
			                  </div>
			              </div>
			          </div>

			          <div class="col-md-2">
			              <div class="control-label"></div>
			                  <div class="form-group">
			              		<button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
			                  </div>
			          </div>

		          </div>
		          <!--FIN CUERPO PANEL!-->
		          </div>
		        </div>
		      </div>
		    </div>
		  </li>
		  </ul>
		    <div class="panel panel-footer">
					@if(empty($request->id))
						{!! $objetos->appends($request->all())->render() !!}
					@endif
		    </div>
		</div>
		</div>
	{{--FIN BUSCAR--}}
