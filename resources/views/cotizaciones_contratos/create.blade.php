@extends('app')
@section('content')
<div class="container" ng-controller="cotizacionContratoCtrl">
    <div class="row" ng-mouseover="activ=true" ng-init="activ=false;activar=true">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
            <div class='panel-heading'><i class='material-icons'>note_add</i> CREAR COTIZACION CONTRATO</div>
            <div class='panel-body'>{{--INICIO BODY--}}
                @include('expendios.partials.BscExpAjx')                
                @include('plantillas.partials.BscPlaAjx')
                @include('cotizaciones_contratos.partials.buscarEquipo')
                @include('cotizaciones_contratos.partials.buscarPlantilla')
                

                {{-- {!!Form::text('id',null,['ng-model'=>'objeto.id'])!!}
                {!!Form::text('version',null,['ng-model'=>'objeto.version'])!!}--}}

                <div class="row">{{--TERCERO--}}
                  <div class="col-lg-12">
                  <div class="form-group has-info" >
                  <label class="control-label"><i class="material-icons"></i>CLIENTE</label>
                    <div class="media">
                      <a href="#" class="pull-left"><% objeto.nombre_fiscal%></a>
                      <div class="media-body">
                        <span class="media-meta pull-right"><small><%objeto.rfc%></small></span><br>
                        <span class="media-meta pull-left"><small><%objeto.calle_fiscal%> <%objeto.colonia_fiscal%> <%objeto.c_p_fiscal%></small></span>
                          <h4 class="title">
                            <span class="pull-right "><%objeto.ciudad_fiscal%> <%objeto.estado_fiscal%> <%objeto.pais_fiscal%></span> 
                          </h4>
                          <p class="summary">-</p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
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
                    <tr ng-repeat="trd in tablados" ng-model="trd" ng-click="equis($index)" ng-blur="equis($index)">
                      <td ng-repeat="tdd in trd" ng-model="tdd">
                        {!!form::text('td',null,['ng-model'=>'tdd','ng-blur'=>'ye($index,tdd)','ng-readonly'=>'activar', 'ng-click'=>'cmpActiv()'])!!}
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

            </div>{{--FIN BODY--}}
            <div class='panel-footer'> 
                <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" title="GUARDAR" ng-disabled="save"><i class="material-icons">save</i></button>
                <span><%rsl.msg%></span>
                <span><%activg%></span>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection