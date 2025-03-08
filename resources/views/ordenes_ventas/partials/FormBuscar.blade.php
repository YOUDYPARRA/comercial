
<div class="container">
    <div class="panel panel-default">
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
          <!--INICIO CUERPO DEL PANEL!-->
          
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('auto',null,['class'=>'form-group','placeholder'=>'NÚMERO ORDEN'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('numero_cotizacion',null,['class'=>'form-group','placeholder'=>'NÚMERO COTIZACIÓN'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('no_contrato',null,['class'=>'form-group','placeholder'=>'CONTRATO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('nombre_fiscal',null,['class'=>'form-group','placeholder'=>'NOMBRE FISCAL'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::hidden('buscar',1,['class'=>'form-group'])!!}
                  </div>
              </div>
          </div>
          
          <div class="col-md-2">
              <div class="control-label"></div>
              <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
          </div>

          <!--FIN CUERPO PANEL!-->
          </div>
        </div>
      </div>
    </div>
  </li>
  </ul>     
    <div class="panel panel-footer">
        
        {!! $objetos->appends(['sort'=>'auto','buscar'=>'buscar','auto'=>$request->auto,'numero_cotizacion'=>$request->numero_cotizacion,'no_contrato'=>$request->no_contrato,'nombre_fiscal'=>$request->nombre_fiscal])->render() !!}
    </div>
</div>
</div>    
