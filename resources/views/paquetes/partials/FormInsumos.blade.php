<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS INSUMOS</div>
 <div class="panel-body"> 
<table>
	<tr>
    <th><input type="hidden" value="" id="combo" placeholder="ID" size="3"></th>
    <th><input type="text" value="" id="combo" placeholder="CANT." size="5"></th>
		<th><input type="text" value="" id="combo" placeholder="UNIDAD" size="5"></th>
		<th><input type="text" value="" id="combo" placeholder="CÓDIGO"  size="15"></th>
		<th><input type="text" value="" id="combo" placeholder="DESCRIPCIÓN" size="30"></th>
		<th><input type="text" value="" id="combo" placeholder="PRECIO" size="10"></th>
    <th><input type="text" value="" id="combo" placeholder="TOTAL" size="15"></th>
    <th><input type="text" value="" id="combo" placeholder="MONEDA" size="7"></th>
	<!--	<th><input type="hidden" value="" id="combo" placeholder="SELECCIONAR" size="9"></th>-->
    <th></th>
	</tr>
	<tr ng-repeat="todo in insum" ng-init="setTotals(todo);" > 
    <td> <i class="material-icons"><% todo.icono%></i>  
         <input type="hidden"   value="<% todo.ide %>"              name="objeto[<%$index + 1%>][id_equipo]"       size="0">            
         <input type="hidden"   value="<% todo.id_pack %>"          name="objeto[<%$index + 1%>][id_pack]"         size="0">           
         <input type="hidden"   value="<% todo.tipo_equipo %>"      name="objeto[<%$index + 1%>][tipo_equipo]"     size="0">           
         <input type="hidden"   value="<% todo.modelo %>"           name="objeto[<%$index + 1%>][modelo]"          size="0">           
         <input type="hidden"   value="<% todo.unidad_compra %>"    name="objeto[<%$index + 1%>][unidad_compra]"    size="0">           
         <input type="hidden"   value="<% todo.moneda_compra %>"    name="objeto[<%$index + 1%>][costo_moneda]"     size="0">           
         <input type="hidden"   value="<% todo.costo %>"           name="objeto[<%$index + 1%>][costo]"           size="0">           
         <input type="hidden"   value="<% todo.caracteristicas %>"  name="objeto[<%$index + 1%>][caracteristica]"  size="0">           
         <input type="hidden"   value="<% todo.especificaciones %>" name="objeto[<%$index + 1%>][especificacion]" size="0">           
         <input type="hidden"   value="<% todo.marca%>"             name="objeto[<%$index + 1%>][marca]"            size="6">
         <input type="hidden"   value="<% todo.bandera_insumo %>"   name="objeto[<%$index + 1%>][bandera_insumo]"   size="3">  
         <input type="hidden" value="<?php echo Auth::user()->name ?>" name="objeto[<%$index + 1%>][usuario]">
    </td> 
<!--		<td> <input type="text"   value="<% todo.stk %>"         name="objeto[<%$index + 1%>][stk]"             placeholder="STK"			    size="3">   </td> -->
		<td> <input type="text"   value="<% todo.cantidad %>"         name="objeto[<%$index + 1%>][cantidad]" 	      placeholder="CANTIDAD"		size="5" >   </td> 
    <td> <input type="text"   value="<% todo.unidad_venta %>"     name="objeto[<%$index + 1%>][unidad_medida]"          size="5"     readonly="readonly">           </td>
		<td> <input type="text"   value="<% todo.codigo %>"           name="objeto[<%$index + 1%>][codigo_proovedor]"placeholder="CÓDIGO" 		  size="15" readonly="readonly">  </td> 
		<td> <input type="text"   value="<% todo.descripcion %>"      name="objeto[<%$index + 1%>][descripcion]"     placeholder="DESCRIPCIÓN" size="30" >  </td> 
		<td> <input type="text"   value="<% todo.precio | number:2%>" name="objeto[<%$index + 1%>][precio]" 		placeholder="PRECIO"		  size="10" readonly="readonly">  </td> 
    <td> <input type="text"   value="<% todo.total | number:2%>"  name="objeto[<%$index + 1%>][total]"      placeholder="TOTAL"       size="15" readonly="readonly">  </td> 
		<td> <input type="text"   value="<% todo.moneda_venta %>"     name="objeto[<%$index + 1%>][tipo_cambio]"          size="7">          </td> 
    <td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index,todo.precio,todo.cantidad)"><i class="material-icons">delete_forever</i></p></td>
	</tr>
	</table>

<table class="bg-info pull-right" border="0" width="1100">
  <tr>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">SUBTOTAL: <i class="material-icons">monetization_on</i></label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              {!! Form::text('subtotal1','<%subTotal | number:2%>',array('class'=>'form-control','id'=>'subtotal1','placeholder'=>'$','readonly'=>'readonly')) !!}
              {!! Form::hidden('subtotal','<%subTotal%>',array('class'=>'form-control','id'=>'subtotal')) !!}
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">IVA: <i class="material-icons">monetization_on</i>% 0.16</label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              {!! Form::text('iva1','<%ivaT | number:2%>',array('class'=>'form-control','id'=>'iva1','placeholder'=>'$','readonly'=>'readonly')) !!}
              {!! Form::hidden('impuesto','<%ivaT%>',array('class'=>'form-control','id'=>'iva')) !!}
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">TOTAL: <i class="material-icons">monetization_on</i></label>
          <div class="input-group">
            <span class="input-group-addon"></span>
              {!! Form::text('totales1','<% totales | number:2%>',array('class'=>'form-control','placeholder'=>'$','readonly'=>'readonly')) !!}
              {!! Form::hidden('total','<% totales %>',array('class'=>'form-control')) !!}
          </div>
      </div>
    </td>
    <td>
      <div class="form-group has-info">
          <label class="control-label" for="addon1">  <span class="badge"><h3><% cambio %></h3></span></label>
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><span class="badge"><p><% letras %></p></span> </td> 
    <td colspan="3" align="center"> <button type="button" class="btn btn-info btn-lg" ng-click="sinIva()"><i class="material-icons"></i> SIN IVA</button> </td> 
  </tr>
</table>


  </div>
 </div>