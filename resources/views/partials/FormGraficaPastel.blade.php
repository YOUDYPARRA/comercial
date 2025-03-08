 
	<div class="panel panel-info" ng-show="verPastel">
		<div class='panel-heading'>GRAFICA PASTEL</div>
		<div class='panel-body'>
			<div> <h2> <%anio%></h2> <%compromiso%></div>
			<canvas 
    			class="chart chart-pie" 
    			chart-data="datos" 
    			chart-labels="etiquetas">
			</canvas>
		</div>
		<div class="panel-footer"> 
		</div>
	</div>
