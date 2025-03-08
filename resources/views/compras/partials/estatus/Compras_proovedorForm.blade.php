<div class="panel panel-info"> 
  <div class="panel-heading"><i class="material-icons">note_add</i> DATOS <%tercero%></div>
 <div class="panel-body"> 
<div class="row">
        <div class='col-md-6'> 
  	<div class="form-group has-info">
            <label class='control-label'><i class='material-icons'>search</i> NOMBRE</label>
        {!! Form::text('nombre_proovedores',null,array('class'=>'form-control',"ng-model"=>"compra_venta.nombre_tercero","ng-change"=>"tercerosLst(compra_venta.nombre_tercero)","placeholder"=>"Nombre")) !!}
        </div>
        </div>
        <div class='col-md-6'> 
    <div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>check</i> <span class="badge"><%proovedores.length%></span></label>
	        <select name="nombre_tercero" ng-model="tipo" class="form-control" ng-change="selectProovedor(tipo)" >
                <option value="">Elige una opción</option>
                    <option ng-repeat="option in proovedores" value="<%option.bpartner_name%>"><%option.bpartner_name%></option>
    		</select>
    </div>    
    </div>
</div>
<div class="row">
    <div class='col-md-4'>     
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> DIRECCION</label>
            {!! Form::text('direccion_tercero',null,array('ng-model'=>'compra_venta.direccion_tercero','class'=>'form-control','readonly'=>'true')) !!}
        </div>
    </div>
    <div class='col-md-4'>  
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> COLONIA</label>
            {!! Form::text('colonia_tercero',null,array('ng-model'=>'compra_venta.colonia_tercero','class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-4'>      
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CODIGO POSTAL</label>
            {!! Form::text('cp_tercero',null,array('ng-model'=>'compra_venta.cp_tercero','class'=>'form-control')) !!}
        </div>
    </div>        
</div>
<div class="row">
    <div class='col-md-4'>  
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> CIUDAD </label>
            {!! Form::text('ciudad_tercero',null,array('ng-model'=>'compra_venta.ciudad_tercero','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
    <div class='col-md-4'>          
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> ESTADO </label>
            {!! Form::text('estado_tercero',null,array('ng-model'=>'compra_venta.estado_tercero','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
    <div class='col-md-4'>    
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i> PAIS </label>
            {!! Form::text('pais_tercero',null,array('ng-model'=>'compra_venta.pais_tercero','class'=>'form-control','readonly'=>'true')) !!}
        </div>
        </div>
</div>

 </div>
 </div>