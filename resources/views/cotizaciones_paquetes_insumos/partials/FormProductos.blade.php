                    <div class="panel panel-info">   
                        <div class="panel-heading">PRODUCTOS </div>
                        <div class="panel-body">
                            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
                                <li class="active" style="background-color: #BBBBBB"><a href="#htab1" data-toggle="tab"><i class="material-icons">playlist_add_check</i>EQUIPOS</a></li>
                                <li style="background-color: #AAAAAA"><a href="#htab2" data-toggle="tab"><i class="material-icons">devices_other</i>PAQUETE </a></li>
                                <li style="background-color: #999999"><a href="#htab3" data-toggle="tab"><i class="material-icons">print</i> BUSCAR PRODUCTO </a></li>
                            </ul>
                            <div class="tab-content" >
                                <div role="tabpanel" class="tab-pane fade in active" id="htab1" ng-show="ver_equipos=true">
                                    <p class="text-warning"> BUSCAR EQUIPOS</p>
                                     @include('cotizaciones.partials.FormCotizacionArbol')
                                </div>                                                              <!-- TAB PANEL 1 -->
                                <div role="tabpanel" class="tab-pane fade" id="htab2" ng-show="ver_paquete=true">
                                    <p class="text-warning"> BUSCAR PAQUETES</p>
                                    @include('cotizaciones.partials.FormCotizacionPaquete')
                                </div>                                                              <!-- TAB PANEL 2 -->
                                <div role="tabpanel" class="tab-pane fade" id="htab3" ng-show="ver_busqueda=true">
                                    <p class="text-warning"> BUSCAR PRODUCTOS  <span ng-show="progress" class="badge badge-warning"> Cargando ...</span></p>
                                    @include('cotizaciones.partials.FormCotizacionBusqueda')
                                </div>                                                              <!-- TAB PANEL 3 -->
                            </div >                                                               <!-- TAB CONTENT -->
                        </div>                                                                            <!-- ....................................               FIN PANEL BODY -->
                    </div>