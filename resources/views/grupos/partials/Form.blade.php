<div class='form-group' >
    <div class="row">
        
        <div class="col-sm-5">

            <div class="form-group">
                <label>NOMBRE DE GRUPO</label>
        <!--            <select ng-options="recurso as recurso.recurso for recurso in recursos track by recurso.id" ng-model="slcRecurso" ng-change="consultaRecurso()"></select>-->
                 {!! Form::text('recurso',null,array('class'=>'form-control','ng-model'=>'grupo.grupo')) !!} 
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                  <label>OBSERVACION</label>
                     {!! Form::text('observacion',null,array('class'=>'form-control','ng-model'=>'grupo.observacion')) !!}
            </div>
        </div>
        
        <div class="col-sm-2">
                {!! Form::submit('ACEPTAR',array('class'=>'btn btn-primary','ng-click'=>'aceptarGrupo()')) !!}
                <br>
                {!! Form::submit('LIMPIAR',array('class'=>'btn btn-primary','ng-click'=>'limpiarGrupo()')) !!}
        </div>
    </div>
    
            <!--INICIA LISTADO DE GRUPOS EXISTENTES-->
    <div class="row">
        <div class="col-sm-12">            
            <div scroll-glue-top>
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <th>GRUPO</th>
                        <th>MODIFICAR</th>
                        <th>ELIMINAR</th>
                        <th>SELECCIONAR</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="grupo in grupos" ng-model="grupo"> 
                          <td>
                            <div class="media">
                              <a href="#" class="pull-left"><% grupo.grupo%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small>.</small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente">.</span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"><% grupo.observacion %></p>
                              </div>
                            </div>
                          </td>
                          <td> 
                              <input type="submit" value="Modificar" ng-click="modificaGrupo(grupo)"/>
                          </td>
                          <td>
                              <input type="submit" value="Eliminar" ng-click="eliminaGrupo(grupo)"/>
                          </td>
                          <td> 
                                <input type="submit" value="Seleccionar" ng-click="seleccionaGrupo(grupo)"/>
                          </td>
                      </tr>
                    </tbody>
                  </table>            
                </div>
        </div>
    </div>
    <div class="row">
        <hr>
        <div class="col-sm-5">
            <div class="form-group">
                <label>GRUPO SELECCIONADO</label>
                <span>
                    <h4><%grupo_usuario.grupo%></h4>
                </span>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label>USUARIO</label>
                <select ng-options="usuario as usuario.name for usuario in usuarios track by usuario.id" ng-model="usuario.slcUsuario" ng-change="usuarioSeleccionado(usuario.slcUsuario);"></select>
            </div>
        </div>
        <div class="col-sm-2">
            {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary','ng-click'=>'agrupa()')) !!}
        </div>
    </div><!--FIN DE FORMULARIO DE USUARIOS Y GRUPOS-->
    <div class="row"> <!--INICIA TABLA DE USUARIOS Y GRUPOS-->
        <hr>
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">USUARIOS - AGRUPACIONES</div>

        <!-- Table -->
<!--        <%grupos_usuarios%>-->
        <table class="table table-striped table-bordered table-list table-responsive ">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>GRUPO</th>
                    <th>ELIMINAR</th>
                </tr> 
            </thead>
            <tbody>
                <tr ng-repeat="grupo in grupos_usuarios" ng-click="eliminaUsuarioGrupo(grupo)">
                    <td>
                        <%grupo.nombre%>
                    </td>
                    <td>
                        <%grupo.grupo%>
                    </td>
                    <td>
                        <h3 class="btn btn-default">eliminar</h3>
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
          
        </table>
        </div>

    </div>
            <!--FIN DE LISTADO DE GRUPOS EN SISTEMA-->
</div>