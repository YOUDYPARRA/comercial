
<div class="container">
    <div class="panel panel-default">
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2" ng-click="consultar_ventas()"><i class="material-icons">search</i> BUSCAR EQUIPO</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
          <!--INICIO CUERPO DEL PANEL!-->
          <div class="row">
          
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('id',null,['class'=>'form-group','placeholder'=>'NÚMERO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('folio_contrato_venta',null,['class'=>'form-group','placeholder'=>'NÚMERO CONTRATO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('estatus',null,['class'=>'form-group','placeholder'=>'ESTATUS'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                  @if(isset($request->buscar))
                    {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), '$request->coordinaciones',['class'=>'form-group']) !!}

                  @else
                    {!! Form::select('coordinacion', coordinaciones::getCoordinaciones(), 'auth()->user()->departamento',['class'=>'form-group']) !!}
                  @endif                    
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('modelo',null,['class'=>'form-group','placeholder'=>'MODELO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('numero_serie',null,['class'=>'form-group','placeholder'=>'SERIE'])!!}
                  </div>
              </div>
          </div>
          </div>
          <div class="row">
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('nombre_fiscal',null,['class'=>'form-group','placeholder'=>'CLIENTE'])!!}
                  </div>
              </div>
          </div>          
            
          </div>
          
          <div class="row">
            <div class="col-md-2">
                <div class="control-label"></div>
                <button type="submit" class="btn btn-info btn-lg" ng-click='bsc()' ><i class="material-icons">search</i>BUSCAR</button>
            </div>
            
          </div>

          <!--FIN CUERPO PANEL!-->
          </div>
        </div>
      </div>
    </div>
  </li>
  </ul>     
    <div class="panel panel-footer">
    @if(isset($objeto))
        {!! $objetos->appends($request->all())->render() !!}    
    @endif
    </div>
</div>
</div>