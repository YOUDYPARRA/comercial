<div class="row">
  <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>LINEA</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaC.tipo_equipo','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> MARCA </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busquedaC.marca','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>MODELO</label>
            {!! Form::text('modelo',null,array('class'=>'form-control','ng-model'=>'busquedaC.modelo','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    <div class='col-md-2'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i>CODIGO</label>
            {!! Form::text('codigo_proovedor',null,array('class'=>'form-control','ng-model'=>'busquedaC.codigo_proovedor','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group label-floating has-info">
            <label class="control-label"><i class='material-icons'>search</i> DESCRIPCION </label>
            {!! Form::text('descripcion',null,array('class'=>'form-control','ng-model'=>'busquedaC.descripcion','ng-change'=>'buscarB(busquedaC);')) !!}
        </div>
    </div>
</div>

<div class="row">
        <div class="col-sm-12">            
            <div style="height: 300px; overflow: scroll"><!-- scroll-glue-top> -->
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <th> <div class="media">
                              <a class="pull-left text-info">LINEA</a>
                              <div class="media-body"><p class="summary">Descripción</p>
                              </div>
                              </div>
                        </th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>CODIGO</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="grupo in insumosB" ng-model="grupo" ng-click="equipos(grupo)"> 
                          <td>
                            <div class="media">
                              <a class="pull-left text-info"><% grupo.tipo_equipo%></a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><%grupo.categoria1%></small></span>  <!-- <% insumo.bandera_insumo%> -->
                                  <h4 class="title">
                                    <span class="pull-right pendiente"><%grupo.categoria2%></span> <!-- <% insumo.codigo_proovedor %> -->
                                  </h4>
                                  <p class="summary"><% grupo.descripcion %></p>
                              </div>
                            </div>
                          </td>
                          <td>                              <% grupo.marca %>                          </td>
                          <td>                               <% grupo.modelo %>                          </td>
                          <td>                              <% grupo.codigo_proovedor %>                          </td>
                      </tr>
                    </tbody>
                  </table>            
                </div>
        </div>
    </div>