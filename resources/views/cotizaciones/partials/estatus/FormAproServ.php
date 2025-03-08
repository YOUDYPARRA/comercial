<table class="table table-striped table-condensed">
                               <tr>
                                <th># Cot.</th>
                                <th>Procesar</th>
                                <th>Estatus</th>
                                <th>Fecha</th>
                                <th>Empleado</th>
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
                                    @can('acceso','cotizaciones.observar')
                                        @include('cotizaciones.partials.FormObservar')
                                    @else
                                        {!! Form::textarea('nota',$objeto->nota,['readonly'=>'readonly','size'=>'10x4'])!!}
                                    @endif
                                </td>
                                <td>
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
                                  <a href="digitalizaciones/{{$objeto->id}}/cotizacion?clase=COT&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES"><i class="material-icons">cloud_upload</i></a>
                                  @endcan
                                  @can('acceso','cotizaciones.update')
                                    {!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                                      {{--FORM PARA APROBACION--}}
                                      {{--print_r($objeto->proceso)--}}
                                      {{-- Form::text('aviso',2) --}}
                                        @include('partials.FormAprobar')
                                        {!!Form::close()!!}
                                    @endcan
                                    <div><input type="radio" ng-init="cotizacion[{{$key}}]={{ $objeto }}"  ng-click="aprobacionVentas(cotizacion[{{$key}}])"> APROBADO</div><br>
                                    <div><input type="radio" name="aprobado{!!$key!!}" ng-init="cotizacion[{{$key}}]={{ $objeto }}"  ng-click="desaprobar(cotizacion[{{$key}}])"> NO APROBADO</div>
                                    <button type="button" class="btn btn-info btn-xs" ng-click="openPdf()"><i class="material-icons">picture_as_pdf</i></button>
                                    {!! Form::model($objeto,['method'=>'PUT','action'=>['CotizacionController@update',$objeto->id]]) !!}
                                    {{--FORM PARA APROBACION--}}
                                    {{--print_r($objeto->proceso)--}}
                                    {{-- Form::text('aviso',2) --}}
                                      @include('partials.FormAprobar')
                                  {!!Form::close()!!}
                                @can('acceso','precalculos.store')
                                    <button type="button" ng-controller="PrecalculoCtrl" ng-click="openCotizacion({{$objeto->id}})" class="btn btn-info btn-xs" title="Precálculo"><i class="material-icons">assessment</i></button>
                                @endcan
                                @can('acceso','contratos_compra_venta.index')
                                <button type="button" ng-controller="ContratoCompraVentaCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$objeto->id!!}" ng-click="comprobarContrato(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-xs" title="Contrato de compra venta"><i class="material-icons">import_contacts</i></button>
                                @endcan
                                @can('acceso','pagares.index')
                                <button type="button" ng-controller="PagareCtrl" ng-init="contrato_compra_venta[{!!$key!!}]={!!$objeto->id!!}" ng-click="comprobarPagare(contrato_compra_venta[{!!$key!!}])" class="btn btn-info btn-xs" title="Pagaré"><i class="material-icons">local_atm</i></button>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
</table>
