{!! Form::model(Request::all(),['route'=>'prestamos.index','method'=>'GET']) !!}
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
                      {!! Form::text('folio',null,['class'=>'form-group','placeholder'=>'FOLIO'])!!}
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
                      {!! Form::text('estatus',null,['class'=>'form-group','placeholder'=>'ESTATUS'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('autor',null,['class'=>'form-group','placeholder'=>'AUTOR'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('vigencia',null,['class'=>'form-group','placeholder'=>'VIGENCIA'])!!}
                      {!! Form::hidden('buscar',1,['class'=>'form-group','placeholder'=>'VENDEDOR'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('organizacion',null,['class'=>'form-group','placeholder'=>'ORGANIZACION'])!!}
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
