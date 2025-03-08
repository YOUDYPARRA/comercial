@extends('app')
@section('content')
<div class="panel panel-info" ng-controller="convenioContratoCtrl">
    <div class='panel-body'>
        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal navbar-custom">
            <li class="active"><a href="#hstab1" data-toggle="tab"> Equipos</a></li>
            <li><a href="#hstab2" data-toggle="tab"><i class="material-icons"></i> Contratos</a></li>
            <li><a href="#hstab3" data-toggle="tab"><i class="material-icons"></i> Plantillas</a></li>
            <li><a href="#hstab4" data-toggle="tab"><i class="ionicons ion-document-text"></i> Convenio</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="hstab1">
            <div class="row">
                <div class="col-md-6">
                    @include('expendios.partials.BscExp')
                    <div class="page-header">
                        <h5>Resultados equipo:<span class="pull-right label label-default"><%filtro.equipos.length%></span></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped table-bordered table-list table-responsive">
                    <thead>
                        <tr>
                            <th>NOMBRE FISCAL</th>
                            <th></th>
                            <th>EQUIPO</th>
                            <th></th>
                            <th>SERIE</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <tr ng-repeat="feqs in filtro.equipos">
                            <td><%feqs.nombre_fiscal%></td>
                            <td><%feqs.equipo%></td>
                            <td><%feqs.marca%></td>
                            <td><%feqs.modelo%></td>
                            <td><a href="#" ng-click="slcEqpExp(feqs)" title="SELECCIONAR"><%feqs.numero_serie%></a></td>
                            
                        </tr>
                    </tbody>
                    </table>
                </div>                
            </div>

            </div>                
            <div role="tabpanel" class="tab-pane fade" id="hstab2">{{--INICIO PANEL CONTRATO--}}
                <div class="page-header">
                    <h3>Razon Social Seleccionado:
                    <span class="pull-right label label-default"><%objeto.nombre_fiscal%></span>
                    <span class="pull-right label label-default"><%objeto.rfc%></span>
                    </h3>
                </div>
                @include('contratos.partials.FrmBscr')
                <div class="row">
                  <div class="col-md-6">
                        <div class="page-header">
                            <h5>Resultados contratos:<span class="pull-right label label-default"><%filtro.equipo_contrato.length%></span></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" ng-click="lmpContrato()" class="btn btn-info btn-lg"><i class="material-icons"></i>LIMPIAR RESULTADO </button>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <thead>
                                <tr>
                                    <th>CONTRATOS SELECCIONADOS <span class="label label-default"><%objeto.folio_contrato.length%></span></th>
                                </tr>                        
                            </thead>
                            <tbody>
                                <tr>
                                    <td ng-repeat="fcon in objeto.folio_contrato">
                                    <span class="label label-default"><%fcon%> <a href="#" ng-click="salContrato($index)">X</a></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                <table class="table table-striped table-bordered table-list table-responsive">
                    <thead>
                        <tr>
                            <th>CONTRATO</th>
                            <th></th>
                            <th>EQUIPO</th>
                            <th></th>
                            <th>SERIE</th>
                            <th>VIGENTE</th>
                            <th>FECHA_SERVICIO</th>
                            <th>OPC.</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <tr ng-repeat="feq in filtro.equipo_contrato">
                            <td><a href="#" ng-click="slcContrato(feq)"><%feq.folio_contrato%></a></td>
                            <td><%feq.equipo%></td>
                            <td><%feq.marca%></td>
                            <td><%feq.modelo%></td>
                            <td><%feq.numero_serie%></td>
                            <td><%feq.vigencia%></td>
                            <td><%feq.fecha_atencion%></td>
                            <td>
                                <button ng-click="cancEqpContr(feq)">Cancel. Contr.</button>
                                <button ng-click="salEqpContr($index)">Limpiar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                </div>
            </div>{{--FIN PANEL CONTRATO--}}
            <div role="tabpanel" class="tab-pane fade" id="hstab3">{{--INICIO PANEL PLANTILLAS--}}
                @include('plantillas.partials.BscPln')
                <div class="row">
                    <div class="col-lg-6">
                    <h5>Resultados plantilla:<span class="pull-right label label-default"><%filtro.plantillas.length%></span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                       <table class="table table-striped table-bordered table-list table-responsive">{{--INICIO TABLA PLANTILLA--}}
                            <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>AUTOR</th>
                                    <th> 
                                      <div class="media">
                                          <a href="#" class="pull-left">CLASE</a>
                                          <div class="media-body"><p class="summary">PLANTILLA</p>
                                          </div>
                                      </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="plan in filtro.plantillas" ng-model="plan">                                          
                                    <td><a href="#" class="pull-left" ng-click="slcPlan(plan)"><%plan.nombre%></a></td>
                                    <td></td>
                                    <td> 
                                      <div class="media">
                                          <span class="pull-left"><%plan.clase%></span>
                                          <div class="media-body"><p class="summary"><%plan.plantilla%></p>
                                          </div>
                                      </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>{{--FIN TABLA PLANTILLA--}}
                    
                    </div>
                </div>
    
            </div>{{--FIN PANEL PLANTILLAS--}}
            <div role="tabpanel" class="tab-pane fade" id="hstab4">{{--INICIO PANEL CONVENIO--}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header">
                        <h5>Resultados equipo:<span class="pull-right label label-default"><%filtro.equipos.length%></span></h5>
                    </div>
                    <div class="row" style="width: 100%; height: 400px; overflow-y: scroll;">
                        <table class="table table-striped table-bordered table-list table-responsive">
                        <thead>
                            <tr>
                                <th>NOMBRE FISCAL</th>
                                <th></th>
                                <th>EQUIPO</th>
                                <th></th>
                                <th>SERIE</th>
                            </tr>                        
                        </thead>
                        <tbody>
                            <tr ng-repeat="feqs in filtro.equipos">
                                <td><%feqs.nombre_fiscal%></td>
                                <td><%feqs.equipo%></td>
                                <td><%feqs.marca%></td>
                                <td><%feqs.modelo%></td>
                                <td><a href="#" ng-click="slcEqpExp(feqs)" title="SELECCIONAR"><%feqs.numero_serie%></a></td>
                                
                            </tr>
                        </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @include('plantillas.partials.BscPln')
                    </div>
                    <div class="row">
                        <h5>Resultados plantilla:<span class="pull-right label label-default"><%filtro.plantillas.length%></span></h5>
                    </div>
                    <div class="row" style="width: 100%; height: 400px; overflow-y: scroll;">
                        <table class="table table-striped table-bordered table-list table-responsive">{{--INICIO TABLA PLANTILLA--}}
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th> 
                                          <div class="media">
                                              <a href="#" class="pull-left">CLASE</a>
                                              <div class="media-body"><p class="summary">PLANTILLA</p>
                                              </div>
                                          </div>
                                        </th>
                                    </tr>
                                <tbody>
                                    <tr ng-repeat="plan in filtro.plantillas" ng-model="plan">                                          
                                        <td><a href="#" class="pull-left" ng-click="slcPlan(plan)"><%plan.nombre%></a></td>
                                        <td> 
                                          <div class="media">
                                              <span class="pull-left"><%plan.clase%></span>
                                              <div class="media-body"><p class="summary"><%plan.plantilla%></p>
                                              </div>
                                          </div>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>{{--FIN TABLA PLANTILLA--}}

                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-lg-6">
                   <div class="page-header">
                        <h5>Contratos Seleccionados:<span class="pull-right label label-default"><%objeto.folio_contrato.length%></span></h5>
                        <table>
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td ng-repeat="fcon in objeto.folio_contrato">
                                    <span class="label label-default"><%fcon%> <a href="#" ng-click="salContrato(fcon)">X</a></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        
                </div>
                <div class="col-log-6">
                    <div class="page-header">
                    <h3>Razon Social Seleccionado:
                    <span class="pull-right label label-default"><%objeto.nombre_fiscal%></span>
                    <span class="pull-right label label-default"><%objeto.rfc%></span>
                    </h3>
                </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::text('refacciones',null,['ng-model'=>'objeto.refacciones','class'=>'form-group','placeholder'=>'REFACCIONES'])!!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::text('refacciones_excepciones',null,['ng-model'=>'objeto.refacciones_excepciones','class'=>'form-group','placeholder'=>'REFACCIONES EXCEPCIONES'])!!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.fecha_inicio_contrato.$error.required">*</span>
                        <label class='control-label'>FECHA INICIO CONTRATO</label>
                        {!! Form::text('fecha_inicio_contrato',null,array('ng-model'=>'objeto.fecha_inicio_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required','ng-blur'=>'validaFecha(objeto.fecha_inicio_contrato)')) !!}
                        <span ng-show="formContratos.fecha_inicio_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.fecha_fin_contrato.$error.required">*</span>
                        <label class='control-label'>FECHA FIN CONTRATO</label>
                        {!! Form::text('fecha_fin_contrato',null,array('ng-model'=>'objeto.fecha_fin_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required','ng-blur'=>'validaFecha(objeto.fecha_fin_contrato)')) !!}
                        <span ng-show="formContratos.fecha_fin_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.fecha_contrato.$error.required">*</span>
                        <label class='control-label'>FECHA DE CONTRATO</label>
                        {!! Form::text('fecha_contrato',null,array('ng-model'=>'objeto.fecha_contrato','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','required','ng-blur'=>'validaFecha(objeto.fecha_contrato)')) !!}
                        <span ng-show="formContratos.fecha_contrato.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.monto_total_contrato.$error.required">*</span>
                        <label class='control-label'>MONTO TOTAL DEL CONTRATO</label>
                        {!! Form::text('monto_total_contrato',null,array('ng-model'=>'objeto.monto_total_contrato','class'=>'form-control','placeholder'=>'0.00','required','ng-pattern'=>'/^[0-9]+(\.[0-9]{1,2})?$/','title'=>'SOLO NUMEROS')) !!}
                        <span ng-show="formContratos.monto_total_contrato.$error.pattern">Formato incorrecto: 0.00</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.fecha_fin_garantia.$error.required">*</span>
                        <label class='control-label'>FECHA GARANTIA FIN</label>
                        {!! Form::text('fecha_fin_garantia',null,array('ng-model'=>'objeto.fecha_fin_garantia','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(objeto.fecha_fin_garantia)')) !!}
                        <span ng-show="formContratos.fecha_fin_garantia.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group has-info">
                        <span class="badge badge-warning" ng-show="formContratos.tipo_contrato.$error.required">*</span>
                        <label class='control-label'>TIPO DE CONTRATO</label>
                        <select name="tipo_contrato" ng-model="objeto.tipo_contrato" ng-options="tipo_contrato.nombre as tipo_contrato.nombre for tipo_contrato in tipos_contrato" class="form-control" required>
                                   <option value="">Elegir. . .</option>
                        </select> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group has-info" >
                      <label class="control-label"><i class="material-icons"></i>INICIO DE DOCUMENTO</label>
                        {!! Form::textarea('head',null,['ng-click'=>'setFoco("h")','size'=>'135x6','style'=>'resize:both','ng-model'=>'objeto.head'])!!}
                      </div>
                      </div>
                    </div>

                    <div class="row" ng-click="setFoco('tp')">
                    <div class="col-md-12">
                    <div class="form-group has-info" >
                      <label class="control-label"><i class="material-icons"></i>EQUIPOS</label>
                    <table border="1" >
                      <tr ng-repeat="tr in tabla" ng-model="tr" ng-click="equis($index)" ng-blur="equis($index)">
                        <td ng-repeat="td in tr" ng-model="td">
                          {!!form::text('td',null,['ng-model'=>'td','ng-blur'=>'ye($index,td)','ng-readonly'=>'activar', 'ng-click'=>'cmpActiv()'])!!}
                        <td>
                        <td><button ng-click="elmTbl($index)">Elim</button></td>
                      </tr>                  
                    </table>
                    </div>
                    </div>
                    </div>

                    <div class="row"> 
                      <div class="col-md-12">
                      <div class="form-group has-info" >
                      <label class="control-label"><i class="material-icons"></i>CUERPO DE DOCUMENTO</label>
                      {!! Form::textarea('foot',null,['ng-click'=>'setFoco("f")','size'=>'135x6','style'=>'resize:both','ng-model'=>'objeto.foot'])!!}
                      </div>
                    </div>
                    </div>

                    <div class="row" ng-click="setFoco('td')">
                      <div class="col-md-12">
                    <div class="form-group has-info" >
                      <label class="control-label"><i class="material-icons"></i>OTROS</label>
                        <table border="1" >
                        <tr ng-repeat="trd in tablados" ng-model="trd" ng-click="equis($index)">
                          <td ng-repeat="tdd in trd" ng-model="tdd">
                            {!!form::text('td',null,['ng-model'=>'tdd','ng-readonly'=>'activar', 'ng-click'=>'cmpActiv()'])!!}
                          <td>
                          <td><button ng-click="elmTblD($index)">Elim</button></td>
                        </tr>                  
                      </table>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-info" >
                      <label class="control-label"><i class="material-icons"></i>FIN DE DOCUMENTO</label>
                        {!! Form::textarea('foot',null,['ng-click'=>'setFoco("ff")','size'=>'135x6','style'=>'resize:both','ng-model'=>'objeto.fin'])!!}
                      </div>                  
                      </div>                  
                    </div>

                </div>{{--fin formulario container--}}                
            </div>{{--fin row formulario documento--}
            </div>
        </div>
        <div class="container">
        <div class="row">
            
        </div>
        </div>{{--fin formulario container--}}
    </div><!-- PANEL BODY -->
    <div class="panel-footer">
            <button type="button" ng-click="guardar()" class="btn btn-info btn-lg" title="GUARDAR"><i class="material-icons"></i>GUARDAR</button>
    </div>  <!-- FOOTER -->
</div>
@endsection