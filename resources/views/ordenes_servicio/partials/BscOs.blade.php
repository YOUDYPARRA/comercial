
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
                      {!! Form::text('condicionprestamoservicio',null,['class'=>'form-group','placeholder'=>'CONDICION SERVICIO'])!!}
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
                      {!! Form::text('serie',null,['class'=>'form-group','placeholder'=>'SERIE'])!!}
                  </div>
              </div>
          </div>
          
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('cliente_nombre',null,['class'=>'form-group','placeholder'=>'CLIENTE'])!!}
                  </div>
              </div>
          </div>          
            <div class="col-md-2">
            <div class="form-group has-info">
                <div class="control-label"></div>
                <div class="form-group">
                <button type="submit" class="btn btn-info btn-lg" ng-click='bsc()' ><i class="material-icons">search</i>BUSCAR</button>
            </div>
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