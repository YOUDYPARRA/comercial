@extends('app')
@section('content')
<div class="container" ng-controller="servicioReporteCtrl">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-info">
                <div class='panel-heading'>
                    <i class='material-icons'>note_add</i> CAPTURA DE HORARIO DE ATENCION. <span class="badge badge-success"><%objeto.folio%></span><span class="badge badge-success">NO. REPORTE: <%reporte%></span>
                </div>
                <div class='panel-body' ng-init="id_reporte='{{$r->id}}'; programacion='{{$r->programacion}}'">
                    {!! Form::open(array('name'=>'formServicioReporte')) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                    <label class='control-label'><i class='material-icons'>edit</i>CONTRATO<h6>NÚMERO de CLIENTE</h6></label>
                                          {!! Form::text('folio_contrato',null,array('ng-blur'=>'filtroContrato()','ng-model'=>'objeto.folio_contrato','class'=>'form-control','title'=>'EN CLASE EL INSTITUTO')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                          <label class='control-label'><i class='material-icons'>edit</i>COTIZACION</label>
                                          {!! Form::text('numero_cotizacion',null,array('ng-blur'=>'filtroCotizacion()','ng-model'=>'objeto.numero_cotizacion','class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-info">
                                          <label class='control-label'><i class='material-icons'></i></label>
                                          {!! Form::hidden('id_prestamo_refaccion',null,array('ng-model'=>'objeto.id_prestamo_refaccion','class'=>'form-control')) !!}
                                </div>
                            </div>      
                        </div>
                            {{--DATOS DE VIATICOS--}}
                        <div class="row">
                        <div class="col-md-4">
                          <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>TOTAL VIATICOS</label>
                            {!! Form::text('monto_gasto',null,array('ng-model'=>'objeto.monto_gasto','class'=>'form-control','ng-pattern'=>'/^[1-9]+[0-9]*$/')) !!}
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>TOTAL GASTOS DIVERSOS</label>
                            {!! Form::text('monto_gasto_diverso',null,array('ng-model'=>'objeto.monto_gasto_diverso','class'=>'form-control')) !!}
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>DESCRIPCION DE GASTOS DIVERSOS</label>
                            {!! Form::text('describe_gasto_diverso',null,array('ng-model'=>'objeto.describe_gasto_diverso','class'=>'form-control')) !!}
                          </div>
                        </div>
                      </div>

                         @include('partials.FormPersonalEdit')
                         @include('partials.FormHorarios')
                </div>                 
                <div class='panel-footer'> 
                        <button type="button" ng-click='guardar()' class="btn btn-raised btn-info btn-lg" ng-disabled="save || formOrdenServicio.$invalid"><i class="material-icons">save</i></button>
                        <span><%rsl.msg%></span>
                        <!--<a href="{{ route('servicios.index')}}" type="button" class="btn btn-success" title="IR A LA LISTA DE ORDENES DE SERVICIO"><i class="material-icons">list</i></a>!-->
                </div>
                {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
@endsection