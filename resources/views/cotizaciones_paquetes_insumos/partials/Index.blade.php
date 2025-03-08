<div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-info">
                <div class='panel-heading'>
                   <p>COTIZACIONES: <span class="badge"> {{ $cotizaciones->total() }} </span></p>
                </div>
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                <div class='panel-body'>
                    <table border='0' class="table table-striped">
                    <thead>
                        <tr>
                            <th>Organización</th>
                            <th>Cotizacion</th>
                            <th>Vs</th>
                            <th>Fecha</th>
                            <th>Agente</th>
                            <th>Estado</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Moneda</th>
                            <!--<th>Equipos</th>    -->
                        </tr>
                    </thead>
                    @foreach($cotizaciones as $key=>$cotizacion)
                        <tr>
                            <td> {!! $cotizacion->org_name !!} </td>
                            <td> {!! $cotizacion->numero_cotizacion !!} </td>
                            <td> {!! $cotizacion->version !!} </td>
                            <td> {!! $cotizacion->fecha !!} </td>
                            <td> {!! $cotizacion->nombre_empleado !!} </td>
                            <td> {!! $cotizacion->estatus !!} </td>
                            <td> {!! $cotizacion->nombre_fiscal !!} </td>
                            <td> {{-- number_format($cotizacion->total, 2, '.', ',') --}} </td>
                            <td> {!! $cotizacion->total !!} </td>


                            <td> {!! $cotizacion->tipo_moneda !!} </td>
                            <td>
                              @can('acceso','cotizaciones.edit')
                                <a href="{{ route('cotizaciones.edit', $cotizacion->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
                              @endcan
                              <a href="{{ route('cotizaciones.contratocompraventaedit', $cotizacion->id)}}" type="button" class="btn btn-success"><i class="material-icons">cached</i></a>
                            </td>
                            <td>
                            {!! Form::model($cotizacion, ['route'=>['cotizaciones.destroy',$cotizacion->id],'method'=>'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-lg"><i class="material-icons">delete_sweep</i></button>
                            {!! Form::close() !!}
                           </td>
                            <td> <!--GENERAR COTIZACION PDF--><!--
                                <button type="button" ng-controller="CotizacionPdfCtrl" class="btn btn-info btn-lg" ng-click="openCotizacionPdf({{$cotizacion->id}});" title="Ver cotización"><i class="material-icons">picture_as_pdf</i></button>
                            </td> -->              <!--FINALIZA GENERAR COTIZACION PDF-->
                            <td ><!--GENERAR CONTRATO DE COMPRA VENTA O PREGUNTAR-->
                                <button type="button" ng-controller="ContratoCompraVentaCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$cotizacion->id!!}" ng-click="comprobarContrato(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-lg" title="Contrato de compra venta"><i class="material-icons">import_contacts</i>CCV</button>
                            </td><!--FIN GENERAR CONTRATO DE COMPRA VENTA-->
                            <!--<td>
                                <button type="button" ng-controller="PagareCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$cotizacion->id!!}" ng-click="comprobarPagare(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-lg" title="Pagaré"><i class="material-icons">local_atm</i></button>
                            </td>-->
                            <td>
                                @can('acceso','precalculos.store')
                                <button type="button" ng-controller="PrecalculoCtrl" ng-click="openCotizacion({{$cotizacion->id}})" class="btn btn-info btn-lg" title="Precálculo"><i class="material-icons">assessment</i></button>
                                @endcan
                            </td>
                            <td>
                                <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="material-icons">mail</i></button>-->
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    </div>
                    <div class="panel-footer" >
                    {!! $cotizaciones->appends($request->all())->render() !!}
                        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="material-icons">mail</i></button>-->
                    </div>
            </div>
        </div>
</div>
