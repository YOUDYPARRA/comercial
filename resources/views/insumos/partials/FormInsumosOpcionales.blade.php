    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>INSUMO SELECCIONADO</label>
                {!! Form::text('insumo',null,array('ng-model'=>'insumo','class'=>'form-control','readonly'=>'readonly')) !!}
                {!! Form::hidden('id_insumo',null,array('ng-model'=>'insumos_opcionales.id_insumo','class'=>'form-control')) !!}
            </div>
            
        </div>

        <div class="col-sm-4"> 
            <div class="form-group">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>COMPONENTE</label>
                <select name="repeaSelect" id="repeaSelect" ng-model="componente" class="form-control" ng-change="ComponenteSeleccionado(componente);">
                    <option value="">ELIGE UN COMPONENTE</option>
                    <option ng-repeat="option2 in componentes" value="<%option2.id%>"><%option2.componente%></option>
                </select>
                {!! Form::hidden('id_componente',null,array('ng-model'=>'insumos_opcionales.id_componente','class'=>'form-control')) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label class='control-label'><i class='material-icons'>nombre_icono</i>PERTENECE</label>
                <!--<select ng-options="ins.descripcion for ins in insumosI track by ins.id" ng-model="slcInsumo" ></select>-->
                <select name="repeatSelect" id="repeatSelect" ng-model="seleccionado" class="form-control" ng-change="InsumoSeleccionado(seleccionado);">
                    <option value="">ELIGE UN INSUMO</option>
                    <option ng-repeat="option in insumosI "  value="<%option.id%>">Codigo: <%option.codigo_proovedor%> <% option.bandera_insumo%>></option>
                </select>
                {!! Form::hidden('id_pertenece',null,array('ng-model'=>'insumos_opcionales.id_pertenece','class'=>'form-control')) !!}
            </div>        
        </div>
    </div>
        

