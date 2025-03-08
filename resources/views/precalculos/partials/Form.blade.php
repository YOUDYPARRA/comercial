<div class="row">
    <div class="col-sm-12"><!--
            <h2>Nav-tabs Dropdown <small>Horizontal</small></h2>
            <p class="lead">Dropdown appears at width less than or equal to 768px</p> -->
           <!-- <a href="#" class="nav-tabs-dropdown navbar-custom btn btn-block btn-info">Tabs</a>-->
            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
              <li class="active"><a href="#htab1" data-toggle="tab"><i class="material-icons">face</i> DATOS CLIENTE</a></li>
              <li><a href="#htab2" data-toggle="tab"><i class="material-icons">devices_other</i> DATOS EQUIPO </a></li>
              <li><a href="#htab3" data-toggle="tab" ng-click="buscarTipoCambioActual()"><i class="material-icons">perm_media</i> DATOS CÁLCULO IMAGENOLOGÍA: <h4><p class="text-info"><b>!! <%model%> ¡¡</b></p></h4></a></li>
              <li><a href="#htab4" data-toggle="tab"><i class="material-icons">assessment</i> DATOS PRE-CÁLCULO <h4><p class="text-info"><b>!! <%model%> ¡¡</b></p></h4></a></a></li>
              <!--<li><a href="#htab5" data-toggle="tab"><i class="material-icons">timeline</i> PRECALCULOS</a></li>-->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="htab1">
                    <div class="panel panel-info">
                        <!--<div class='panel-heading'><i class="material-icons">face</i></div>-->
                        <div class='panel-body'>

                        <!-- ------------------------------------------------------------------------ -->
{!! Form::hidden('id',null,array('ng-model'=>'precalculos.id','class'=>'form-control')) !!}
{!! Form::hidden('id_catalogo',null,array('ng-model'=>'precalculos.id_catalogo','class'=>'form-control')) !!}
<!--
<div class="form-group label-floating has-info">
    <label class='control-label'><i class='material-icons'>nombre_icono</i> ID</label>
</div>
<div class="form-group label-floating has-info">
    <label class='control-label'><i class='material-icons'>nombre_icono</i> CATÁLOGO</label>            
</div>-->
<div class="row">
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>SUCURSAL: </label>
                {!! Form::text('sucursal','<%sucursal%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>NO DE PROYECTO: </label>
                {!! Form::text('numero_proyecto',null,array('ng-model'=>'precalculos.numero_proyecto','class'=>'form-control','placeholder'=>'Escribe el número de proyecto')) !!}
                @if(isset($id))
                {!! Form::hidden('id',null,array('ng-model'=>'precalculos.id','readonly'=>'readonly','class'=>'form-control','ng-init'=>'precalculos.id='.$id)) !!}
                @else
                {!! Form::hidden('id_cotizacion',null,array('ng-model'=>'precalculos.id_cotizacion','readonly'=>'readonly','class'=>'form-control','ng-init'=>'precalculos.id_cotizacion='.$id_cotizacion)) !!}
                @endif
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>NO DE COTIZACIÓN: </label>
                {!! Form::text('cotizacion','<%cotizacion.numero_cotizacion%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-3'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>FECHA: </label>
                {!! Form::text('fecha','<%fecha%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>CLIENTE: </label>
                {!! Form::text('cliente','<%cotizacion.nombre_fiscal%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>VENDEDOR: <%%></label>
                {!! Form::text('vendedor','<%cotizacion.nombre_empleado%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-12'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>DESCRIPCIÓN CORTA DEL SERVICIO/EQUIPO OFRECIDO: </label>
                {!! Form::text('descripcion','<%insumos[0].descripcion%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'></i>PLAZO DE ENTREGA </label>
                {!! Form::text('fecha','<%cotizacion.fecha_entrega%>',array('class'=>'form-control','readonly'=>'readonly')) !!}
            </div>
        </div>
        <div class='col-md-6'>        
            <div class="form-group  has-info">
                <!-- <label class='control-label'><i class='material-icons'></i>TERMINOS DE PAGO</label> -->
            </div>
        </div>
</div>
<div class="row">
        <div class='col-md-4'>        
            <div class="form-group  has-info">
                <!--<label class='control-label' ><i class='material-icons'></i>MONEDA: <%cotizacion.tipo_moneda%></label>-->
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-info">
            <!--     <label class='control-label'><i class='material-icons'></i>MES ESERADO DE FACTURACIÓN</label>  -->
            </div>
        </div>
        <div class='col-md-4'>        
            <div class="form-group  has-info">
               <!-- <label class='control-label'><i class='material-icons'></i>NO DE MESES DE GARANTIA</label>-->
            </div>
        </div>
</div>

                        </div><!-- PANEL BODY -->
                        <div class="panel-footer"> </div>  <!-- FOOTER -->
                    </div><!-- PANEL PANEL INFO -->
                </div><!-- TAB PANEL 1 -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

                <div role="tabpanel" class="tab-pane fade" id="htab2">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons">devices_other</i></div>
                        <div class='panel-body'>

                    <table border="0" class="table table-striped table-condensed">
                        <tr>
                            <th></th>     
                            <th>Código</td> 
                            <th>Tipo equipo</th>    
                            <th>Marca</th>  
                            <th>Modelo</th> 
                          <th>Precio</th>
                            <th>Moneda</th>   
                            <th></th>   
                        </tr> <!-- ok-->

                        <tr ng-repeat="todo in insumos" ng-if="todo.insumo_bandera_insumo == 'E'"><!-- ng-init="setTotals(todo)">-->
                                    <td><% todo.insumo_bandera_insumo %></td>
                                    <td><% todo.insumo_proovedor %></td>
                                    <td><% todo.insumo_tipo_equipo %></td>
                                    <td><% todo.insumo_marca %></td>
                                    <td><% todo.insumo_modelo %></td>
                                    <td><% cotizacion.total | number:2 %></td>
                                    <td><% cotizacion.tipo_moneda %></td>
                            <td>
                                <button type="button" class="btn btn-info btn-lg" ng-click="calImagenologia(cotizacion.subtotal,todo.insumo_tipo_equipo,todo.insumo_modelo,todo.tipo_cambio);" title="Enviar a Cálculo Imagenología"><i class="material-icons">perm_media</i></button>
                            </td>
                        </tr>                       
                    </table>



                        </div><!-- PANEL BODY -->
                        <div class="panel-footer"> </div>  <!-- FOOTER -->
                    </div><!-- PANEL PANEL INFO -->
                </div><!-- TAB PANEL 2 -->
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->
                @include('precalculos.partials.FormImagen')
<!-- ------------------------------------------------------------------------------------------------------------------------------ --> 
                @include('precalculos.partials.FormPrecalculo')
<!-- ------------------------------------------------------------------------------------------------------------------------------ --> 

                            <!--    <div role="tabpanel" class="tab-pane fade in active" id="hstab5">
                    <div class="panel panel-info">
                        <div class='panel-heading'><i class="material-icons"></i>Comisiones a terceros</div>
                        <div class='panel-body'>
                            <h3>submenu 5</h3>
                        </div>
                    </div> 
                </div> <!-- --------------------------------------------------------------------------------------------------- SUBTAB 5 -->
            </div> <!-- --------------------------------------------------------------------------------------------------- TAB CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->                        



                        </div><!-- PANEL BODY -->
                        <div class="panel-footer"> </div>  <!-- FOOTER -->
                    </div><!-- PANEL PANEL INFO -->
                </div>  <!-- TAB PANEL 4 -->
            </div> <!-- TAB CONTENT -->
    </div> <!-- COL-SM-12 -->
</div><!-- ROW -->

<!-- ------------------------------------------------------------------------------------------------------------------- NAV TABS --> 
