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
            <div class="panel-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group has-info">
                    <div class="form-group">
                      <select name="organizacion" class="form-control">
                        <option value="">Organización</option>
                        <option value="SMH">SMH</option>
                        <option value="IMS">IMS</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('folio',null,['class'=>'form-control','placeholder'=>'No. Reporte'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('folio_contrato',null,['class'=>'form-control','placeholder'=>'No. Contrato'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('estatus',null,['class'=>'form-control','placeholder'=>'Estatus'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      @if($request->buscar)
                        {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), '$request->coordinaciones',['class'=>'form-control']) !!}
                      @else
                        {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), 'auth()->user()->departamento',['class'=>'form-control']) !!}
                      @endif
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('created_at',null,['class'=>'form-control','placeholder'=>'DD-MM-AAAA'])!!}
                      {!! Form::hidden('buscar',1,['class'=>'form-control','placeholder'=>'fecha'])!!}
                  </div>
                </div>
              </div>
              <div class="row">                                                                         {{--SEGUNDO PANEL ROW--}}
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
                      @if($request->buscar)
                        {!! Form::select('sucursal',[''=>'SUCURSAL']+util::getSucursales(),$request->sucursal,['class'=>'form-control']) !!}
                      @else
                        {!! Form::select('sucursal',[''=>'SUCURSAL']+util::getSucursales(),['class'=>'form-control']) !!}
                      @endif
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                      {!! Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'Ciudad'])!!}
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group has-info">
                    <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
                  </div>
                </div><!--FIN CUERPO PANEL!-->
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <div class="panel panel-footer">
        {!! $objetos->appends($request->all())->render() !!}
    </div>
</div>
