
<!--<ul class="nav nav-pills" >
  
  <li role="presentation" class="active">
  	<div class="panel-group">-->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1" ng-click="datosFormato();myStyle={color:'red'}"><i class="material-icons">update</i>Datos formato</a>
          </h4>
        </div>
    
          <div class="panel-body"> 
          <!--<label for="Condiciones_comercial">Condiciones comercial:</label>-->

          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.representante_smh.$error.required">*</span>
              <label class="control-label">REPRESENTANTE SMH</label>
<!--              <input type="text" name="representante_smh" class="form-control" ng-model="objeto.representante_smh" size="90" required>-->
              <select name="representante_smh" ng-model="objeto.representante_smh" ng-options="representante_smh.nombre as representante_smh.nombre for representante_smh in representantes_smh" class="form-control" ng-change="getDatosRepresentanteSmh(objeto.representante_smh)" required>
                       <option value="">Elegir. . .</option>
              </select> 
          </div>
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.representante_cliente.$error.required">*</span>
              <label class="control-label">REPRESENTANTE CLIENTE</label>
              <input type="text" name="representante_cliente" class="form-control" ng-model="objeto.representante_cliente" size="90" ng-blur="datosFormato()" required>
          </div>
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.declaracion_cliente.$error.required">*</span>
              <label class="control-label">DECLARACION CLIENTE</label>
              <!--<input type="text" name="declaracion_cliente" class="form-control" ng-model="objeto.declaracion_cliente" size="90" required>-->
              <textarea class="form-control" name="declaracion_cliente"  cols="200" rows="10" ng-model="objeto.declaracion_cliente" placeholder="" required></textarea>
          </div>
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.declaracion_smh.$error.required">*</span>
              <label class="control-label">DECLARACION SMH</label>
              <textarea class="form-control" name="declaracion_smh"  cols="100" rows="10" ng-model="objeto.declaracion_smh" placeholder=""></textarea>
          </div>
              <!--<input type="text" name="declaracion_cliente" class="form-control" ng-model="objeto.declaracion_cliente" size="90" required>-->
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.lugar_pago_cliente.$error.required">*</span>
              <label class="control-label">LUGAR DE PAGO DEL CLIENTE</label>
              <!--<input type="text" name="lugar_pago_cliente" class="form-control" ng-model="objeto.lugar_pago_cliente" size="90" required>-->
              <textarea class="form-control" name="lugar_pago_cliente"  cols="100" rows="5" ng-model="objeto.lugar_pago_cliente" placeholder="" required></textarea>
          </div>
          <!--
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.rescicion_cliente.$error.required">*</span>
              <label class="control-label">RESCISION CLIENTE</label>
              <textarea class="form-control" name="rescicion_cliente"  cols="100" rows="3" ng-model="objeto.rescicion_cliente" placeholder="" required></textarea>
          </div>-->
              <!--<input type="text" name="rescicion_cliente" class="form-control" ng-model="objeto.rescicion_cliente" size="90" required>-->
          <!--<div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.rescicion_smh.$error.required">*</span>
              <label class="control-label">RESCISION SMH</label>
              <textarea class="form-control" name="rescicion_smh"  cols="100" rows="3" ng-model="objeto.rescicion_smh" placeholder="" required></textarea>
          </div>-->
              <!--<input type="text" name="rescicion_smh" class="form-control" ng-model="objeto.rescicion_smh" size="90" required>-->
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.refacciones.$error.required">*</span>
                <label class='control-label'>REFACCIONES</label>
                <!--{!! Form::text('refacciones',null,array('ng-model'=>'objeto.refacciones','class'=>'form-control','placeholder'=>'refacciones')) !!}-->
                <textarea class="form-control" name="refacciones"  cols="100" rows="3" ng-model="objeto.refacciones" placeholder=""></textarea>
            </div>
            <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formContratos.refacciones_excepciones.$error.required">*</span>
                <label class='control-label'>REFACCIONES EXCEPCIONES</label>
                <!--{!! Form::text('refacciones_excepciones',null,array('ng-model'=>'objeto.refacciones_excepciones','class'=>'form-control','placeholder'=>'excepciones')) !!}-->
                <textarea class="form-control" name="refacciones_excepciones"  cols="100" rows="3" ng-model="objeto.refacciones_excepciones" placeholder=""></textarea>
            </div>
          <div class="form-group has-info" >
          <span class="badge badge-warning" ng-show="formContratos.conclusion.$error.required">*</span>
              <label class="control-label">RESUMEN DE CONTRATO</label>
              <!--<input type="text" name="conclusion" class="form-control" ng-model="objeto.conclusion" size="90" required>-->
              <textarea class="form-control" name="conclusion"  cols="100" rows="5" ng-model="objeto.conclusion" placeholder="" required></textarea>
          </div>



		      </div>
          <!--<div class="panel-footer">Panel Footer</div>-->
        </div>


