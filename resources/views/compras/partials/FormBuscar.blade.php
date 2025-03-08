{!! Form::model(Request::all(),['route'=>'compras.index','method'=>'GET']) !!}
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
          <!--INICIO CUERPO DEL PANEL!-->
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('org_name',null,['class'=>'form-control','placeholder'=>'Organización'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('autor',null,['class'=>'form-control','placeholder'=>'Autor'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Fecha pedido'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('folio',null,['class'=>'form-control','placeholder'=>'No. Folio'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('numero_cotizacion',null,['class'=>'form-control','placeholder'=>'No. Cotización'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('estatus',null,['class'=>'form-control','placeholder'=>'Estatus'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('nombre_tercero',null,['class'=>'form-control','placeholder'=>'Proveedor'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">
                      {!! Form::text('vendedor',null,['class'=>'form-control','placeholder'=>'Ejecutivo vts.'])!!}
                      {!! Form::hidden('buscar',1,['class'=>'form-control','placeholder'=>'VENDEDOR'])!!}
              </div>
          </div>
          <div class="col-md-2">
              <button type="submit" class="btn btn-raised btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
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
{!! Form::close() !!}