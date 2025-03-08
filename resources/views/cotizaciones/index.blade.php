@extends('app')
@section('content')
{!! Form::model(Request::all(),['route'=>'cotizaciones.index','method'=>'GET']) !!}
<div class="container">
    <ul class="nav nav-pills" >
        <li role="presentation" >
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            {!! Form::hidden('aprobacion',null,['class'=>'form-group']) !!}
                            @include('cotizaciones.partials.FormBuscar')
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="panel panel-footer">
        {!! Form::hidden('buscar','buscar',['class'=>'form-group']) !!}
        {!! $objetos->appends($request->all())->render() !!}
    </div>
</div>
{!! Form::close() !!}                                                                       <!--FIN DE PANTALLA DE BUSQUEDA DE COTIZACIONES!-->
@if($request->aprobacion=='2')                                                              <!--A P R O B A C I O N E S  C R E D I T O  Y  C O B R A N Z A!-->
    <div class="panel panel-info" ng-controller="AprobCotCtrl">
        <div class='panel-heading'>COTIZACIONES Total: <span class="badge">{{ $objetos->total() }}</span></div>
        <div class='panel-body'>
            <div style="height: 600px; overflow: scroll">
                <table class="table table-striped table-condensed">
                    <tr>
                        <th>Organización</th>
                        <th>Fecha</th>
                        <th>Cotización / Solicitud</th>
                        <th>Contrato</th>
                        <th>Procesar</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Moneda</th>
                        <th>Departamento</th>
                        <th>Autor</th>
                        <th>Estatus</th>
                        <th>Observaciónes</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($objetos as $key=>$objeto)
                    <tr>
                        <td>{!! $objeto->org_name!!}</td>
                        <td>{!! $objeto->fecha!!}</td>
                        <td>{!! $objeto->numero_cotizacion!!}</td>
                        <td>{!! $objeto->no_contrato!!}</td>
                        @if($objeto->cotizacion=="COTIZACION")
                            <td><span class="badge badge-info"> {!! $objeto->cotizacion !!}</span> </td>                  
                        @endif
                        @if($objeto->cotizacion=="VENTA")
                            <td><span class="badge badge-success"> {!! $objeto->cotizacion !!}</span> </td>                  
                        @endif
                        @if($objeto->cotizacion=="COMPRA")
                            <td><span class="badge badge-warning"> {!! $objeto->cotizacion !!}</span> </td>                  
                        @endif
                        @if($objeto->cotizacion=="VENTA Y COMPRA")
                            <td><span class="badge badge-default"> {!! $objeto->cotizacion !!}</span> </td>                  
                        @endif
                        @if($objeto->cotizacion=="")
                            <td><span class="badge badge-primary"> {!! $objeto->cotizacion !!}</span> </td>                  
                        @endif
                        <td>{!! $objeto->nombre_fiscal !!}</td>
                        <td>{!! $objeto->total !!}</td>
                        <td>{!! $objeto->tipo_moneda!!}</td>
                        @if($objeto->clase=="C")
                            <td><span class="badge badge-info">COMERCIAL</span> </td>                  
                        @endif
                        @if($objeto->clase=="CM")
                            <td><span class="badge badge-success">MEDICINA MOLECULAR</span> </td>                  
                        @endif
                        @if($objeto->clase=="CST")
                            <td><span class="badge badge-default">SERVICIO TECNICO</span> </td>                  
                        @endif
                        <td>{!! $objeto->nombre_empleado!!}</td>
                        @if($objeto->estatus=="ENVIADO" || $objeto->estatus=="SOLICITUD")
                            <td><span class="label label-primary"> {!! $objeto->estatus !!}</span> </td>                  
                        @else
                            <td><span class="label label-default"> {!! $objeto->estatus !!}</span> </td>                  
                        @endif
                        <td>
                            @if(($objeto->estatus=='APROBADO' && $objeto->fecha_aprobacion_cobranza=='') || ($objeto->estatus=='ENVIADO' && $objeto->fecha_aprobacion_marketing!='')|| ($objeto->estatus=='ENVIADO' && $objeto->fecha_aprobacion_marketing==''))
                                @can('acceso','cotizaciones.observar')
                                    @include('cotizaciones.partials.FormObservar')
                                @endcan
                            @else
                                {!! Form::textarea('nota',$objeto->nota,['readonly'=>'readonly','size'=>'10x4'])!!}
                            @endif
                        </td>
                        <td>
                            {!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}                        {{--print_r($objeto->proceso)--}}
                            	@include('partials.FormAprobar')                                                                                        {{--BOTON APROBACION--}}
                            {!!Form::close()!!}
                        </td>
                        <td>
                            <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-xs" ng-click="openCotizacionPdf({{$objeto->id}});" title="VER COTIZACION CON PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
                        </td>
                        <td>
                            @if($objeto->cotizacion_digital)
                                    <a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
                            @endif                                                                                                                      {{--SE PUEDEN ADJUNTAR MAS DE UN ARCHIVO ENEL SISTEMA--}}
                            @can('acceso','digitalizaciones.create')
                                <a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
                            @endcan
                        </td>
                        <td>
                            @can('acceso','calificaciones.show')                                                                                        {{--DETALLE DE LOS CALIFICACIONES--}}
                                  {!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="panel-footer">
            <!--<a type="button" class="btn btn-raised btn btn-info btn-xs" href="{{ route('cotizaciones.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>-->
        </div>
    </div>                                              <!--FIN APROBACION COBRANZA!-->
@elseif($request->aprobacion==1)<!-- A P R O B C I O N E S   D E  M A R K T I N G !-->
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" ng-controller="AprobCotCtrl">
                <div class='panel-heading'><%confApr.headerMar%></div>
                    <div class='panel-body'>
                        <p>RESULTADOS VERSIÓN: <span class="badge">{{ $objetos->total() }}</span></label>         </p>
                        <div style="height: 600px; overflow: scroll">
                            <table class="table table-striped table-condensed">
                               <tr>
                                <th># Cot.</th>
                                <th>Documento</th>
                                <th>Estatus</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Nombre fiscal</th>
                                <th>Total</th>
                                <th>Moneda</th>
                                <th>observación</th>
                                <th></th>
                            </tr>
                            @foreach($objetos as $key=>$objeto)
                            <tr>
                                <td>{!! $objeto->numero_cotizacion!!}</td>
                                <td>{!! $objeto->cotizacion !!}</td>
                                <td>{!! $objeto->estatus!!}</td>
                                <td>{!! $objeto->fecha!!}</td>
                                <td>{!! $objeto->nombre_empleado!!}</td>
                                <td>{!! $objeto->nombre_fiscal !!}</td>
                                <td>{!! $objeto->total !!}</td>
                                <td>{!! $objeto->tipo_moneda!!}</td>
                                <td>
                                @if($objeto->estatus=='APROBADO' &&$objeto->fecha_aprobacion_marketing=='')
                                    @can('acceso','cotizaciones.observar')
                                        @include('cotizaciones.partials.FormObservar')
                                    @endcan
                                @else
                                    {!! Form::textarea('nota',$objeto->nota,['readonly'=>'readonly','size'=>'10x4'])!!}
                                @endif
                                </td>
                                <td>
                                    @if($objeto->estatus=='APROBADO' && $objeto->fecha_aprobacion_marketing=='')
                                        @include('cotizaciones.partials.estatus.FormAprobarMarketing')
                                        @include('cotizaciones.partials.estatus.FormDesaprobar')
                                    @endif
                                    @can('acceso','calificaciones.show'){{--DETALLE DE LOS CALIFICACIONES--}}
                                      {!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
                                    @endcan
                                    @can('acceso','cotizaciones.proceso')
                                    {{--PROCESOS DE COTIZACION--}}
                                      @include('cotizaciones.partials.FormProcesos')
                                    @endcan
                                    @if($objeto->cotizacion_digital){{--DIGITALIZACIONES--}}
                                        <a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
                                    @endif
                                    @can('acceso','digitalizaciones.create')
                                    <a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
                                    @endcan
                                    <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-xs" ng-click="openPdf()"><i class="material-icons">picture_as_pdf</i></button>
                                @can('acceso','precalculos.store')
                                    <button type="button" ng-controller="PrecalculoCtrl" ng-click="openCotizacion({{$objeto->id}})" class="btn btn-info btn-xs" title="Precálculo"><i class="material-icons">assessment</i></button>
                                @endcan
                                <button type="button" ng-controller="ContratoCompraVentaCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$objeto->id!!}" ng-click="comprobarContrato(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-xs" title="Contrato de compra venta"><i class="material-icons">import_contacts</i></button>
                                <button type="button" ng-controller="PagareCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$objeto->id!!}" ng-click="comprobarPagare(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-xs" title="Pagaré"><i class="material-icons">local_atm</i></button>
                                </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-raised btn btn-info btn-xs" href="{{ route('cotizaciones.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- F I N  A P R O B C I O N E S   D E  M A R K T I N G !-->
@elseif($request->aprobacion==='0')
<!-- I N I C I O   A P R O B A C I O N E S   D E  VENTAS !-->
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" ng-controller="AprobCotCtrl">
                <div class='panel-heading'><%confApr.headerVen%></div>
                    <div class='panel-body'>
                        <p>Hay {{ $objetos->total() }} COTIZACIONES</p>
                        <div style="height: 600px; overflow: scroll">
                            <table class="table table-striped table-condensed">
                               <tr>
                                <th># Cot.</th>
                                <th>Documento</th>
                                <th>Estatus</th>
                                <th>Fecha</th>
                                <th>Autor</th>
                                <th>Nombre fiscal</th>
                                <th>Total</th>
                                <th>Moneda</th>
                                <th>observación</th>
                                <th></th>
                                </tr>
                            @foreach($objetos as $key=>$objeto)
                            <tr>
                                <td>{!! $objeto->numero_cotizacion!!}</td>
                                <td>{!! $objeto->cotizacion !!}</td>
                                <td>{!! $objeto->estatus!!}</td>
                                <td>{!! $objeto->fecha!!}</td>
                                <td>{!! $objeto->nombre_empleado!!}</td>
                                <td>{!! $objeto->nombre_fiscal !!}</td>
                                <td>{!! $objeto->total !!}</td>
                                <td>{!! $objeto->tipo_moneda!!}</td>
                                <td>
                                    @if($objeto->estatus=='FIRMADO' || $objeto->fecha_aprobacion_ventas=='APROBADO')
                                        <textarea rows="4" readonly="readonly" cols="10" ng-model="cotizacion[{{$key}}].nota"></textarea>
                                    @else
                                        @can('acceso','cotizaciones.observar')
                                            @include('cotizaciones.partials.FormObservar')
                                        @endcan
                                    @endif
                                </td>
                                <td><!--Solo puede actualizar estatus cuando la cotizacion no esta aprobada por ventas y esatus rechazado-->
                                    @if($objeto->estatus=='ENVIADO' ||  $objeto->estatus=='DESAPROBADO')
                                        @if($objeto->departamento=='VENTAS CONSUMIBLES')
                                            @include('cotizaciones.partials.estatus.FormAprobarVentasConsumibles')

                                            @else
                                                @include('cotizaciones.partials.estatus.FormAprobarVentas')
                                        @endif
                                        @include('cotizaciones.partials.estatus.FormRechazarVentas')
                                    @endif
                                    <button type="button" class="btn btn-info btn-xs" ng-controller="CotizacionPdfCtrl" ng-click="openPdf()"><i class="material-icons">picture_as_pdf</i></button>
                                @can('acceso','precalculos.store')
                                    <button type="button" ng-controller="PrecalculoCtrl" ng-click="openCotizacion({{$objeto->id}})" class="btn btn-info btn-xs" title="Precálculo"><i class="material-icons">assessment</i></button>
                                @endcan
                                <button type="button" ng-controller="ContratoCompraVentaCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$objeto->id!!}" ng-click="comprobarContrato(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-xs" title="Contrato de compra venta"><i class="material-icons">import_contacts</i></button>
                                @can('acceso','calificaciones.show'){{--DETALLE DE LOS CALIFICACIONES--}}
                                  {!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
                                @endcan

                                @if($objeto->cotizacion_digital){{--DIGITALIZACIONES--}}
                                    <a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
                                @endif
                                @can('acceso','digitalizaciones.create')
                                    <a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-raised btn btn-info btn-xs" href="{{ route('cotizaciones.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- F I N   A P R O B C I O N E S   D E  V E N T A S !-->
<!-- INICIO   A P R O B A C I O N E S   D E  SERVICIO !-->
@elseif($request->aprobacion=='3')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" ng-controller="AprobCotCtrl">
                <div class='panel-heading'><%confApr.headerVen%></div>
                    <div class='panel-body'>
                        <p>Hay {{ $objetos->total() }} COTIZACIONES</p>
                        <div style="height: 600px; overflow: scroll">
                           @include('cotizacion.partials.estatus.FormAproServ')
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-raised btn btn-info btn-xs" href="{{ route('cotizaciones.create') }}"><i class="material-icons">person_add</i> AGREGAR</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- F I N   A P R O B C I O N E S   D E  SERVICIO !-->
<!--FIN APROBACIONES !-->
@else<!-- INICIA COTIZACIONES POR USUARIO !-->
<!--<div class="container">-->
    <div class="panel panel-info" ng-controller="CotizacionCtrl" ng-init="index='0'">
                <div class='panel-heading'>COTIZACIONES Total: <span class="badge">{{ $objetos->total() }}</span></div>
                <div class='panel-body'>
                    <div style="height: 600px; overflow: scroll">
                        @include('cotizaciones.partials.FormUs')
                    </div>
                </div>
                    <div class="panel-footer" >
                        <!--<a type="button" class="btn btn-raised btn btn-info btn-xs" href="{{ route('cotizaciones.create') }}"><i class="material-icons">note_add</i> AGREGAR</a>-->
                    </div>
            </div>
<!--</div>-->
@endif<!--FIN LISTADO D COTIZACIONES POR USUARIO!-->
@endsection
