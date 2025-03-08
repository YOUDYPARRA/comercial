@extends('app')
@section('content')
<div class="container">             <!--USERS -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info" ng-controller="CotizacionCtrl" ng-init="id='{{$cotizacion->id}}'">
                <div class='panel-heading panel-info' >EDITAR COTIZACIÓN: {{$cotizacion->numero_cotizacion}} ESTATUS: {{$cotizacion->estatus}} <%cotizacion.equipo%></div>
                @if(($cotizacion->estatus == "GUARDADO" || $cotizacion->estatus == "APROBADO") &&  Auth::user()->area  != "SERVICIO TECNICO")
                    <span>UPDATE Desde consumibles</span>
                     {!! Form::model($cotizacion, ['route'=>['cotizaciones.update',$cotizacion->id],'method'=>'PUT','name'=>'formCotizacion']) !!}
                @endif             
                @if(Auth::user()->area  == "SERVICIO TECNICO")
                    <span>UPDATE Desde Servicio</span>
                     {!! Form::model($cotizacion, ['route'=>['cotizaciones.update',$cotizacion->id],'method'=>'PUT','name'=>'formCotizacion']) !!}
                @endif
                <div class="panel-body">
                  <div class="row" ng-if="ver_act">
                    <div class='col-md-6'>       
                      <div class="form-group has-warning">
                        <span class="badge badge-warning" ng-show="formCotizacion.tipo_actualizacion.$error.required">*</span>
                        <label class='control-label'><i class='material-icons'></i> TIPO ACTUALIZACION</label>
                        <select name="tipo_actualizacion" ng-model="tipo_actualizacion" class="form-control" ng-change="bloquear(tipo_actualizacion)" required>
                          <option value="">Elige una opción</option>
                          <option value="actualizar">ACTUALIZAR</option>
                          <option value="version">CREA VERSION</option>
                        </select>
                      </div>
                    </div>  
                  </div>
                    @include('cotizaciones.partials.FormCotizacion0')          
                    @include('cotizaciones.partials.FormCotizacion1')                                                                                             
                    <div class="panel panel-default">   
                         <div class="panel-heading">PRODUCTOS</div>
                         <div class="panel-body">
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
                          <li class="active" style="background-color: #BBBBBB"><a href="#htab1" data-toggle="tab"><i class="material-icons">playlist_add_check</i>EQUIPOS</a></li>
                          <li style="background-color: #AAAAAA"><a href="#htab2" data-toggle="tab"><i class="material-icons">devices_other</i>PAQUETE </a></li>
                          <li style="background-color: #999999"><a href="#htab3" data-toggle="tab"><i class="material-icons">print</i> BUSCAR PRODUCTO </a></li>
                        </ul>
                        <div class="tab-content" >
                          <div role="tabpanel" class="tab-pane fade in active" id="htab1" ng-show="ver_equipos">
                          </div><!-- TAB PANEL 1 -->
                          <div role="tabpanel" class="tab-pane fade" id="htab2" ng-show="ver_paquete">
                           <p class="text-warning"> BUSCAR PAQUETES</p>
                            @include('cotizaciones.partials.FormCotizacionPaquete')
                          </div><!-- TAB PANEL 2 -->
                          <div role="tabpanel" class="tab-pane fade" id="htab3" ng-show="ver_busqueda">
                            <p class="text-warning"> BUSCAR PRODUCTOS </p>
                            @include('cotizaciones.partials.FormCotizacionBusqueda')
                          </div><!-- TAB PANEL 3 -->
                        </div ><!-- TAB CONTENT -->
                      </div>                                                                     <!-- ------------------------------------------------------------------                FIN PANEL BODY -->
                        <div class="panel-footer"> 
                      </div>    <!-- FIN FOOTER -->
                    </div>                  
                      @include('cotizaciones.partials.FormCotizacion2')
                <div>                                                   <!-- -----------------------------------------------------------------              FIN PANEL DEFAULT -->
                  @include('cotizaciones.partials.FormCotizacionCondiciones')
                </div>
                </div> <!-- FIN BODY -->
                <div class="panel-footer"> 
                        <button type="submit" class="btn btn-raised btn-info btn-lg" ng-disabled="formCotizacion.$invalid"><i class="material-icons">cached</i>ACTUALIZAR</button
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection