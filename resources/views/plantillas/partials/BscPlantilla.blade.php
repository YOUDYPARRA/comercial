
<div class="container">
    <div class="panel panel-default">
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse3" ng-click=""><i class="material-icons">search</i> BUSCAR</a>
          </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
          <div class="panel-body">
          <!--INICIO CUERPO DEL PANEL!-->
          <div class="row">
          <div class="col-md-2">
              <div class="form-group has-info">
                  <div class="form-group">
                      {!! Form::text('nombre',null,['class'=>'form-group','placeholder'=>'NOMBRE'])!!}
                  </div>
              </div>
          </div>          
            
          </div>
          
          <div class="row">
            <div class="col-md-2">
                <div class="control-label"></div>
                <button type="submit" class="btn btn-info btn-lg" ><i class="material-icons">search</i>BUSCAR</button>
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