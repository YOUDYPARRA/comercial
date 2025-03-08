
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
                      {!! Form::text('id',null,['ng-model'=>'filtro.expendido.equipo','class'=>'form-group','placeholder'=>'NÚMERO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('folio_contrato_venta',null,['ng-model'=>'filtro.expendido.folio_contrato','class'=>'form-group','placeholder'=>'NÚMERO CONTRATO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('estatus',null,['ng-model'=>'filtro.expendido.estatus','class'=>'form-group','placeholder'=>'ESTATUS'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('coordinacion',null,['ng-model'=>'filtro.expendido.coordinacion','ng-model'=>'filtro.expendido.coordinacion','class'=>'form-group','placeholder'=>'coordinacion'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('modelo',null,['ng-model'=>'filtro.expendido.modelo','class'=>'form-group','placeholder'=>'MODELO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('numero_serie',null,['ng-model'=>'filtro.expendido.numero_serie','class'=>'form-group','placeholder'=>'SERIE'])!!}
                  </div>
              </div>
          </div>
        </div>
          <div class="row">
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('nombre_fiscal',null,['ng-model'=>'filtro.expendido.nombre_fiscal','class'=>'form-group','placeholder'=>'CLIENTE'])!!}
                  </div>
              </div>
          </div>          
            <div class="col-md-2">
                <div class="form-group has-info">
                <button type="submit" class="btn btn-info btn-lg" ng-click='bscExpendido()' ><i class="material-icons">search</i>BUSCAR</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group has-info">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bscEquipo" ><i class="material-icons">search</i>VER <span class="badge"> <%filtro.expendidos.length%></span></button>
                </div>
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
    </div>
</div>
</div>