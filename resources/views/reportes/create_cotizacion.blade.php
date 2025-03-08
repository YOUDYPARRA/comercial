@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0" >
      <div class="panel panel-info" ng-controller="CotizacionCtrl" ng-init="reporte='{{$objeto}}'"> 
      <div class="panel-heading"><i class="material-icons">note_add</i> CREAR COTIZACIÓN: <%numero_cotizacion%> <%cotizacion.equipo%><span ng-show="progress" class="badge badge-warning"> Cargando ...</span></div>
      <div class="panel-body" >
	     {!! Form::open(array('action' => 'CotizacionController@store','name'=>'formCotizacion')) !!} 
				@include('cotizaciones.partials.FormCotizacion0')          
      	@include('cotizaciones.partials.FormCotizacion1')                             
        <div class="panel panel-default">	
	         <div class="panel-heading">PRODUCTOS </div>
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
                <p class="text-warning"> BUSCAR PRODUCTOS  <span ng-show="progress" class="badge badge-warning"> Cargando ...</span></p>
                  @include('cotizaciones.partials.FormCotizacionBusqueda')
              </div><!-- TAB PANEL 3 -->
            </div ><!-- TAB CONTENT -->
          </div>					                                                 <!-- ------------------------------------------------------------------				FIN PANEL BODY -->
	        <div class="panel-footer"> 
          </div>    <!-- FIN FOOTER -->
            @include('cotizaciones.partials.FormCotizacion2')
        </div>					
      <div>                                                   <!-- ----------------------------------------------------------------- 				FIN PANEL DEFAULT -->
        @include('cotizaciones.partials.FormCotizacionCondiciones')
      </div>
    </div> <!-- FIN BODY -->
    <div class="panel-footer"> 
      <button type="submit" class="btn btn-raised btn-info btn-lg" ng-disabled="formCotizacion.$invalid" onclick="return confirm('¿Esta seguro que desea enviar los datos?');"><i class="material-icons">save</i> GUARDAR</button>
    </div>
  </div>
    {!! Form::close() !!} 

		</div>
	</div>
</div>
@endsection