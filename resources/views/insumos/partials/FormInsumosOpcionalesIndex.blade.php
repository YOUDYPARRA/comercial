<div class="row">
    <div class='col-md-4'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>MODELO</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busqueda.modelo','ng-change'=>'buscar(busqueda);')) !!}
        </div>
    </div>
    <div class='col-md-4'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>CODIGO PROOVEDOR</label>
            {!! Form::text('codigo_proovedor',null,array('class'=>'form-control','ng-model'=>'busqueda.codigo_proovedor','ng-change'=>'buscar(busqueda);')) !!}
        </div>
    </div>
    <div class='col-md-4'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> DESCRIPCION </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busqueda.descripcion','ng-change'=>'buscar(busqueda);')) !!}
        </div>
    </div>
    <!--<div class='col-md-3'>  
      <button type="button" class="btn btn-info" ng-click="buscar();" ><i class="material-icons">search</i> BUSCAR</button>        
    </div>-->
</div>
        

			<div class="row">
        <div class="col-sm-12">            
            <div style="height: 600px; overflow: scroll"><!-- scroll-glue-top> -->
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <th>EQUIPO</th>
                        <th>MODELO</th>
                        <th>CODIGO</th>
                        <th>INSUMO</th>
                        <th>EQUIPO</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="grupo in insumos | startFrom:currentPage*pageSize | limitTo:pageSize" ng-model="grupo" ng-mouseover="hoverIn(grupo)" ng-mouseleave="hoverOut()"> 
                          <td>
                            <div class="media">
                              <a href="#" class="pull-left"><% grupo.tipo_equipo%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><%grupo.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente"><%grupo.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"><% grupo.descripcion %></p>
                              </div>
                            </div>
<span ng-show="hoverEdit" class="animate-show">
                <table class="table table-striped">
                  <tr>
                    <th><i class="material-icons">devices_other</i></th>
                    <th>CODIGO</th>
                    <th>DESCRIPCION</th>
                  </tr>
                  <tr ng-repeat="equipo in equipos | filter:{pertenece_bandera_insumo:'E'}" >
                    <td><i class="material-icons">desktop_mac</i></td>
                    <td><%equipo.pertenece_codigo_proovedor%></td>
                    <td><%equipo.pertenece_descripcion%></td>
                  </tr>
                  <tr ng-repeat="equipo in equipos" ng-if="equipo.pertenece_bandera_insumo != 'E'" >
                    <td><i class="material-icons">keyboard</i></td>
                    <td><%equipo.pertenece_codigo_proovedor%></td>
                    <td><%equipo.pertenece_descripcion%></td>
                  </tr>

                </table>
</span>
                          </td>
                          <td> 
                              <% grupo.modelo %>
                          </td>
                          <td>
                              <% grupo.codigo_proovedor %>
                          </td>
                          <td> 
                          <button type="button" class="btn btn-default" title="RELACIONAR INSUMOS" ng-click="buscarI(grupo);"><i class="material-icons">done</i> </button>     
                          </td> 
                          <td> 
                                <button type="button" class="btn btn-success" title="RELACIONAR EQUIPOS" ng-click="buscarE(grupo);"><i class="material-icons">done</i> </button>     
                          </td>
                      </tr>
                    </tbody>
                  </table>            
                </div>
<button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1" class="btn btn btn-info"><i class="material-icons">fast_rewind</i>  Anterior</button>
    <span class="badge"> <%currentPage+1%></span> <span class="badge">  -  </span> <span class="badge"> <%numberOfPages()%> </span>
<button ng-disabled="currentPage >= total/pageSize - 1" ng-click="currentPage=currentPage+1" class="btn btn btn-info">  Siguiente<i class="material-icons">fast_forward</i></button>
<!--<uib-pagination boundary-links="true" total-items="totalItems" ng-model="currentPage" class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></uib-pagination>-->
        </div>
    </div>
    