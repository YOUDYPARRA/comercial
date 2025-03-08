<div class="container" ng-controller="mensualidadCtrl" ng-init="inicio('{{$request->id}}')">
	<div class="panel panel-default">
		<div class="panel panel-info">
		    <div class="panel-heading"><i class="material-icons">money</i> PAGOS</div>
		    <div class="panel-body">		          <!--INICIO CUERPO DEL PANEL!-->
		        <div class="row">
			        <div class="col-sm-2">
			            <div class="form-group has-info">
			                <label class='control-label'><i class='material-icons'></i>MES</label>
			                <select name="vigencia" ng-model="objeto.vigencia" ng-options="mes.nombre as 	mes.nombre for mes in meses" class="form-control" required></select>
			            </div>
			        </div>
			        <div class="col-sm-2">
			            <div class="form-group has-info">
			                <label class='control-label'><i class='material-icons'></i>AÑO</label>
			                {!! Form::hidden('dato',null,['ng-model'=>'objeto.dato'])!!}
			                <select name="dato" ng-model="objeto.dato" ng-options="anio as anio for anio in anios" class="form-control">			              		</select>
			            </div>
			        </div>
			        <div class="col-sm-2">
			            <div class="form-group has-info">
			            	<label class='control-label'><i class='material-icons'></i>MONTO</label>
			                {!! Form::text('nota',null,['ng-model'=>'objeto.nota','class'=>'form-control','placeholder'=>'MONTO'])!!}
			            </div>
			        </div>
			        <div class="col-sm-2">
			            <div class="control-label"></div>
			              	<button type="submit" class="btn btn-info btn-sm" ng-click="agregar()"><i class="material-icons" >add</i>Agregar</button>
			        </div>
		        </div>
		    </div>
		</div>
		<div class="panel panel-info">
		    <div class="panel-body">
		        <div class="row"><!--INICIA tabla-->
                    <table class="table table-striped table-bordered table-list table-responsive">
                        <thead><tr>
                            <th>MES</th>
                            <th>AÑO</th>
                            <th>MONTO $</th>
                            <th></th>
                  		</tr></thead>
                        <tbody><tr ng-repeat="mensu in mensualidades" ng-model="producto"> 
                            <td> <% mensu.vigencia %> </td>
                            <td> <% mensu.dato %> </td>
                            <td> <% mensu.nota %> </td>
                            <td><p class="text-warning" title="BORRAR" ng-click="remover($index)"><i class="material-icons">delete_forever</i></p></td>
                        </tr></tbody>
                    </table><!--FIN tabla-->
		    	</div>
		    </div>
		    <div class="panel panel-footer">
			    <button type="submit" class="btn btn-info btn-sm" ng-click="guardar()" ng-disabled="guardado"><i class="material-icons" >save</i>GUARDAR</button>
			    <span class="badge badge-warning"><%msg%></span>
			    <a href="/proyectoventa/{{$request->id}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDENES DE PROYECTOS"><i class="material-icons">list</i></a>
			</div><!--FIN CUERPO PANEL!-->
		</div>
	</div>
</div>
{{--FIN BUSCAR--}}