<div >
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2"><i class="material-icons">note_add</i> Texto de saludo</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body"> 
            <div class="form-group has-info">
              <label class="control-label" for="condicion_precio" ng-click="sbSaludo()" title="HACER CLIC PARA PONER TEXTO POR DEFAULT"><i class="material-icons">history</i> SALUDO </label>
              <textarea class="form-control" name="mensaje_atencion"  cols="120" ng-model="cotizacion.mensaje_atencion" placeholder="ESCRIBE EL MENSAJE DE ATENCIÓN" ></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapseObservacion" ><i class="material-icons">note_add</i> Observaciónes cliente</a>
          </h4>
        </div>
        <div id="collapseObservacion" class="panel-collapse collapse">
          <div class="panel-body"> 
            <div class="form-group has-info">
              <label class="control-label" for="condicion_precio" ng-click="sbObservacion()" title="HACER CLIC PARA PONER TEXTO POR DEFAULT"><i class="material-icons">history</i> OBSERVACION CLIENTE </label>
              <textarea class="form-control" name="nota"  cols="120" placeholder="ESCRIBE LA (S) OBSERVACIÓN (ES)" ng-model="cotizacion.nota"></textarea>
            </div>
            
          </div>
  
        </div>
      </div>
    </div>

  </li>

  <li role="presentation" class="active">
  	<div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1"><i class="material-icons">note_add</i> Condiciones </a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body"> 
          <!--<label for="Condiciones_comercial">Condiciones comercial:</label>-->
          <div class="form-group has-info" ng-show="condicion_reporte">
              <label class="control-label">NUMERO DE REPORTE</label>
              <input type="text" name="reporte" class="form-control" ng-model="cotizacion.reporte" size="90">
            </div>
            <div class="form-group has-info" ng-show="condicion_anticipo">
              <label class="control-label" ng-click="sbAnticipo()"><i class="material-icons">history</i> ANTICIPO </label>
              <textarea class="form-control" name="anticipo"  cols="120" size="1" ng-model="cotizacion.anticipo" placeholder="ANTICIPO" ></textarea>
            </div>
            <!-- -------------------------------------------------------------- -->
            <div class="form-group has-info"  ng-show="condicion_precio">
            <label class="control-label" ng-click="bPrecio()"><i class="material-icons">history</i> PRECIO</label>
      				<textarea class="form-control" name="precio" value cols="120" ng-model="cotizacion.precio" placeholder="PRECIO" ng-disabled="habilitarCondicion"></textarea>
			      </div>
            <div class="form-group has-info"  ng-show="condicion_tiempo_entrega">
              <label class="control-label" ng-click="bTiempos()"><i class="material-icons">history</i> TIEMPOS DE ENTREGA </label>
              <textarea class="form-control" name="tiempo_entrega"  cols="120" rows="3" ng-model="cotizacion.tiempo_entrega" placeholder="TIEMPOS DE ENTREGA"></textarea>
            </div>
            <div class="form-group has-info"  ng-show="condicion_pago">
              <label class="control-label"  ng-click="bPago()"><i class="material-icons">history</i> CONDICIONES DE PAGO </label>
              <textarea class="form-control" name="condicion_pago"  cols="120" rows="3" ng-model="cotizacion.condicion_pago" placeholder="CONDICIONES DE PAGO"></textarea>
            </div>
            <div class="form-group has-info"  ng-show="condicion_guia_mecanica">
              <label class="control-label"  ng-click="bGuias()"><i class="material-icons">history</i> GUIAS MECANICAS, SALVAGUARDA  E  INSTALACION </label>
              <textarea class="form-control" name="condicion_guia_mecanica_salvaguarda_instalacion_v"  cols="83" rows="3" ng-model="cotizacion.guia_mecanica_salvaguarda_instalacion" placeholder="GUIAS MECANICAS, SALVAGUARDA  E  INSTALACION" ></textarea>
            </div>
            <div class="form-group has-info"  ng-show="condicion_garantia">
              <label class="control-label" ng-click="bGarantia()"><i class="material-icons">history</i> GARANTIA </label>
              <textarea class="form-control" name="garantia"  cols="120" rows="3" ng-model="cotizacion.garantia" placeholder="GARANTIA" ></textarea>
            </div>
            <div class="form-group has-info"  ng-show="condicion_capacitacion">
              <label class="control-label"  ng-click="bCapacitacion()"><i class="material-icons">history</i> CAPACITACION </label>
              <textarea class="form-control" name="capacitacion"  cols="120" ng-model="cotizacion.capacitacion" placeholder="CAPACITACION"></textarea>
            </div>
            <div class="form-group has-info"  ng-show="condicion_vigencia">
              <label class="control-label" ng-click="bValidez()"><i class="material-icons">history</i> VIGENCIA </label>
              <textarea class="form-control" name="validez"  cols="120" rows="3" ng-model="cotizacion.validez" placeholder="VIGENCIA"></textarea>
            </div>

		      </div>
          <!--<div class="panel-footer">Panel Footer</div>-->
        </div>
      </div>
    </div>

  </li>

  
</ul>
</div>