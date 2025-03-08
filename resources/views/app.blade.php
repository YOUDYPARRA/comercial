<!DOCTYPE html>
<html lang="es" ng-app="cotizacionApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/logo/SMH_icon1.png" /> <!--/logo/SMH_LOGO3.png-->
  <title>SMH COMERCIAL</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.6/angular-material.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"      rel="stylesheet"/>
    <link href="/bower_components/angular/angularjs-datetime-picker.css"      rel="stylesheet"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300'             rel='stylesheet' type='text/css'>
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') !!}        <!--CSS DE FORMULARIO -->

  <style>
    button[title]:hover:after {
    content: attr(title);
    padding: 4px 8px;
    color: #333;
    position: absolute;
    left: 0;
    top: 100%;
    white-space: nowrap;
    z-index: 20px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 0px 0px 4px #222;
    -webkit-box-shadow: 0px 0px 4px #222;
    box-shadow: 0px 0px 4px #222;
    background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #eeeeee),color-stop(1, #cccccc));
    background-image: -webkit-linear-gradient(top, #eeeeee, #cccccc);
    background-image: -moz-linear-gradient(top, #eeeeee, #cccccc);
    background-image: -ms-linear-gradient(top, #eeeeee, #cccccc);
    background-image: -o-linear-gradient(top, #eeeeee, #cccccc);
    }
.error {  color: red;  }
.valid.false {  background: red;}
.badge-error {  background-color: #b94a48;}
.badge-warning {  background-color: #f89406;}
.badge-info {   background-color: #3a87ad;}
.badge-success {  background-color: #468847;}
.badge-inverse {  background-color: #333333;}
    /*<!-- --------------------------------------------------------------------------------------------- -->*/
.nav-tabs-dropdown {
  display: none;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.nav-tabs-dropdown:before {
  content: "\e114";
  font-family: 'Glyphicons Halflings';
  position: absolute;
  right: 30px;
}

@media screen and (min-width: 769px) {
  #nav-tabs-wrapper {
    display: block!important;
  }
}

@media screen and (max-width: 768px) {
    .nav-tabs-dropdown {
        display: block;
    }
    #nav-tabs-wrapper {
        display: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        text-align: center;
    }
   .nav-tabs-horizontal {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;   /* GRIS */
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
   }
    .nav-tabs-horizontal  > li {
        float: none;
    }
    .nav-tabs-horizontal  > li + li {
        margin-left: 2px;
    }
    .nav-tabs-horizontal > li,
    .nav-tabs-horizontal > li > a {
        background: transparent;
        width: 100%;
    }
    .nav-tabs-horizontal  > li > a {
        border-radius: 4px;
    }
    .nav-tabs-horizontal  > li.active > a,
    .nav-tabs-horizontal  > li.active > a:hover,
    .nav-tabs-horizontal  > li.active > a:focus {
        color: #ffffff;
        background-color: #428bca; /* AZUL */
    }
}
    /* <!----------------------------------------------------------------------------------------------- --> */
    .navbar-custom{
        color:#FFFFFF;
        background-color: #0066ff;
        /*min-height:28px !important;*/
        /*height: 28px;
        width: 760px; */
        /*width: 1566px; /*DEFINE EL ANCHO DEL NAV BAR*/
    }

#combo{
    font-family: Tahoma, Verdana, Arial;
    font-size: 11px;
    color: #707070;
    background-color: #FFFFFF;
    border-width:0;
}
    [scroll-glue-top]{
        height: 420px;
        overflow-y: auto;
        }
      [scroll-glue-bottom],
      [scroll-glue]{
        height: 120px;
        overflow-y: scroll;
        border: 1px solid gray;
      }
      [scroll-glue-left],
      [scroll-glue-right]{
        width: 100px;
        overflow-x: scroll;
        border: 1px solid gray;
        padding: 10px;
      }
      [scroll-glue-left] span,
      [scroll-glue-right] span{
        border: 1px solid black;
      }
</style>
</head>

<body>

  <nav class="navbar navbar-default navbar-inverse" role="navigation" ng-controller="avisosSistemaCtrl">
    <div class="container-fluid navbar-custom">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuPrincipal" aria-expanded="true">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img style="max-width:130px; margin-top: 8px; margin-left: 10px" src="/logo/SMH_LOGO4.png">
        </a>
        </div>
                    <div class='collapse navbar-collapse in' id="menuPrincipal" aria-expanded="true" ng-click="getAvisos()">

                        <ul class="nav navbar-nav">
                            <li class="active">
                              <a href="{{ URL::to('home/') }}">INICIO</a>
                            </li>
                        <!--{{ 'AQI VA EL NUEVO MENU'}}-->
                        {!! HelperPermiso::opciones() !!}
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                            <li><a href="{{route('auth/login')}}">Identificarse</a></li>
                            @else
                            {{--COLOCAR FORMULARIO DE SWITCH DE ROL:: SI USUARIO TIENE MAS DE UN ROL--}}
                            @include('partials.FormSwitchRol')
                            {{--FIN SWITCH DE ROL--}}
                                    <li> <a href='#'> {{Auth::user()->org_name}}</a></li>
                                    <li  ng-init="id='{{Auth::user()->id}}'" > <a href='#' ng-model='auth'> {{ Auth::user()->name }} </a></li>
                                    <li> <div> <span class="badge badge-info"><%avisos.length%></span> </div></li>
                                    <li> <a href="{{ route('auth/logout') }}"> SALIR </a> </li>
                            @endif
                        </ul>
                    </div>
    </div>
  </nav>
    <div class="container">
        @if(Session::has('errors'))
        <div class='alert alert-warning'>
            <ul>
                <strong>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}  </li>
                    @endforeach
                </strong>
            </ul>
        </div>
        @endif
        @if (session('success'))
            <div class="flash-message">
                <div class="alert alert-success">{{ Session::get( 'success' ) }}</div>
            </div>
        @endif
        @if(session()->has('message'))
    		<div class="alert alert-info">
        		{{ session()->get('message') }}
    		</div>
		@endif
    </div>

  @yield('content')
     {!! Html::script("bower_components/angular/angular.min.js") !!}
     {!! Html::script("bower_components/angular/angular-input-date.js") !!}<!--ADD 20161128---->
     {!! Html::script("bower_components/scripts/controllers/pdfmake.js") !!}
     {!! Html::script("bower_components/scripts/controllers/vfs_fonts.js") !!}
        {!! Html::script("bower_components/angular/angular-resource.min.js") !!}
        {!! Html::script("bower_components/angular/angular-confirm.min.js") !!}
        {!! Html::script("bower_components/angular/angular-confirm.js") !!}

        <!-- AngularJS Material Dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular-messages.min.js"></script>
    <!-- AngularJS Material Javascript now available via Google CDN; version 1.1.4 used here -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.6/angular-material.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="https://cdn.rawgit.com/jtblin/angular-chart.js/master/dist/angular-chart.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>

        {!! Html::script("bower_components/scripts/controllers/InsumoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/GrupoUsuarioCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/MenuCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PrecalculoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CatalogoCalculoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PagareCtrl.js") !!}

        {!! Html::script("bower_components/scripts/controllers/ContratoCompraVentaCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ConversionCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/EquipoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/AprobCotCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CondicionCotizacionCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/MarcaProveedorCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PermisoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/RecursoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/EnsableCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/StockCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PaqueteCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/OrdenVentaCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/cotizacion.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CotizacionCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CotizacionPdfCtrl.js") !!}

        <!--                 FACTURACION          -->
        {!! Html::script("bower_components/scripts/services/facturacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/facturacion.js") !!}
        <!--                 INICIO DEL FIN DEL SISTEMA           -->
        {!! Html::script("bower_components/scripts/controllers/ContratoServicioIndexCtrl.js") !!}
        <!--                 AVISOS SISTEMA           -->
        {!! Html::script("bower_components/scripts/services/avisosSistemaSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/AvisosSistemaConfigCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/AvisosSistemaCtrl.js") !!}
        <!--                 GRAFICOS VTA            -->
        <!--{!! Html::script("bower_components/scripts/services/graficoVtaSrv.js") !!}-->
        <!--                 CLASIFICACION OPERACION            -->
        {!! Html::script("bower_components/scripts/services/clasificacionOperacionSrv.js") !!}
        <!--                 TICKET OPERACION            -->
        {!! Html::script("bower_components/scripts/services/ticketOperacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/TicketOperacionCtrl.js") !!}
        <!--                 UNIDADES DE MEDIDA            -->
        {!! Html::script("bower_components/scripts/services/unidadMedidaSrv.js") !!}
        <!--                 UOM CONVERTIONS               -->
        <!--{!! Html::script("bower_components/scripts/services/uomConvertionSrv.js") !!}-->
        <!--                 PROYECTOS COMERCIAL               -->
        {!! Html::script("bower_components/scripts/services/mensualSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/MensualidadCtrl.js") !!}
        {!! Html::script("bower_components/scripts/models/ciudadEstado.js") !!}
        {!! Html::script("bower_components/scripts/services/ciudadSrv.js") !!}

        {!! Html::script("bower_components/scripts/models/proyectoVenta.js") !!}
        {!! Html::script("bower_components/scripts/services/proyectoVentaSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ProyectoVentaCtrl.js") !!}
        <!--                 PROYECTOS COMERCIAL               -->
        {!! Html::script("bower_components/scripts/models/cotizacionCCV.js") !!}
        {!! Html::script("bower_components/scripts/services/cotizacionCCVSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CotizacionCCVCtrl.js") !!}
<!-- -->
        {!! Html::script("bower_components/scripts/models/almacenStock.js") !!}
        {!! Html::script("bower_components/scripts/services/almacenStockSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/GestionStockSrv.js") !!}
<!---->
        {!! Html::script("bower_components/scripts/controllers/stockControlCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/contratoEqpVigSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ConvenioCtrl.js") !!}
        {!! Html::script("bower_components/scripts/models/convenio.js") !!}
        {!! Html::script("bower_components/scripts/services/convenioSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/tipoContrato.js") !!}
        {!! Html::script("bower_components/scripts/models/tipoServicio.js") !!}

        {!! Html::script("bower_components/scripts/services/referenceBSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/procesoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/ordenServicioSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/ordenServicio.js") !!}
        {!! Html::script("bower_components/scripts/controllers/AExpendioCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/cotizacionContratoSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/cotizacionContrato.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CotizacionContratoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/plantillaSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/plantilla.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PlantillaCtrl.js") !!}

        {!! Html::script("bower_components/scripts/models/sucursal.js") !!}
        {!! Html::script("bower_components/scripts/models/organizacion.js") !!}
        {!! Html::script("bower_components/scripts/services/expendioSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/expendio.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ExpendioCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/contratoSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/contrato.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ContratoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ContratoPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ContratoPdfCtrl_old.js") !!}

        {!! Html::script("bower_components/scripts/services/prestamoSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/prestamo.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PrestamoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PrestamosPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/servicioSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/servicioReporteSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/servicio.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ServicioCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ServicioReporteCtrl.js") !!}

        {!! Html::script("bower_components/scripts/services/programacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/programacion.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ProgramacionCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/custodiaSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/custodia.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CustodiaCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CustodiaPdfCtrl.js") !!}
        <!--{!! Html::script("bower_components/scripts/controllers/cotizacionSugerencia.js") !!}
        {!! Html::script("bower_components/scripts/controllers/direcciones.js") !!}-->
        {!! Html::script("bower_components/scripts/controllers/condicionPagoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/models/condicionPago.js") !!}
        {!! Html::script("bower_components/scripts/models/coordinacion.js") !!}
        {!! Html::script("bower_components/scripts/models/reporte.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ReporteCtrl.js") !!}
        {!! Html::script("bower_components/scripts/models/tercero.js") !!}
        {!! Html::script("bower_components/scripts/models/direccion.js") !!}
        {!! Html::script("bower_components/scripts/models/producto.js") !!}
        {!! Html::script("bower_components/scripts/models/comercial.js") !!}
        {!! Html::script("bower_components/scripts/models/terceroComercial.js") !!}
        {!! Html::script("bower_components/scripts/services/terceroComercialSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/comercialesSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/coordinacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/reporteSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/productoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/taxVSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/organizacionVSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/productV.js") !!}
        {!! Html::script("bower_components/scripts/services/proyUserSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/tipoMonedaSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/centroCostoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/metodoPagoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/tipoAlmacenSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/tipoTransaccionSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/campanaPublicidadSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/categoriaProductoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/condicionPagoTiempoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/metodoEnvioSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/condicionFacturaSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/ventaSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/componenteSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/insumoOpcionalSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/insumoOpcionalConsultarSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/grupoUsuarioSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/gruposSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/precalculoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/tercerosSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/direccionesSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/contactosSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/equiposSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/stockSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/insumosSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/maximoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/ultimoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/ultimoPreSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/paquetesSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/catalogoCalculoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/precalculoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/condicionCotizacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/contratoCompraVentaSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/MenuSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/pagareSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/PagarePdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/paqueteSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/recursoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/marcaProveedorSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/permisoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/conversionesSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/cotizacionSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/userSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/agenteAduanalSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/compraSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/condicionPagoSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/modoEnvioSrv.js") !!}
        {!! Html::script("bower_components/scripts/services/cotizacionPaqueteInsumoSrv.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CotizacionContratoPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/formatosGdfPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/reporteCompraVentaPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ContratoCompraVentaPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ContratoCompraVentaPdfAnexoCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/SolicitudCompraPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CompraCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/CompraPdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/services/devolucionSrv.js") !!}
        {!! Html::script("bower_components/scripts/models/devolucion.js") !!}
        {!! Html::script("bower_components/scripts/controllers/DevolucionCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/NumeroAletraCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/ReportePdfCtrl.js") !!}
        {!! Html::script("bower_components/scripts/controllers/OrdenServicioPdfCtrl.js") !!}
        <!--{!! Html::script("bower_components/scripts/services/cotizacionesPorUsuarioSrv.js") !!} --><!--add ems 20180403-->
        {!! Html::script("bower_components/scripts/controllers/InsumoOpcionalCtrl.js") !!}
        <!--{!! Html::script("bower_components/scripts/controllers/GraficasCtrl.js") !!}-->


  {!! Html::script("bower_components/ng-scroll-glue/dist/ng-scroll-glue.min.js") !!}
  {!! Html::script("bower_components/jquery/dist/jquery.min.js") !!}
  {!! Html::script("bower_components/moment/min/moment.min.js") !!}
  {!! Html::script("bower_components/bootstrap/dist/js/bootstrap.min.js") !!}
  {!! Html::script("bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") !!}
  {!! Html::script("bower_components/bootstrap-material-design/dist/js/ripples.min.js") !!}
  {!! Html::script("bower_components/bootstrap-material-design/dist/js/material.min.js") !!}





  <script type="text/javascript">

  $(document).on('ready',function(){
    $("formCotizacion").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    $("formCotizacion").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
    $.material.init();
    var dat= new Date();
        moment.locale();
        var today=moment().format('LL');
        var d = dat.getDate();
        var m = dat.getMonth();
        var y = dat.getFullYear();
        var meses = [
  "Enero", "Febrero", "Marzo",
  "Abril", "Mayo", "Junio", "Julio",
  "Agosto", "Septiembre", "Octubre",
  "Noviembre", "Diciembre"
];

    $("#fecha").datetimepicker({
      defaultDate:dat,
      format: "YYYY-MM-DD"
    });

    $("#fecha_factura").datetimepicker({
      defaultDate : dat,
      format: "YYYY-MM-DD",
    });

    $("#fecha_entrega").datetimepicker({
      defaultDate : dat,
      format: "DD-MM-YYYY",
    });

    $("#fecha_vigencia").datetimepicker({
      //defaultDate : dat,
      format: "DD-MM-YYYY",
    });

    $("#fecha_embarque").datetimepicker({
      defaultDate : dat,
      format: "DD-MM-YYYY",
    });

    /*$("#c_fecha_1").datetimepicker({
        format: "YYYY-MM-DD",
    });*/

    $("#cot_fec").val(y+''+ ('0'+(m+1)).slice(-2) +''+('0'+d).slice(-2));
    $("#fecha_contrato").val(d+"-"+meses[m]+"-"+y);
  /* ---------------------------------------------------------------------------------------------------- */
  $('.nav-tabs-dropdown').each(function(i, elm) {
    $(elm).text($(elm).next('ul').find('li.active a').text());
});

$('.nav-tabs-dropdown').on('click', function(e) {
    e.preventDefault();
    $(e.target).toggleClass('open').next('ul').slideToggle();
});

$('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {
    e.preventDefault();
    $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
});
  /* ---------------------------------------------------------------------------------------------------- */
  });
  </script>
</body>
</html>
