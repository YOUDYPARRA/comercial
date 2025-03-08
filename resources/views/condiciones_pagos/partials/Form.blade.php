<div class='form-group'>
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
        
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>MARCA</label>

                    <select  ng-model="objeto.id_marca" ng-options="marca.id as marca.marca_representada for marca in y.marcas_proveedores.data">
                         <option value="">Elegir. . .</option>
                    </select>
                
            </div>
            
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i> ETIQUETA</label>
                {!! Form::text('etiqueta',null,array('class'=>'form-control','ng-model'=>'objeto.etiqueta')) !!}
            </div>
            
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i> INSTITUTO</label>
                {!! Form::select('instituto',['PRIVADO'=>'PRIVADO','GOBIERNO'=>'GOBIERNO'],null,array('class'=>'form-control','ng-model'=>'objeto.instituto')) !!}
            </div>
            
            <div class="form-group  has-info">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>CONDICIÓN</label>
                
                <select  ng-model="objeto.c_paymentterm_id" ng-options="metodo.fin_paymentmethod_id as metodo.name for metodo in x.metodos_pago">
                         <option value="">Elegir. . .</option>
                </select>

                

            </div>
    </div>
    <div class="col-sm-3"></div>
        
</div>