{!! Form::model(Request::all(),['route'=>'equipos.index','method'=>'GET']) !!}
<div class="container">
    <div class="panel panel-default">
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2" ><i class="material-icons">search</i> BUSCAR</a>
          </h4>
        </div>
         <div class="panel-body">
          <!--INICIO CUERPO DEL PANEL!-->
          
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::select('almacen',['GUADALAJARA'=>'GUADALAJARA','VAQUEROS'=>'VAQUEROS'],null,['class'=>'form-group'])!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group has-info">

                  <div class="form-group">
                      {!! Form::text('codigo_proovedor','*1*',['class'=>'form-group','placeholder'=>'CÓDIGO PRODUCTO'])!!}
                      {!! Form::hidden('buscar','1')!!}
                  </div>
              </div>
          </div>
          <div class="col-md-2">
          </div>
          
          <div class="col-md-2">
              <div class="control-label"></div>
              <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
          </div>

          <!--FIN CUERPO PANEL!-->
          </div>
      </div>
    </div>
  </li>
  </ul>     
    <div class="panel panel-footer">
        
    </div>
</div>
</div>    
{!! Form::close() !!}