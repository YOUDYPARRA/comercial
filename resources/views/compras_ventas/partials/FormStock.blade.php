<div ng-controller="StockCtrl">{{--INICIO STOCK--}}
	<button type="button" class="btn btn-info btn-xs" title="VER STOCK DE LA SOLICITUD" ng-click="hoverEdit = !hoverEdit;hoverIn({{$objeto->id}},'pres')"><i class="material-icons">filter_1</i> <%cantidad_total%></button>
	<span ng-show="hoverEdit" class="animate-show">
        <table class="table table-striped">
            <tr class="success">
        	    <th  style="font-size:70%;">+</th>
                <th  style="font-size:70%;">Codigo</th>
                <th  style="font-size:70%;">Cant venta</th>
                <th  style="font-size:70%;">Unidad venta</th>
                <th  style="font-size:70%;">Almacen</th>
            </tr>
            <tr ng-repeat="equipo in stock_cot_insumos" >
                <td  style="font-size:70%;">-</td>
                <td  style="font-size:70%;"><%equipo.codigo%></td>
                <td  style="font-size:70%; color: blue"><%equipo.cantidad_venta%></td>
                <td  style="font-size:70%;"><%equipo.unidad_venta%></td>
                <td  style="font-size:70%;"><%equipo.almacen%></td>
			</tr>
		</table>
	</span>
</div>{{--FIN DE QRY STOCK--}}