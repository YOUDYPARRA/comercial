<div ng-controller="equipoCtr" >
    <!-- <form > -->
    <span class="error" ng-show="radioGroup.equipoOpcion.$error.required && submitted == true"><i class="fa fa-exclamation-circle"></i>Please select an answer.</span>
        <div class="radio radio-info" id="radioGroup" >
          <label><input name="equipoOpcion" id="equipoOpcion" value="N" type="radio" ng-model="equipoOpcion" required />NOMBRE DE PAQUETE    </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="E" type="radio" ng-model="equipoOpcion" required />EQUIPOS    </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="R" type="radio" ng-model="equipoOpcion" required />REFACCIONES</label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="C" type="radio" ng-model="equipoOpcion" required />CONSUMIBLES</label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="A" type="radio" ng-model="equipoOpcion" required />ACCESORIOS </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="O" type="radio" ng-model="equipoOpcion" required />OPCIONES   </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="T" type="radio" ng-model="equipoOpcion" required />NACIONALES </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="S" type="radio" ng-model="equipoOpcion" required />SERVICIO   </label>
        </div>
        <table>
            
        </table>

    <table  class="table table-striped table-condense" border="0">
        <tr> 
            <th colspan="3">
                <div class="form-group has-info" >
                <label class="control-label" for="addon1">Ingresa código de proveedor: <i class="material-icons">search</i></label></label>
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        {!! Form::text('todoText',null,array('class'=>'form-control',"ng-model"=>"todoText","ng-change"=>"equiposLst()",'id'=>'todoText',"placeholder"=>"Buscar equipo")) !!}
                        {!! Form::hidden('codigo',null,array('class'=>'form-control','ng-model'=>'codigo','id'=>'codigo')) !!}
                        {!! Form::hidden('m_product_id',null,array('class'=>'form-control',"ng-model"=>"m_product_id",'id'=>'m_product_id')) !!}
                    </div> 
                </div>           
            </th> 
            <th></th>
        </tr>
        <tr>
            <td colspan="2" width="60%"><div class=" col-md-12">
                <div class="form-group has-info">
                <!-- <label class="control-label" for="addon1">Registros encontrados: <span class="badge"><% insumos.length%></span>  <i class="material-icons">check_circle</i></label></label> -->
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <div class=" col-md-12">
                            <!-- <select id="selec" ng-options="insumo.modelo for insumo in insumos "ng-model="selec" ng-click="equipo(selec);maximoLst()" class="form-control" size="1"> -->
                                <!-- <option value="">  </option>
                            </select> -->
                        </div>
                    </div>
                </div>
                </div>
            </td>
            <td width="30%"> 
            </td>
            <td width="10%">
                            
            </td>
        </tr>
        <tr>
            
        </tr>
    </table>
      <!--INICIO TABLA PARA RESULTADOS ENCONTRADOS-->
      <!--<hr>-->
          <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Resultado de busqueda: <span class="badge"><% insumos.length%></span>  <i class="material-icons">check_circle</i></h3>
                  </div>
                </div>
              </div>

              <div class="panel-body">
                <div scroll-glue-top>
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th>AGREGAR</th>
                        <th>EQUIPO</th>
                        <th>CÓDIGO</th>
                        <th>COSTO</th>
                        <th>PRECIO</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="insumo in insumos" ng-init="setTotals(todo)" ng-model="insumo" ng-click="equipo(insumo)"> 
                        <td> 
                            <div class="ckbox">
                              <label><input name="checkbox5" id="checkbox5" type="radio" /></label>
                              <label for="checkbox5"></label>
                            </div>
                      </td> 
                        <td>
                              <div class="media">
                              <a href="#" class="pull-left">
                                <% insumo.tipo_equipo%>
                              </a>
                              <div class="media-body">
                                <span class="media-meta pull-right"><small><% insumo.bandera_insumo%></small></span>
                                <h4 class="title">
                                  
                                  <span class="pull-right pendiente"><% insumo.codigo_proovedor %></span>
                                </h4>
                                <p class="summary"><% insumo.descripcion %></p>
                              </div>
                            </div>
                         </td>
                        <td> <% insumo.codigo %></td> 
                        <td> <% insumo.costo | number:2%>  </td> 
                        <td> <% insumo.precio | number:2%></td> 
                        
                      </tr>
                        </tbody>
                </table>            
              </div>
              </div>
            <div class="panel-footer"><!--Agregar el item seleccionado.-->
                  <div class="form-group has-info">
                      {!! Form::text('cantidad',1,array('class'=>'form-control','ng-model'=>'cantidad','placeholder'=>'CANTIDAD','required'=>'')) !!}
                      <!--<td colspan="3">Paquete No.: <input type="text" value="" id="combo" ng-model="maximo" size="20"></td>-->
                 </div>
            <button class="btn btn-warning btn-fab" for="todoText" type="button" ng-click="agregarEquipo()" value="add"><i class="material-icons">add_shopping_cart</i></button>
        </div>

      <hr>
      <!--FIN TABLA PARA RESULTADOS ENCONTRADOS-->

        <?php
          echo '<input type="hidden" value="" id="combo" placeholder="No"  ng-init="prueba('.$paquetes[0]->id_pack.')" size="25">';
        ?>

        <!--<h1><%idpaquete%></h1>-->
        <input type="hidden" value="" id="combo" placeholder="No" ng-model="idpaquete"  size="5">


<div class="panel-body">
  <div style="height:300px;overflow:auto">
    <table class="table table-striped table-bordered table-list">
      <thead>
        <tr>
          <th>ELIMINAR</th>
          <th>EQUIPO</th>
          <th>CÓDIGO</th>
          <th>COSTO</th>
          <th>PRECIO</th>
        </tr> 
      </thead>
      <tbody >              
        <tr ng-repeat="pakete in paq"  ng-model="pakete" ng-click="eliminaEquipo(pakete,$index)"> 
          <td> 
            <div class="ckbox">
              <label><input name="checkbox5" id="checkbox5" type="radio" /></label><label for="checkbox5"></label>
            </div>
          </td> 
          <td>
            <div class="media">
              <a href="#" class="pull-left"><% pakete.cantidad%></a>
              <div class="media-body">
                <span class="media-meta pull-right"><small><% pakete.bandera_insumo%></small></span>
                <h4 class="title">
                  <!-- <span class="pull-right pendiente"><% pakete.insumo_proovedor %></span> -->
                </h4>
                <p class="summary"><% pakete.insumo_descripcion %></p>
              </div>
            </div>
          </td>
          <td> <% pakete.insumo_proovedor %></td>
          <td> <% pakete.costo | number:2%>  </td>
          <td> <% pakete.insumo_precio | number:2%></td>
        </tr>
      </tbody>
    </table>            
    </div>
  </div>
    
</div>
