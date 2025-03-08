{!! Form::model(Request::all(),['route'=>'programaciones.index','method'=>'GET']) !!}
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
            <div class="panel-body">                                <!--INICIO CUERPO DEL PANEL!-->
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group has-info">
                    <select name="organizacion" class="form-control">
                        <option value="">Organización</option>
                        <option value="SMH">SMH</option>
                        <option value="IMS">IMS</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('nombre_fiscal',null,['class'=>'form-control','placeholder'=>'Nombre fiscal'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('nombre_cliente',null,['class'=>'form-control','placeholder'=>'Cliente/Entrega'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('atiende',null,['class'=>'form-control','placeholder'=>'Atiende'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('folio',null,['class'=>'form-control','placeholder'=>'Reporte'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('numero_serie',null,['class'=>'form-control','placeholder'=>'No. Serie'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      @if($request->buscar)
                        {!! Form::select('sucursal',[''=>'SUCURSAL']+util::getSucursales(),$request->sucursal,['class'=>'form-control']) !!}
                        @else
                        {!! Form::select('sucursal',[''=>'SUCURSAL']+util::getSucursales(),['class'=>'form-control']) !!}
                      @endif
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      @if($request->buscar)
                        {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), $request->coordinaciones,['class'=>'form-control']) !!}
                      @else
                        {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), auth()->user()->departamento,['class'=>'form-control']) !!}
                      @endif
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('fecha_inicio',null,['class'=>'form-control','placeholder'=>'DD-MM-AAAA'])!!}
                      {!! Form::hidden('buscar',1,['class'=>'form-control','placeholder'=>'fecha'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('condicion_servicio',null,['class'=>'form-control','placeholder'=>'Condicion servicio'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                    {!! Form::text('tipo_servicio',null,['class'=>'form-control','placeholder'=>'Tipo servicio'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                    <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
                  </div>
                </div>
              </div><!--FIN CUERPO row!-->
            </div><!--FIN CUERPO PANEL!-->
          </div>
        </div>
      </div>
    </li>
  </ul>
  <div class="panel panel-footer">
    {!! $objetos->appends($request->all() )->render() !!}
  </div>
</div>
{!! Form::close() !!}