<div class="panel panel-info"> 

  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS EQUIPO <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 
    <fieldset ng-disabled="esc_datosEquipo">
    <div class="row">
      <div class='col-md-6'>        
          <div class="form-group has-info">
            <label class='control-label'>BUSCAR </label>
              {!! Form::text('name',null,array('ng-model'=>'name','class'=>'form-control','placeholder'=>'Burcar nombre','ng-change'=>'buscarDireccion(name)')) !!}
          </div>
      </div>
    </div>  
    <div class="row">
        <div class='col-md-3'>        
            <div class="form-group has-info">
            <label class='control-label'>UBICACION <%direcciones.length%><!--<span class="badge"> <%direcciones.length%> </span>--></label>
            <select name="direccion" ng-model="objeto.direccion" class="form-control" ng-change="setDir(objeto.direccion)">
                    <option value="">Elige una dirección</option>
                    <option ng-repeat="org in direcciones | orderBy : 'name'"  value="<%org%>"><%org.name%> <-> <%org.city%> <-> <%org.region_name%><-> <%org.address1%></option>
            </select>
            </div>
        </div>
        <div class='col-md-3'>        
          <div class="form-group has-info">
            <label class='control-label'>EQUIPO </label>
            	{!! Form::text('equipo',null,array('ng-model'=>'equipo','class'=>'form-control','placeholder'=>'equipo')) !!}
          </div>
        </div>
        <div class='col-md-2'>        
          <div class="form-group has-info">
            <label class='control-label'>MARCA </label>
        	    {!! Form::text('marca',null,array('ng-model'=>'marca','class'=>'form-control','placeholder'=>'marca')) !!}
          </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
              <label class='control-label'>MODELO</label>
              	{!! Form::text('modelo',null,array('ng-model'=>'modelo','class'=>'form-control','placeholder'=>'modelo')) !!}
            </div>
        </div>
        <div class='col-md-2'>        
            <div class="form-group has-info">
              <label class='control-label'>SERIE</label>
                {!! Form::text('numero_serie',null,array('ng-model'=>'filtro.numero_serie','class'=>'form-control','placeholder'=>'serie')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'>COORDINACION</label>
                <select  ng-model="objeto.coordinacion" ng-options="coordinacion.nombre as coordinacion.nombre for coordinacion in filtro.coordinacion.objetos" class="form-control">
                       <option value="">Elegir. . .</option>
                </select>          
            </div>            
        </div>
        <div class='col-md-3'>        
            <div class="form-group has-info">
                <label class='control-label'>TIPO SERVICIO</label>
                <select  ng-model="objeto.tipo_servicio" ng-options="tipo_servicio.nombre as tipo_servicio.nombre for tipo_servicio in tipos_servicio" class="form-control">
                       <option value="">Elegir. . .</option>
                </select>        
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'>FECHA INICIO SERVICIO</label>
                <md-datepicker ng-model="fec_ini_ser" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaIniServ(fec_ini_ser)"></md-datepicker>
                {!! Form::hidden('fecha_inicio',null,array('ng-model'=>'filtro.fecha_inicio','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(filtro.fecha_inicio)')) !!}
                <span ng-show="formContratos.fecha_inicio.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-info">
                <label class='control-label'>FECHA FIN SERVICIO</label>
                <md-datepicker ng-model="fec_fin_ser" md-placeholder="Selecciona la fecha ==>" ng-change="selectFechaFinServ(fec_fin_ser)"></md-datepicker>
                {!! Form::hidden('fecha_fin',null,array('ng-model'=>'filtro.fecha_fin','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(filtro.fecha_fin)')) !!}
                <span ng-show="formContratos.fecha_fin.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>

            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4'>
            <div class="form-group has-info">
                <label class='control-label'>HORARIO</label>
                {!! Form::text('hora_atencion',null,array('ng-model'=>'filtro.hora_atencion','class'=>'form-control','placeholder'=>'Horario')) !!}
            </div>
        </div>
      <div class='col-md-8'>        
          <div class="form-group has-info">
          <label class='control-label'></label>
            <button type="button" class="btn btn-info" ng-click=" agrEquipo()"> <i class='material-icons'>add</i>Agregar</button> <span class="badge badge-warning"><%mensaje%></span>
          </div>
      </div>
    </div>
</fieldset>
     <div class="row">
     
            <!--INICIA tabla-->
                 <table class="table table-striped table-bordered table-list table-responsive">
                      <thead><tr>
                                <th>NO</th>
                                <th>UBICACION</th>
                                <th>EQUIPO</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>SERIE</th>
                                <th>COORDINACION</th>
                                <th>TIPO SERVICIO</th>
                                <th>FECHA INICIO</th>
                                <th>FECHA FIN</th>
                                <th>HORARIO</th>
                                <td></td>
                                <td></td>
                      </tr></thead>
                      <tbody> 
                      <tr ng-repeat="equipo in equipos" >
                        <div ng-if=" $index > 9" style="font-size:4pt;color:#ff9900">
                          <td> <% $index+1 %> </td>
                          <td> <% equipo.nombre_cliente %> <% equipo.ciudad %> </td>
                          <td> <% equipo.equipo %> </td>
                          <td> <% equipo.marca %> </td>
                          <td> <% equipo.modelo %> </td>
                          <td> <% equipo.numero_serie %> </td>
                          <td> <% equipo.coordinacion %> </td>
                          <td> <% equipo.tipo_servicio %> </td>
                          <td> <% equipo.fecha_inicio %> </td>
                          <td> <% equipo.fecha_fin %></td>                              
                          <td> <% equipo.hora_atencion %></td>                              
                          <td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index)"><i class="material-icons">delete_forever</i></p></td>
                          <td><p class="text-info" title="EDITAR PRODUCTO" ng-click="editar($index,equipo)"><i class="material-icons">edit</i></p></td>
                        </div>
                      </tr>
                    </tbody>
                </table>
            <!--FIN tabla-->                
             
        </div>
    </div>
</div>