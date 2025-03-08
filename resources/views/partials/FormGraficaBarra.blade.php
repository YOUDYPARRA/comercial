	<div class="panel panel-info" ng-show="verBarra">
		<div class='panel-heading'>GRAFICA BARRA</div>
		<div class='panel-body'>
			<div> <h2> <%anio%></h2> <%compromiso%> <%autor%></div>
			<canvas 
    			class="chart chart-bar" 
    			chart-data="datos" 
    			chart-labels="etiquetas">
			</canvas>
		</div>
		<div class="panel-footer"> 
		</div>
	</div>