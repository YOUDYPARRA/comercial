<div class="panel panel-default">
    <div class='panel-heading'><i class="material-icons">import_contacts</i> DATOS DEL CLIENTE </div>
        <div class='panel-body'>
            <div class="row">
            <div class='col-md-2'>
                <div class="form-group has-info">
                    <label class="control-label" for="leyenda"><i class="material-icons"></i> CONTRATO</label>
                    {!! Form::text('contrato',null ,array('ng-model'=>'contrato_compra_venta.numero_contrato_compra_venta','readonly'=>'readonly','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group has-info">
                    <label class="control-label" for="leyenda"><i class="material-icons"></i> FECHA CONTRATO</label>
                    {!! Form::text('fecha_contrato',null ,array('ng-model'=>'contrato_compra_venta.fecha','readonly'=>'readonly','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group has-info">
                    <label class="control-label" for="leyenda"><i class="material-icons"></i> NO COTIZACION</label>
                    {!! Form::text('cotizacion',null ,array('ng-model'=>'contrato_compra_venta.cotizacion','readonly'=>'readonly','class'=>'form-control')) !!}
                </div>
            </div>
            <div class='col-md-2'>
                <div class="form-group has-info">
                    <label class="control-label" for="leyenda"><i class="material-icons"></i> ORGANIZACION</label>
                    {!! Form::text('cotizacion',null ,array('ng-model'=>'contrato_compra_venta.organizacion','readonly'=>'readonly','class'=>'form-control')) !!}
                </div>
            </div>
              <div class='col-md-2'>
                <div class="form-group has-info">
                    <label class="control-label" for="leyenda"><i class="material-icons"></i> AGENTE COMERCIAL</label>
                    {!! Form::text('contrato',null ,array('ng-model'=>'contrato_compra_venta.iniciales_asignado','readonly'=>'readonly','class'=>'form-control')) !!}
                </div>
            </div>
        </div>
    @if(isset($id))

                {!! Form::hidden('id',null,array('ng-model'=>'contrato_compra_venta.id','readonly'=>'readonly','required'=>'','class'=>'form-control','id'=>'id'
                ,'ng-model'=>'contrato_compra_venta.id','ng-init'=>'contrato_compra_venta.id='.$id
                )) !!}

                {!! Form::hidden('numero_contrato_compra_venta',null,array('ng-model'=>'contrato_compra_venta.numero_contrato_compra_venta','readonly'=>'readonly','required'=>'','class'=>'form-control')) !!}
            
                {!! Form::hidden('id_cotizacion',null,array('ng-model'=>'contrato_compra_venta.id_cotizacion','readonly'=>'readonly','class'=>'form-control')) !!}
            
            @else
                {!! Form::hidden('id_cotizacion',null,array('ng-model'=>'contrato_compra_venta.id_cotizacion','readonly'=>'readonly','class'=>'form-control','ng-init'=>'contrato_compra_venta.id_cotizacion='.$id_cotizacion)) !!}
    @endif
    <div class="row">
        <div class='col-md-9'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> NOMBRE</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.nombre_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> RFC</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.rfc%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> CALLE</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.calle_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> COLONIA</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.colonia_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> CÓDIGO POSTAL</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.codigo_postal_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> CIUDAD</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.ciudad_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> ESTADO</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.estado_fiscal%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group  has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> TELÉFONO</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.telefono%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group has-warning">
                <label class="control-label" for="leyenda"><i class="material-icons"></i> CORREO</label>
                {!! Form::text('id_cotizacion_nf','<%cotizacion.correo%>' ,array('readonly'=>'readonly','class'=>'form-control')) !!}
            </div>
        </div>
    </div>
<div class="row">
    <div class='col-md-6'>
        <div class="form-group has-info">
            <label class="control-label" for="identificacion"><i class="material-icons"></i> IDENTIFICACIÓN</label>
            {!! Form::text('identificacion',null,array('ng-model'=>'contrato_compra_venta.identificacion','required'=>'','class'=>'form-control','id'=>'identificacion')) !!}
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group has-info">
            <label class="control-label" for="numero"><i class="material-icons"></i> NÚMERO DE IDENTIFICACIÓN</label>
            {!! Form::text('numero',null,array('ng-model'=>'contrato_compra_venta.numero','required'=>'','class'=>'form-control','id'=>'numero')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="numero_escritura_publica"><i class="material-icons"></i> NÚMERO DE ESCRITURA PUBLICA</label>
            {!! Form::text('numero_escritura_publica',null,array('ng-model'=>'contrato_compra_venta.numero_escritura_publica','required'=>'','class'=>'form-control','id'=>'numero_escritura_publica')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="notario"><i class="material-icons"></i> NOTARIO</label>
            {!! Form::text('notario',null,array('ng-model'=>'contrato_compra_venta.notario','required'=>'','class'=>'form-control','id'=>'notario')) !!}
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group has-info">
            <label class="control-label" for="ciudad"><i class="material-icons"></i> CIUDAD</label>
            {!! Form::text('ciudad',null,array('ng-model'=>'contrato_compra_venta.ciudad','required'=>'','class'=>'form-control','id'=>'ciudad')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="numero_poder"><i class="material-icons"></i> NÚMERO DE PODER</label>
            {!! Form::text('numero_poder',null,array('ng-model'=>'contrato_compra_venta.numero_poder','required'=>'','class'=>'form-control','id'=>'numero_poder')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="notario"><i class="material-icons"></i> NOTARIO</label>
            {!! Form::text('notario',null,array('ng-model'=>'contrato_compra_venta.notario1','required'=>'','class'=>'form-control','id'=>'notario')) !!}
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group has-info">
            <label class="control-label" for="ciudad"><i class="material-icons"></i> CIUDAD</label>
            {!! Form::text('ciudad',null,array('ng-model'=>'contrato_compra_venta.ciudad1','required'=>'','class'=>'form-control','id'=>'ciudad')) !!}
        </div>
    </div>
    <div class='col-md-12'>
        <div class="form-group has-info">
            <label class="control-label" for="aclaracion_dato_comprador"><i class="material-icons"></i> ACLARACIÓN DE DATOS DEL COMPRADOR</label>
            {!! Form::text('aclaracion_dato_comprador',null,array('ng-model'=>'contrato_compra_venta.aclaracion_dato_comprador','required'=>'','class'=>'form-control','id'=>'aclaracion_dato_comprador')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" for="fecha"><i class="material-icons"></i> SUBTOTAL</label>
                    {!! Form::text('subtotal',null,array('ng-model'=>'contrato_compra_venta.subtotal','class'=>'form-control','ng-blur'=>'calCTotal()')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" for="iva"><i class="material-icons"></i> IVA</label>
                {!! Form::text('iva',null,array('ng-model'=>'contrato_compra_venta.iva','required'=>'','class'=>'form-control','ng-change'=>'calCTotal()')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" for="financiamiento"><i class="material-icons"></i> TOTAL </label>
                {!! Form::text('total',null,array('ng-model'=>'contrato_compra_venta.total','required'=>'','class'=>'form-control')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" for="financiamiento"><i class="material-icons"></i> MONEDA </label>
                {!! Form::select('moneda',array(''=>'Elegir','USD'=>'DOLARES (USD)','MXN'=>'PESOS (MXN->)','EUR'=>'EUROS (EUR'),'',array('class'=>'form-control','ng-model'=>'contrato_compra_venta.moneda','required','ng-change'=>'datosContrato();elMoneda();')) !!}
            </div>
    </div>
</div>
<div class="row">
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" for="enganche"><i class="material-icons"></i> ENGANCHE</label>
                {!! Form::text('enganche',null,array('ng-model'=>'contrato_compra_venta.enganche','required'=>'','class'=>'form-control')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" ><i class="material-icons"></i> CONTRA ENTREGA</label>
                {!! Form::text('contraentrega',null,array('ng-model'=>'contrato_compra_venta.contraentrega','required'=>'','class'=>'form-control')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label" ><i class="material-icons"></i> FINANCIAMIENTO</label>
                {!! Form::text('finaciamiento',null,array('ng-model'=>'contrato_compra_venta.financiamiento','required'=>'','class'=>'form-control')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label"><i class="material-icons"></i>NO PAGOS</label>
                {!! Form::text('mensualidad',null,array('ng-change'=>'cmpMensualidad()','ng-model'=>'contrato_compra_venta.mensualidad','required'=>'','class'=>'form-control', 'ng-disabled'=>'$scope.financiamiento','numbers-only','ng-disabled'=>'financiamiento2')) !!}
            </div>
    </div>
    <div class='col-md-3'>
            <div class="form-group has-info">
                <label class="control-label"><i class="material-icons"></i>MONTO PAGARE</label>
                {!! Form::text('pagare',null,array('ng-model'=>'contrato_compra_venta.pagare','required'=>'','class'=>'form-control', 'ng-disabled'=>'$scope.financiamiento')) !!}
            </div>
    </div>
    <!--<div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="comprador"><i class="material-icons"></i> GARANTIA </label>
            {!! Form::text('garantia',null,array('ng-model'=>'contrato_compra_venta.garantia','required'=>'','class'=>'form-control','id'=>'garantia')) !!}
        </div>
    </div>-->
    <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.garantia.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>GARANTIA</label>
                    <select name="garantia" ng-model="contrato_compra_venta.garantia" class="form-control" required>
                        <option value="">Elige...</option>
                        <option ng-repeat="tiempo in garantias_contrato" value="<%tiempo.nombre%>"><% tiempo.nombre%> MESES</option>
                    </select>
                </div>
            </div>
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="leyenda"><i class="material-icons"></i> REPRESENTANTE LEGAL</label>
            {!! Form::text('comprador_representante',null,array('ng-model'=>'contrato_compra_venta.comprador_representante','readonly'=>'readonly','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="aval"><i class="material-icons"></i> AVAL</label>
            {!! Form::text('aval',null,array('ng-model'=>'contrato_compra_venta.aval','required'=>'aval','class'=>'form-control','id'=>'aval')) !!}
        </div>
    </div>
    <div class='col-md-12'>
        <div class="form-group has-info">
            <label class="control-label" for="comprador"><i class="material-icons"></i> CONDICION ENTREGA </label>
            {!! Form::text('entrega',null,array('ng-model'=>'contrato_compra_venta.entrega','required'=>'','class'=>'form-control','ng-blur'=>'datosContrato()')) !!}
        </div>
    </div>
    <!--<div class='col-md-3'>
        <div class="form-group has-info">
            <label class="control-label" for="comprador"><i class="material-icons"></i> COMPRADOR Y/O REPRESENTANTE </label>
            {!! Form::text('comprador_representante',null,array('ng-model'=>'contrato_compra_venta.comprador_representante','required'=>'','class'=>'form-control')) !!}
        </div>
    </div>-->

</div>

        </div>
        <div class="panel-footer">
          <!--  <button type="button" class="btn btn-warning btn-lg" ng-click="bDatosCliente();"><i class="material-icons">blur_on</i>BORRAR</button>-->
        </div>
</div>

<div class="panel panel-default">
<div class='panel-heading'><i class="material-icons">import_contacts</i> DATOS DEL CONTRATO</div>
                <div class='panel-body'>
        <!--<div class="form-group label-floating has-info">
                <label class="control-label" for="leyenda"><i class="material-icons">history</i> LEYENDA COMPRADOR</label>
                <textarea class="form-control" rows="1" cols="100" ng-model="contrato_compra_venta.leyenda_comprador"></textarea>
        </div>-->
        <div class="form-group has-info">
            <label class="control-label" for="leyenda_equipo"><i class="material-icons">history</i> LEYENDA EQUIPO</label>
            {!! Form::text('leyenda_equipo',null,array('ng-model'=>'contrato_compra_venta.leyenda_equipo','required'=>'','class'=>'form-control','id'=>'leyenda_equipo')) !!}
        </div>

        <div class="form-group label-floating has-info">
            <label class="control-label" for="acuerdo_equipo"><i class="material-icons">history</i> ACUERDO DEL EQUIPO</label>
            <textarea class="form-control" rows="3" cols="100" ng-model="contrato_compra_venta.acuerdo_equipo"></textarea>
            <!--INICIO DE LA TABLA DE PRECIOS-->
            <table border="2" align="center" width="400">
                    <tr align="right">
                        <td> Precio <%moneda%> </td>
                        <td> <%contrato_compra_venta.subtotal | number:2%> </td>
                    </tr>
                    <tr align="right">
                        <td> Impuestos (I.V.A.): </td>
                        <td> <%contrato_compra_venta.iva | number:2%> </td>
                    </tr>
                    <tr align="right">
                        <td> Precio Total: </td>
                        <td> <%contrato_compra_venta.total | number:2%> </td>
                    </tr>
            </table>
            <!--FIN DE LA TABLA DE PRECIOS-->
        </div>

        <div class="form-group  has-info">
            <label class="control-label" for="editar"><i class="material-icons">history</i> CONDICIÓN DE PAGO</label>
                <textarea class="form-control" rows="3" cols="100" ng-model="contrato_compra_venta.condicion_pago"></textarea>
        </div>

        <div class="form-group has-info">
                <label class="control-label" for="aclaración_pago"><i class="material-icons">history</i> ACLARACIÓN DE PAGO</label>
                {!! Form::text('aclaración_pago',null,array('ng-model'=>'contrato_compra_venta.aclaracion_pago','required'=>'','class'=>'form-control','id'=>'aclaración_pago')) !!}
        </div>

        <div class="form-group label-floating has-info">
            <label class="control-label" for="obligacion_comprador"><i class="material-icons">history</i> OBLIGACIÓN DEL COMPRADOR</label>
            <textarea class="form-control" rows="10" cols="110" ng-model="contrato_compra_venta.obligacion_comprador"></textarea>
        </div>

        <div class="form-group label-floating has-info">
            <label class="control-label" for="condicion_entrega"><i class="material-icons">history</i> CONDICIÓN DE ENTREGA</label>
            {!! Form::text('condicion_entrega',null,array('ng-model'=>'contrato_compra_venta.condicion_entrega','required'=>'','class'=>'form-control','id'=>'condicion_entrega')) !!}
        </div>

        <div class="form-group label-floating has-info">
            <label class="control-label" for="condicion_adecuacion"><i class="material-icons">history</i> CONDICIÓN DE ADECUACIÓN</label>
            <textarea class="form-control" rows="3" cols="100" ng-model="contrato_compra_venta.condicion_adecuacion"></textarea>
        </div>

        <div class="form-group label-floating has-info">
            <label class="control-label" for="condicion_clausula"><i class="material-icons">history</i> CONDICIÓN DE LA CLAUSULA</label>
            <textarea class="form-control" rows="3" ng-model="contrato_compra_venta.condicion_clausula"></textarea>
        </div>

        

</div>
        <div class="panel-footer">
           <!-- <button type="button" class="btn btn-warning btn-lg" ng-click="bDatosContrato();"><i class="material-icons">blur_on</i>BORRAR</button>-->
        </div>
<div>
<ul class="nav nav-pills" >
  <li role="presentation" >
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1"><i class="material-icons">note_add</i> DORSO</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body"> 
            <div class="form-group has-info">
              <label class="control-label" for="dorso"><i class="material-icons">history</i> Dorso </label>
              <textarea class="form-control" name="dorso" rows="63" cols="150" ng-model="contrato_compra_venta.leyenda_comprador" placeholder="DORSO" ></textarea>
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
            <a data-toggle="collapse" href="#collapse2"><i class="material-icons">note_add</i> ANEXO</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body"> 
            <div class="form-group has-info">
              <label class="control-label" for="dorso"><i class="material-icons">history</i> Anexo </label>
              <textarea class="form-control" name="dorso" rows="10" cols="150" ng-model="contrato_compra_venta.anexo" placeholder="Texto" ></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li> 
</ul>
</div>

</div>
