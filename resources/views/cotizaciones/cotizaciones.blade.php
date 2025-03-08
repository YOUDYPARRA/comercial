@extends('app')
@section('content')
{!! Form::model(Request::all(),['route'=>'cotizaciones.servicio','method'=>'GET']) !!}
<div class="container">
    <div class="panel panel-default">
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
            {!! Form::hidden('aprobacion','servicio',['class'=>'form-group']) !!}
            {!! $objetos->appends($request->all())->render() !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
<div class="panel panel-info" >
    <div class='panel-heading'>SOLICITUDES SERVICIO TECNICO: <span class="badge">{{ $objetos->total() }}</span></div>
        <div class='panel-body'>
            <table border='0' class="table table-striped">
                <thead>
                    <tr>
                        <th>Organización</th>
                        <th>Fecha</th>
                        <th>Vigencia</th>
                        <th>Reporte</th>
                        <th>Solicitud</th>
                        <th>Versión</th>
                        <th>Prestamo</th>
                        <th>Procesar</th>
                        <th>Contrato</th>
                        <th>Cliente</th>
                        <th>Servicio / Entrega</th>
                        <th>Total</th>
                        <th>Moneda</th>
                        <th>Autor</th>
                        <th>Estatus</th>
                        <th>Ordenes</th>
                        <th width="230">Observaciónes</th>
                    </tr>
                </thead>
                @foreach($objetos as $key=>$objeto)
                <tr>
                    <td>
                      {!! $objeto->org_name !!}
                     </td>
                    <td> {!! $objeto->created_at !!} </td>
                    <td ng-controller="NumeroAletraCtrl" ng-init="checkVigencia('{{$objeto->fecha_vigencia}}')"> {!! $objeto->fecha_vigencia !!} <span class="label label-danger"><%m%></span> </td>
                    <td>
                      @can('acceso','reportes.index')
          							{!! link_to_route('reportes.index',$objeto->reporte,['folio'=>$objeto->reporte]) !!}
          						@else
          							{{$objeto->reporte}}
          						@endcan

                    </td>
                    <td> {!! $objeto->numero_cotizacion !!} </td>
                    <td> {!! $objeto->version !!} </td>
                    <td>
                      @can('acceso','prestamos.index')
                      {!! link_to_route('prestamos.index',$objeto->venta,['folio'=>$objeto->venta,'buscar'=>'1'],['target'=>'blank'])  !!}
                      @else
                      {{$objeto->venta}}
                      @endif
                    </td>
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
                    <td> {!! $objeto->no_contrato !!} </td>
                    <td> {!! $objeto->nombre_fiscal !!} </td>
                    <td> {!! $objeto->nombre_cliente !!} {!! $objeto->calle_entrega !!} {!! $objeto->colonia_entrega !!} {!! $objeto->codigo_postal_entrega !!} {!! $objeto->ciudad_entrega !!} {!! $objeto->estado_entrega !!} </td>
                    <td>
                    @if(!empty($objeto->total) && (!is_string($objeto->total)))
                        {!! number_format($objeto->total, 2, '.', ',')!!}
                    @else
                        {!! $objeto->total !!}
                    @endif
                    </td>
                    <td> {!! $objeto->tipo_moneda !!} </td>
                    <td> {!! $objeto->nombre_empleado !!} </td>
                    @if($objeto->estatus=="GUARDADO" || $objeto->estatus=="APROBADO" || $objeto->estatus=="VERIFICADO")
                        <td><span class="label label-default"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="ENVIADO" || $objeto->estatus=="SOLICITUD")
                        <td><span class="label label-primary"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="CONCRETADO")
                        <td><span class="label label-warning"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="PROCESADO" || $objeto->estatus=="VALIDO")
                        <td><span class="label label-success"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="RECEPCIONADO" || $objeto->estatus=="PROGRAMADO")
                        <td><span class="label label-info"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="RUTA" || $objeto->estatus=="CANCELADO")
                        <td><span class="label label-danger"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    @if($objeto->estatus=="ENTREGADO CLIENTE" || $objeto->estatus=="ENTREGADO TERCERO" || $objeto->estatus=="ENTREGADO")
                        <td><span class="label label-success"> {!! $objeto->estatus !!}</span> </td>
                    @endif
                    <td> {!! $objeto->ordenes !!} </td>
                    <td>
                    @can('acceso','cotizaciones.observar')
                        @include('cotizaciones.partials.FormObservar')
                    @endcan
                </td>
                <td>
                    @can('acceso','cotizaciones.update')
                      @if($objeto=='CONCRETADO' || (count($objeto->conOrden())==0))
                          @if(is_array($objeto->procesos))
                              <a href="{{ route('cotizaciones.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="MODIFICAR" ng-controller="CotizacionCtrl" ng-click="confirmar('{{$objeto->estatus}}')" ><i class="material-icons">cached</i></a>
                          @endif
                      @endif
                    @endcan
                    <div ng-controller="StockCtrl">
                        <button type="button" class="btn btn-info btn-xs" title="VER STOCK" ng-click="hoverEdit = !hoverEdit;hoverIn({{$objeto->id}},'cot')"><i class="material-icons">filter_1</i> <%cantidad_total%></button><!--<div ng-show="progress"> <span class="badge badge-warning"> Cargando ...</span></div>--><!--<div ng-show="progress"> <span class="badge badge-warning"> Cargando ...</span></div>-->
                            <span ng-show="hoverEdit" class="animate-show">
                                <table class="table table-striped">
                                <tr class="success">
                                    <th  style="font-size:70%">+</th>
                                    <th  style="font-size:70%">Codigo</th>
                                    <th  style="font-size:70%">Cant Venta</th>
                                    <th  style="font-size:70%">Unidad venta </th>
                                    <th  style="font-size:70%">Almacen</th>
                                </tr>
                                <tr ng-repeat="equipo in stock_cot_insumos" >
                                    <td  style="font-size:70%">-</td>
                                    <td  style="font-size:70%"><%equipo.codigo%></td>
                                    <td  style="font-size:70% color: blue"><%equipo.cantidad_venta%></td>
                                    <td  style="font-size:70%"><%equipo.unidad_venta%></td>
                                    <td  style="font-size:70%"><%equipo.almacen%></td>
                                </tr>
                            </table>
                        </span>
                    </div>
                </td>
                <td>
                    {!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}                {{--FORM PARA APROBACION--}}{{-- Form::text('aviso',2) --}}
                      @include('partials.FormAprobar')
                    {!!Form::close()!!}
                </td>
                <td><!--GENERAR COTIZACION PDF-->
                    @can('acceso','cotizaciones.show')
                        <button type="button" class="btn btn-info btn-xs" ng-controller="CotizacionPdfCtrl" ng-click="openCotizacionPdf({{$objeto->id}})" title="IMPRIMIR"><i class="material-icons">picture_as_pdf</i></button>
                    @else
                        <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-xs" ng-click="openCotizacionPdfSinPrecios({{$objeto->id}});" title="VER COTIZACION SIN PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
                    @endcan
                    <button type="button" class="btn btn-primary btn-xs" ng-controller="SolicitudCompraPdfCtrl" ng-click="openSolicitudCompraSinPrecios({{$objeto}},'cot')" title="VER SOLICITUD COMPRA"><i class="material-icons">picture_as_pdf</i></button>
                </td>
                <td>
                    @if($objeto->cotizacion_digital)
                        <a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning  btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
                    @else
                       @can('acceso','cotizaciones_digitales.create')
                            <a href="/cotizaciones_digitales/create/{{$objeto->id}}" type="button" class="btn btn-primary  btn-xs" title="SUBIR ARCHIVO"><i class="material-icons">cloud_upload</i></a>
                        @endcan
                    @endif
                    @can('acceso','digitalizaciones.create')
                     <a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
                    @endcan
                </td>
                <td>
                    @can('acceso','prestamos.show')
                      @if(count($objeto->conOrden())==0)
                      {{$objeto->ln_prest}}
                        @if($objeto->ln_prest)
                            <a href="{{ route('prestamos.show',['id'=>$objeto->id,'v'=>'0'])}}" type="button" class="btn btn-danger  btn-xs" title="DESVINCULAR"><i class="material-icons">link_off</i></a>
                            {{--<a href="/prestamos/{{$objeto->id}}?v=0" type="button" class="btn btn-success btn-xs" title="DESVINCULAR"><i class="material-icons">link_off</i></a>--}}
                          {{-- !! link_to_route('prestamos.show','DESLIGAR',['id'=>$objeto->id,'v'=>'0']) !!-- }}{{--SI TIENE PERMISO PRETAMOS.SHOW.ID_COTIZACION Y TIENE VDD EN LN_PREST,  Y NO TIENE COMPRA/VENTA MOSTRAR BTN--}}
                        @endif
                        @endif
                      @endcan
                    @can('acceso','calificaciones.show')
                        {{--<a href="/calificaciones/{{$objeto->id}}?clase=cotizacion" type="button" class="btn btn-info btn-xs" title="DETALLE"><i class="material-icons">list</i></a>--}}
                        {!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
                    @endcan
                </td>
                <td>
                    @can('acceso','cotizaciones.proceso')
                    {{--PROCESOS DE COTIZACION--}}
                      @include('cotizaciones.partials.FormProcesos')
                    @endcan
                        @include('cotizaciones.partials.FormEliminar')
                        @if($objeto->estatus!='CANCELADO')
                          @include('cotizaciones.partials.estatus.FormCancelar')
                        @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
