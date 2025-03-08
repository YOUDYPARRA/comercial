<div ng-controller="equipoCtr" >
  <div class='panel-body' >
    <span class="error" ng-show="radioGroup.equipoOpcion.$error.required && submitted == true"><i class="fa fa-exclamation-circle"></i>Please select an answer.</span>
        <div class="radio radio-info" id="radioGroup" >
            <label><input name="equipoOpcion" id="equipoOpcion" value="N" type="radio" ng-model="equipoOpcion" required />NOMBRE DE PAQUETE    </label>     <!--  N = SUB  20160718-->
            <label><input name="equipoOpcion" id="equipoOpcion" value="E" type="radio" ng-model="equipoOpcion" required />EQUIPOS    </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="R" type="radio" ng-model="equipoOpcion" required />REFACCIONES</label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="C" type="radio" ng-model="equipoOpcion" required />CONSUMIBLES</label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="A" type="radio" ng-model="equipoOpcion" required />ACCESORIOS </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="O" type="radio" ng-model="equipoOpcion" required />OPCIONES   </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="T" type="radio" ng-model="equipoOpcion" required />NACIONALES </label>
            <label><input name="equipoOpcion" id="equipoOpcion" value="S" type="radio" ng-model="equipoOpcion" required />SERVICIO   </label>
        </div>
    <table  class="table table-striped table-condense" border="0">
      <tr> 
        <th colspan="3">
          <div class="form-group has-info">
            <label class="control-label" for="addon1">Ingresa codigo de proveedor: <i class="material-icons">search</i></label>
            <div class="input-group">
              <span class="input-group-addon"></span>
                {!! Form::text('todoText',null,array('class'=>'form-control',"ng-model"=>"todoText","ng-change"=>"equiposLst()",'id'=>'todoText',"placeholder"=>"Buscar equipo")) !!}
                {!! Form::hidden('codigo',null,array('class'=>'form-control','ng-model'=>'codigo','id'=>'codigo')) !!}
                {!! Form::hidden('m_product_id',null,array('class'=>'form-control',"ng-model"=>"m_product_id",'id'=>'m_product_id')) !!}
            </div> 
          </div>
          </th> 
          <th>
          </th>
        </tr>
        <tr>
            <td colspan="2" width="60%">
            <div class=" col-md-12">
                <div class="form-group has-info">                
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <div class=" col-md-12">
                
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
              <div class="panel-body" id="scroll">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                    <th></th>
                        <th>EQUIPO</th>
                        <th>CÓDIGO</th>
                        <th>COSTO</th>
                        <th>PRECIO</th>
                    </tr> 
                  </thead>
                  <tbody>                          
                      <tr ng-repeat="insumo in insumosTodos" ng-init="setTotals(todo)" ng-model="insumo" ng-click="equipo(insumo)"> 
                        <td> 
                            <div class="ckbox">
                              <!--<input type="radio" id="checkbox5" name="checkbox5">-->
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
                      <td colspan="3">Paquete No.: <input type="text" value="" id="combo" readonly="readonly" ng-model="maximo" ng-init="maximoLst()" size="20"></td>
                 </div>
                  <button class="btn btn-warning btn-fab" for="todoText" type="button" ng-click="addPacks()" value="add"><i class="material-icons">add_shopping_cart</i></button>
            </div>

      <hr>
      <!--FIN TABLA PARA RESULTADOS ENCONTRADOS-->
      <h4><%submit%></h4>
        {!! Form::open(['route'=>'paquetes.store','method'=>'POST']) !!}
    <table>
        <tr>
            <th><input type="text" value="" id="combo" placeholder="ID"         size="3"></th>
            <th><input type="text" value="" id="combo" placeholder="TIPO"       size="3"></th>
            <th><input type="text" value="" id="combo" placeholder="CANT."   size="3">  </th>
            <th><input type="text" value="" id="combo" placeholder="CÓDIGO">    </th>
            <th><input type="text" value="" id="combo" placeholder="DESCRIPCIÓN">   </th>
            <th><input type="text" value="" id="combo" placeholder="COSTO"      size="10"> </th>
            <th><input type="text" value="" id="combo" placeholder="PRECIO"     size="10">    </th>
            <th><input type="text" value="" id="combo" placeholder="TOTAL"      size="15"> </th>
            <th><input type="text" value="" id="combo" name="noPaquete" placeholder="PACK"      size="5"> </th>
        </tr>
        <tr ng-repeat="pack in packs" ng-init="setTotals(pack)" ng-click="remover($index)"> 
            <td> <input type="text"   value="<% pack.ide%>"         name="objeto[<%$index + 1%>][id_equipo]"      size="3"> </td> 
            <td> <input type="text"   value="<% pack.bandera %>"    name="objeto[<%$index + 1%>][bandera_insumo]" size="3"> </td> 
            <td> <input type="text"   value="<% pack.cantidad %>"   name="objeto[<%$index + 1%>][cantidad]"       size="3"> </td> 
            <td> <input type="text"   value="<% pack.codigo %>"     name="objeto[<%$index + 1%>][codigo_proovedor]"size="20"></td> 
            <td> <input type="text"   value="<% pack.descripcion %>"name="objeto[<%$index + 1%>][descripcion]"    size="50"></td> 
            <td> <input type="text"   value="<% pack.costo %>"      name="objeto[<%$index + 1%>][costo]"          size="10"></td> 
            <td> <input type="text"   value="<% pack.precio %>"     name="objeto[<%$index + 1%>][precio]"         size="10"></td> 
            <td> <input type="text"   value="<% pack.total %>"      name="objeto[<%$index + 1%>][total]"          size="15"></td> 
            <td> <input type="text"   value="<% pack.pack %>"       name="objeto[<%$index + 1%>][id_pack]"        size="5"></td> 
            <td> 
            <input type="hidden" value="view_list"             name="objeto[<%$index + 1%>][bandera_icono]">
            <input type="hidden" value="<?php echo Auth::user()->name ?>" name="objeto[<%$index + 1%>][usuario]">
            </td> 
        </tr>
    </table>
  </div>
  <div class="panel-footer"> 
    <!-- {!! Form::submit('GUARDAR',array('class'=>'btn btn-primary')) !!} -->
    <button type="submit"class="btn btn-raised btn-info btn-lg"><i class="material-icons">save</i>GUARDAR</button>
    {!! Form::close() !!}
  </div>
</div>