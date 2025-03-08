{!! Form::model(Request::all(),['route'=>'contratos.index','method'=>'GET']) !!}
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
                      {!! Form::text('nombre_cliente',null,['class'=>'form-group','placeholder'=>'DIRECCION'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('nombre_fiscal',null,['class'=>'form-group','placeholder'=>'CLIENTE'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('folio_contrato',null,['class'=>'form-group','placeholder'=>'NÚMERO CONTRATO INTERNO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('instituto',null,['class'=>'form-group','placeholder'=>'INSTITUTO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                  {!! Form::text('fecha_inicio_contrato',null,['class'=>'form-group','placeholder'=>'FECHA INICIO CONTRATO'])!!}
                      
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                  {!! Form::text('fecha_fin_contrato',null,['class'=>'form-group','placeholder'=>'FECHA FIN CONTRATO'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                  {!! Form::text('ciudad_fiscal',null,['class'=>'form-group','placeholder'=>'CIUDAD'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                  {!! Form::text('estado_fiscal',null,['class'=>'form-group','placeholder'=>'ESTADO'])!!}
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
        
        {!! $objetos->appends($request->all())->render() !!}
        
    </div>
</div>
</div>    
{!! Form::close() !!}