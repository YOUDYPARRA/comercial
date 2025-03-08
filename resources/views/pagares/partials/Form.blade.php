<div class="panel panel-default">
    <div class='panel-heading'><i class="material-icons">local_atm</i> DATOS DEL PAGARE </div>
    <div class='panel-body'>
        @if(isset($id)) Editar
                {!! Form::hidden('id',null,array('ng-init'=>'pagare.id='.$id,'ng-model'=>'pagare.id','class'=>'form-control','id'=>'id')) !!}
        @elseif(isset($id_cotizacion)) Crear
                    {!! Form::hidden('id_cotizacion',null,array('ng-init'=>'pagare.id_cotizacion='.$id_cotizacion,'ng-model'=>'pagare.id_cotizacion','class'=>'form-control','id'=>'id_cotizacion','readonly'=>'readonly')) !!}
        @endif
            {!! Form::hidden('id_contrato_compra_venta',null,array('ng-model'=>'pagare.id_contrato_compra_venta','class'=>'form-control','id'=>'id_contrato_compra_venta')) !!}
<div class="row">
    <div class='col-md-3'>
        <div class="form-group has-info">       
            <label class="control-label" ><i class="material-icons">lock</i>INSTITUCION</label>
            {!! Form::text('organizacion','',array('class'=>'form-control','ng-model'=>'pagare.organizacion','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">       
            <label class="control-label" ><i class="material-icons">lock</i> SUSCRIPTOR</label>
            {!! Form::text('suscriptor','',array('ng-model'=>'pagare.suscriptor','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">       
            <label class="control-label" ><i class="material-icons">lock</i> DIRECCION</label>
            {!! Form::text('financiamiento','',array('ng-model'=>'pagare.direccion','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>    
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">lock</i> EL AVAL</label>
            {!! Form::text('aval',null,array('ng-model'=>'pagare.aval','class'=>'form-control','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'>            
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">today</i> FECHA DE SUSCRIPCION (dd-Mes-yyyy)</label>
            {!! Form::text('fecha_suscripcion',null,array('ng-model'=>'pagare.fecha_suscripcion','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>            
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">mode_edit</i> LUGAR DE SUSCRIPCION</label>
            {!! Form::text('lugar_suscripcion',null,array('ng-model'=>'pagare.lugar_suscripcion','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group has-info">       
            <label class="control-label" ><i class="material-icons">edit</i> VALOR TOTAL DEL PAGARE $</label>
            {!! Form::text('financiamiento','',array('ng-model'=>'pagare.financiamiento','class'=>'form-control','ng-change'=>'obligacion()')) !!}
        </div>
    </div>
    <div class='col-md-3'>    
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">lock</i> MENSUALIDADES</label>
            {!! Form::text('mensualidad',null,array('ng-change'=>'obligacion()','ng-model'=>'pagare.mensualidad','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">edit</i> FECHA DE PAGO</label>
            {!! Form::text('fecha_pago','',array('ng-model'=>'pagare.fecha_pago','class'=>'form-control','id'=>'fecha_pago','readonly'=>'readonly')) !!}
        </div>
    </div>
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">mode_edit</i> PORCENTAJE</label>
            {!! Form::text('porcentaje',null,array('ng-change'=>'txtFaltaPago()','ng-model'=>'pagare.porcentaje','class'=>'form-control','numbers-only')) !!}
        </div>   
    </div>   
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">edit</i> MONEDA</label>
            {!! Form::text('porcentaje',null,array('ng-model'=>'pagare.moneda','class'=>'form-control','ng-change'=>'obligacion()')) !!}
        </div>   
    </div>  
    <div class='col-md-3'>            
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">today</i> FECHA DE PAGARE (dd-mm-yyyy)</label>
            {!! Form::text('fecha_suscripcion',null,array('ng-model'=>'pagare.fecha_pagare','class'=>'form-control','ng-blur'=>'calcPago(pagare.fecha_pagare)')) !!}
        </div>
    </div>
</div>
        
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">mode_edit</i> OBLIGACION DEL SUSCRIPTOR</label>
            <textarea class="form-control" rows="5" ng-model="pagare.obligacion_suscriptor" > </textarea>
            
        </div>

        <table align="center" width="300" border="1">
            <tr>    <th align="center" width="100">   Mensualidad</th> <th align="center" width="200">Fecha de Pago </th>    </tr>
            <tr ng-repeat="pago in fecha_pago  track by $index"><td align="center"><%$index +1%> de <%pagare.mensualidad%></td> <td align="center"> <%pago%></td>  </tr>
        </table>
               
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">mode_edit</i> FALTA DE PAGO</label>
            <textarea class="form-control" rows="4" cols="50" ng-model="pagare.falta_pago"> </textarea>
        </div>
                
        <div class="form-group has-info">
            <label class="control-label"><i class="material-icons">mode_edit</i> CONTROVERSIA DE SUSCRIPCION</label>
            <textarea class="form-control" rows="5" ng-model="pagare.controversia_suscripcion"> </textarea>
        </div>
        
        
    </div>
    <div class="panel-footer"> 
        <!--<button type="button" class="btn btn-warning btn-lg" ng-click="prueba();" confirm="Are you sure?"><i class="material-icons">blur_on</i>BORRAR</button> -->
    </div>  
</div>  
