<div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>edit</i> EQUIPOS</label>
        <select  ng-change="filtroMarca()" ng-model="objeto.equipo" ng-options="equipo.nombre as equipo.nombre for equipo in filtro.producto.productos" class="form-control">
             <option value="">Elegir. . .</option>
        </select>
</div>
<div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>edit</i> MARCAS</label>
        <select  ng-change="filtroModelo()" ng-model="objeto.marca" ng-options="marca.marca as marca.marca for marca in filtro.marcas" class="form-control">
             <option value="">Elegir. . .</option>
        </select>
</div>
<div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>edit</i> MODELOS</label>
        <select  ng-model="objeto.modelo" ng-options="modelo.modelo as modelo.modelo for modelo in filtro.modelos" class="form-control">
             <option value="">Elegir. . .</option>
        </select>
</div>
<div class="form-group has-info">
        <label class='control-label'><i class='material-icons'>edit</i> SERIE</label>
        {!! Form::text('serie',null,array('ng-model'=>'objeto.serie','class'=>'form-control','placeholder'=>'serie')) !!}
</div>