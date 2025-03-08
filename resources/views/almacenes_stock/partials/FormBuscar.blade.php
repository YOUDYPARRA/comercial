<div class="container">	
	{!! Form::model(Request::all(),['route'=>'pendiente_stock.index','method'=>'GET']) !!}
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
		            <div class="panel-body">		          <!--INICIO CUERPO DEL PANEL!-->
		          		<div class="col-md-2">
		              		<div class="form-group has-info">
		                  		<div class="form-group">
		                      		{!! Form::text('codigo_proovedor',null,['class'=>'form-control','placeholder'=>'Codigo producto'])!!}
		                  		</div>
		              		</div>
		          		</div>
		          		<div class="col-md-2">
		              		<div class="form-group has-info">
		                  		<div class="form-group">
		                      		{!! Form::text('almacen',null,['class'=>'form-control','placeholder'=>'Almacen'])!!}
		                  		</div>
		              		</div>
		          		</div>
		          		<div class="col-md-2">
		              		<div class="form-group has-info">
		                  		<div class="form-group">
		                      		{!! Form::text('org_name',null,['class'=>'form-control','placeholder'=>'Organización'])!!}
		                  		</div>
		              		</div>
		          		</div>
		          		<div class="col-md-2">
		              		<div class="form-group has-info">
		                  		<div class="form-group">
		              				<button type="submit" class="btn btn-raised btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
		          				</div>
		          			</div>
		          		</div>
		          	</div>		          <!--FIN CUERPO PANEL!-->
		    		<div class="panel panel-footer">        
		    		</div>
		        </div>
		      </div>
		    </div>
		  </li>
		</ul>
	{!! $objetos->render() !!}        
	{!! Form::close() !!}	
</div>