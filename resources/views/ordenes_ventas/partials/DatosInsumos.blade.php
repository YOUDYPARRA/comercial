<div class="panel panel-info"> 
  	<div class="panel-heading"><i class="material-icons">note_add</i> DATOS PRODUCTOS <span class="badge"></span></div>
 	<div class="panel-body"> 

<table>
	<tr>
    <th><input type="hidden" value="" id="combo" placeholder="ID" size="3"></th>
<!--		<th><input type="text" value="" id="combo" placeholder="STK"  size="3"> </th>-->
    <th><input type="text" value="" id="combo" placeholder="CANT." size="5"></th>
		<th><input type="text" value="" id="combo" placeholder="UNIDAD" size="10"></th>
		<th><input type="text" value="" id="combo" placeholder="CÓDIGO"  size="10" ></th>
		<th><input type="text" value="" id="combo" placeholder="DESCRIPCIÓN" size="35"></th>
		<th><input type="text" value="" id="combo" placeholder="PRECIO" size="10"></th>
    <th><input type="text" value="" id="combo" placeholder="TOTAL" size="15"></th>
    <th><input type="text" value="" id="combo" placeholder="MONEDA" size="6"></th>
		<th><input type="text" value="" id="combo" placeholder="SELECCIONAR" size="9"></th>
    <th></th>
   <!-- <th></th>-->
	</tr>
	<tr ng-repeat="todo in insum" ng-init="setTotals(todo);" > 
    <td> 
         <input type="hidden"   value="<% todo.ide %>"               name="objetos[<%$index + 1%>][id_insumo]"        size="0">            
         <input type="hidden"   value="<% todo.id_pack %>"           name="objetos[<%$index + 1%>][id_pack]"          size="0">           
         <input type="hidden"   value="<% todo.tipo_equipo %>"       name="objetos[<%$index + 1%>][tipo_equipo]"      size="0">           
         <input type="hidden"   value="<% todo.marca %>"             name="objetos[<%$index + 1%>][marca]"            size="0">           
         <input type="hidden"   value="<% todo.modelo %>"            name="objetos[<%$index + 1%>][modelo]"           size="0">           
         <input type="hidden"   value="<% todo.costo_moneda %>"      name="objetos[<%$index + 1%>][costo_moneda]"     size="0"> 
         <input type="hidden"   value="<% todo.costos%>"             name="objetos[<%$index + 1%>][costos]"           size="0">           
         <input type="hidden"   value="<% todo.caracteristicas %>"   name="objetos[<%$index + 1%>][caracteristicas]"  size="0">           
         <input type="hidden"   value="<% todo.especificaciones %>"  name="objetos[<%$index + 1%>][especificaciones]" size="0">  
         <input type="hidden"   value="<% todo.unidad_compra %>"     name="objetos[<%$index + 1%>][unidad_compra]"    size="0">          
         <input type="hidden"   value="<% todo.bandera_insumo %>"    name="objetos[<%$index + 1%>][bandera_insumo]"   size="0"> 
    </td> 
		<td> <input type="text"   value="<% todo.cantidad %>"         name="objetos[<%$index + 1%>][cantidad]" 	      placeholder="CANTIDAD"		size="5"    readonly="readonly">  </td> 
    <td> <input type="text"   value="<% todo.unidad_venta %>"     name="objetos[<%$index + 1%>][unidad_venta]"    placeholder="UNIDAD"      size="10"   readonly="readonly">  </td>
		<td> <input type="text"   value="<% todo.codigo %>"           name="objetos[<%$index + 1%>][codigo_proovedor]"placeholder="CÓDIGO" 		  size="10"   readonly="readonly">  </td> 
		<td> <input type="text"   value="<% todo.descripcion %>"      name="objetos[<%$index + 1%>][descripcion]"     placeholder="DESCRIPCIÓN" size="35"   readonly="readonly">  </td> 
		<td> <input type="text"   value="<% todo.precio | number:2%>" name="objetos[<%$index + 1%>][precio]"          placeholder="PRECIO"      size="0"    readonly="readonly">  </td> 
    <td> <input type="text"   value="<% todo.total | number:2%>"  name="objetos[<%$index + 1%>][total]"           placeholder="TOTAL"       size="15"   readonly="readonly">  </td> 
    <td> <input type="text"   value="<% todo.tipo_cambio%>"       name="objetos[<%$index + 1%>][tipo_cambio]"     placeholder="MONEDA"      size="6"    readonly="readonly">  </td> 
		<td> <input type="checkbox" name="objetos[<%$index + 1%>][checkbox]" ng-click="cmpMarca(todo.marca)"> </td>
    <!--<td><p class="text-warning" title="BORRAR PRODUCTO" ng-click="remover($index,todo.precio,todo.cantidad)"><i class="material-icons">delete_forever</i></p></td>-->
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
              {!! Form::hidden('iva','<%ivaT%>',array('class'=>'form-control','id'=>'iva')) !!}
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
              {!! Form::hidden('letras','<% cotizacion.letras %>',array('class'=>'form-control')) !!}
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
    <td colspan="3" align="center"><span class="badge"><p><% cotizacion.letras %></p></span> </td> 
    <!--<td>  </td> 
    <td> </td> -->
    <td> </td> 
  </tr>
</table>

	</div>
</div>