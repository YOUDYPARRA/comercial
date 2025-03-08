{!! Form::model(Request::all(),['route'=>'servicios.index','method'=>'GET']) !!}
<div class="container">
  <ul class="nav nav-pills" >
    <li role="presentation" >
      <div class="panel-group">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR</a></h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">          <!--INICIO CUERPO DEL PANEL!-->
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
                  {!! Form::text('nombre_cliente',null,['class'=>'form-control','placeholder'=>'DirecciÓn/Entrega'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('nombre_fiscal',null,['class'=>'form-control','placeholder'=>'Cliente'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('folio_contrato',null,['class'=>'form-control','placeholder'=>'Contrato interno'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('instituto',null,['class'=>'form-control','placeholder'=>'Contrato cliente'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('folio',null,['class'=>'form-control','placeholder'=>'No orden servicio'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('fecha_atencion',null,['class'=>'form-control','placeholder'=>'FECHA dd-mm-aaaa']) !!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('ciudad_fiscal',null,['class'=>'form-control','placeholder'=>'Ciudad'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('estado_fiscal',null,['class'=>'form-control','placeholder'=>'Estado'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('reporte',null,['class'=>'form-control','placeholder'=>'Reporte'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('iniciales',null,['class'=>'form-control','placeholder'=>'Iniciales Ingeniero'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('numero_serie',null,['class'=>'form-control','placeholder'=>'Serie'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('tipo_servicio',null,['class'=>'form-control','placeholder'=>'Tipo servicio'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group has-info">
                  {!! Form::text('condicion_servicio',null,['class'=>'form-control','placeholder'=>'Condición servicio'])!!}
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  @if($request->buscar)
                    {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), '$request->coordinaciones',['class'=>'form-control']) !!}
                  @else
                    {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), 'auth()->user()->departamento',['class'=>'form-control']) !!}
                  @endif
                </div>
              </div>
              <div class="col-md-2">
                  <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
              </div>
            </div><!--FIN CUERPO PANEL!-->
          </div>
        </div>
      </div>
    </li>
  </ul>
  <div class="panel panel-footer">
    {!! $objetos->appends($request->all())->render() !!}
  </div>
</div>
{!! Form::close() !!}
