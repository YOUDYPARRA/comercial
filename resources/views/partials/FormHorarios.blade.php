<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> HORARIOS <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class="panel-body"> 

      <div class="row">
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Mañana entrada </label>
                {!! Form::text('manana_entrada',null,array('ng-model'=>'manana_entrada','class'=>'form-control','placeholder'=>'0','title'=>'Pe. 00')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Mañana salida </label>
            {!! Form::text('manana_salida',null,array('ng-model'=>'manana_salida','class'=>'form-control','placeholder'=>'11','title'=>'Pe. 12','ng-change'=>'validarManana()')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Tarde entrada</label>
            {!! Form::text('tarde_entrada',null,array('ng-model'=>'tarde_entrada','class'=>'form-control','placeholder'=>'12','title'=>'Pe. 13')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Tarde salida</label>
            {!! Form::text('tarde_salida',null,array('ng-model'=>'tarde_salida','class'=>'form-control','placeholder'=>'23','title'=>'Pe. 24','ng-change'=>'validarTarde()')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Trabajo horas</label>
            {!! Form::text('trabajo_horas',null,array('ng-model'=>'trabajo_horas','class'=>'form-control','placeholder'=>'Trabajo horas')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Viaje... horas</label>
            {!! Form::text('viaje_horas',null,array('ng-model'=>'viaje_horas','class'=>'form-control','placeholder'=>'Viaje horas')) !!}
          </div>
        </div>
        <div class='col-md-1'>        
          <div class="form-group has-info">
            <label class='control-label'>Min. Espera.</label>
            {!! Form::text('espera',null,array('ng-model'=>'espera','class'=>'form-control','placeholder'=>'Min. espera')) !!}
          </div>
        </div>
        <div class='col-md-2'>        
          <div class="form-group has-info">
            <label class='control-label'>Fecha de servicio</label>
            <md-datepicker ng-model="fec_ser" md-placeholder="Selecciona la fecha =>" ng-change="select_fec_ser(fec_ser)"></md-datepicker>
            {!! Form::hidden('fecha',null,array('ng-model'=>'fecha','class'=>'form-control','placeholder'=>'00-00-0000','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/')) !!}
            <p class="text-warning">   <span ng-show="formOrdenServicio.fecha.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span></p>
          </div>
        </div>
        <div class='col-md-3'>        
          <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>
              <button type="button" class="btn btn-success" ng-click="agrHora()"> <i class='material-icons'>add</i></button>                        
              <button type="button" class="btn btn-warning" ng-click="limpiar()"> <i class='material-icons'>delete</i></button>                        
            </label>
          </div>
        </div>
    </div>
    <div class="row">       <!--INICIA tabla-->
      <table class="table table-striped table-bordered table-list table-responsive">
        <thead><tr>
          <th>Mañana entrada</th>
          <th>Mañana salida</th>
          <th>Tarde entrada</th>
          <th>Tarde salida</th>
          <th>Trabajo horas</th>
          <th>Viaje horas</th>
          <th>Total horas</th>
          <th>Min. Espera</th>
          <th>Fecha</th>                                    
          <th></th>
        </tr></thead>
        <tbody><tr ng-repeat="horario in horarios | orderBy:'fecha'" ng-model="producto" ng-init="setTotals(horario)"> 
          <td> <% horario.manana_entrada %> </td>
          <td> <% horario.manana_salida %> </td>
          <td> <% horario.tarde_entrada %> </td>
          <td> <% horario.tarde_salida %> </td>
          <td> <% horario.trabajo_horas %> </td>
          <td> <% horario.viaje_horas %> </td>
          <td> <% horario.total_horas %> </td>
          <td> <% horario.espera %></td>                              
          <td> <% horario.fecha %></td>                              
          <td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index,'h')"><i class="material-icons">delete_forever</i></p></td>
        </tr></tbody>
      </table><!--FIN tabla-->
    </div>

  </div>
</div>