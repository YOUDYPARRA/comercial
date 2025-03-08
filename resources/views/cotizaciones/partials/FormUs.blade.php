<table border='0' class="table table-striped">
<thead>
    <tr>
        <th>Organización</th>
        <th>Fecha</th>
        @if(Auth::user()->area =="SERVICIO TECNICO")
            <th>Vigencia</th>
        @endif
        @if(Auth::user()->area =="SERVICIO TECNICO")
            <th>Solicitud</th>
        @else
            <th>Cotización</th>
        @endif
        <th>Versión</th>
        <th>Prestamo</th>
        <th>Contrato</th>
        @if(Auth::user()->area=="SERVICIO TECNICO")
        	<th>Procesar</th>
        @endif
        <th>Cliente</th>
        <th>Entrega/Servicio</th>
        <th>
          	@can('acceso','cotizaciones.show')
          		Total
          	@else
          		Reporte
          	@endcan
        </th>
        <th>Moneda</th>
        <th>Autor</th>
        <th>Estatus</th>
        <th>Pedido cliente</th>
        <th>Ordenes</th>
        <th width="230">Observaciónes</th>
        <th></th>
    </tr>
</thead>
@foreach($objetos as $key=>$objeto)
    <tr>
        <td> {!! $objeto->org_name !!} </td>
        <td> {!! $objeto->created_at !!} </td>
        @if(Auth::user()->area=="SERVICIO TECNICO")
            <td ng-controller="NumeroAletraCtrl" ng-init="checkVigencia('{{$objeto->fecha_vigencia}}')"> {!! $objeto->fecha_vigencia !!} <span class="label label-danger"><%m%></span> </td>
        @endif
        <td> {!! $objeto->numero_cotizacion !!} </td>
        <td> {!! $objeto->version !!} </td>
        <td>
          @can('acceso','prestamos.index')
            {!! link_to_route('prestamos.index',$objeto->venta,['buscar'=>'1','folio'=>$objeto->venta]) !!}
          @else
            {{ $objeto->venta }}
          @endcan
         </td>
        <td> {!! $objeto->no_contrato !!} </td>
        @if(Auth::user()->area=="SERVICIO TECNICO")
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
        @endif
        <td> {!! $objeto->nombre_fiscal !!} </td>
        <td> {!! $objeto->nombre_cliente !!} {!! $objeto->calle_entrega !!} {!! $objeto->colonia_entrega !!} {!! $objeto->codigo_postal_entrega !!} {!! $objeto->ciudad_entrega !!} {!! $objeto->estado_entrega !!} </td>
        <td>
          	@can('acceso','cotizaciones.show')
              	@if((!is_string($objeto->total)))
                  	{!! number_format($objeto->total, 2, '.', ',')!!}
              	@else
                	{!! $objeto->total !!}
              	@endif
            @else
            	{!! link_to_route('reportes.index',$objeto->reporte,['folio'=>$objeto->reporte]) !!}
          	@endcan
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
        @if($objeto->estatus=="PROCESADO" || $objeto->estatus=="VALIDO" || $objeto->estatus=="ENTREGADO CLIENTE" || $objeto->estatus=="ENTREGADO TERCERO" || $objeto->estatus=="ENTREGADO")
            <td><span class="label label-success"> {!! $objeto->estatus !!}</span> </td>
        @endif
        @if($objeto->estatus=="RECEPCIONADO" || $objeto->estatus=="PROGRAMADO")
            <td><span class="label label-info"> {!! $objeto->estatus !!}</span> </td>
        @endif
        @if($objeto->estatus=="RUTA" || $objeto->estatus=="CANCELADO")
            <td><span class="label label-danger"> {!! $objeto->estatus !!}</span> </td>
        @endif
        <td> {!! $objeto->no_pedido !!} </td>
        <td> {!! $objeto->ordenes !!} </td>
        <td>
            @can('acceso','cotizaciones.observar')
                @include('cotizaciones.partials.FormObservar')
            @endcan
        </td>
        <td>
        	@can('acceso','cotizaciones.show')
                <button type="button" class="btn btn-info btn-xs" ng-controller="CotizacionPdfCtrl" ng-click="openCotizacionPdf({{$objeto->id}})" title="VER COTIZACION CON PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
        	@else
                <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-xs" ng-click="openCotizacionPdfSinPrecios({{$objeto->id}});" title="VER COTIZACION SIN PRECIOS"><i class="material-icons">picture_as_pdf</i></button>
        	@endcan
            <div ng-controller="StockCtrl">
                <button type="button" class="btn btn-info btn-xs" title="VER STOCK" ng-click="hoverEdit = !hoverEdit;hoverIn({{$objeto->id}},'cot')"><i class="material-icons">filter_1</i> <%cantidad_total%></button><!--<div ng-show="progress"> <span class="badge badge-warning"> Cargando ...</span></div>--><!--<div ng-show="progress"> <span class="badge badge-warning"> Cargando ...</span></div>-->
                    <span ng-show="hoverEdit" class="animate-show">
                        <table class="table table-striped">
                        <tr class="success">
                            <th  style="font-size:70%;">+</th>
                            <th  style="font-size:70%;">Codigo</th>
                            <th  style="font-size:70%;">Cant Venta</th>
                            <th  style="font-size:70%;">Unidad venta </th>
                            <th  style="font-size:70%;">Almacen</th>
                        </tr>
                        <tr ng-repeat="equipo in stock_cot_insumos" >
                            <td  style="font-size:70%;">-</td>
                            <td  style="font-size:70%;"><%equipo.codigo%></td>
                            <td  style="font-size:70%; color: blue"><%equipo.cantidad_venta%></td>
                            <td  style="font-size:70%;"><%equipo.unidad_venta%></td>
                            <td  style="font-size:70%;"><%equipo.almacen%></td>
                       	</tr>
                    </table>
                </span>
            </div>
        </td>
        <td>
            @can('acceso','cotizaciones.edit')
            	@if($objeto->area=='SERVICIO TECNICO')
                    @if(is_array($objeto->procesos))
                        <a href="{{ route('cotizaciones.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="MODIFICAR" ng-controller="CotizacionCtrl" ng-click="confirmar('{{$objeto->estatus}}')" ><i class="material-icons">cached</i></a>
                    @endif
            	@else
            		@if($objeto->estatus=='GUARDADO' || $objeto->estatus=='APROBADO')
                        <a href="{{ route('cotizaciones.edit', $objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="MODIFICAR" ng-controller="CotizacionCtrl" ng-click="confirmar('{{$objeto->estatus}}')" ><i class="material-icons">cached</i></a>
                    @endif
            	@endif
            @endcan
        	@if($objeto->cotizacion_digital)
            	<a href="{{ route('cotizaciones_digitales.show',$objeto->id)}}" type="button" class="btn btn-warning btn-xs" title="DESCARGAR ARCHIVO"><i class="material-icons">cloud_download</i></a>
       		@endif
       		@can('acceso','digitalizaciones.create')
        		<a href="/digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
       		@endcan
        </td>
        <td>
            @can('acceso','cotizaciones.update')																				{{--BOTON PARA APROBADOR--}}
            	{!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}              {{--print_r($objeto->proceso)--}}             {{-- Form::text('aviso',2) --}}
                	@include('partials.FormAprobar')
              	{!!Form::close()!!}
            @endcan
        </td>
        <td>
          	@can('acceso','calificaciones.show')
            	{!! link_to_route('calificaciones.show','Detalle',['id'=>$objeto->id,'clase'=>'cotizacion']) !!}
          	@endcan
        </td>
        <td>
            @if($objeto->estatus=='GUARDADO' || $objeto->estatus=='RECHAZADO')
                @include('cotizaciones.partials.FormEliminar')
            @endif
            @if($objeto->estatus!='CANCELADO')
                        @include('cotizaciones.partials.estatus.FormCancelar')
            @endif
        </td>
    </tr>
 @endforeach
</table>
