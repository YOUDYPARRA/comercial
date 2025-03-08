<div class="row">
    <div class="col-md-1">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>PROYECTO</label>
            <select name="proyecto" ng-model="objeto.proyecto" class="form-control">
                        <option ng-repeat="pry in proyectos" value="<%pry.nombre%>"><% pry.nombre%></option>
                </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>CLIENTE</label>
                {!! Form::text('cliente',null,array('ng-model'=>'objeto.cliente','class'=>'form-control','placeholder'=>'Razon Social')) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>DIRECCION:</label>
            <%objeto.entrega%>
            <select name="entrega" ng-model="objeto.entrega" class="form-control">
                    <option value="">Elige una dirección</option>
                    <option ng-repeat="org in direcciones | orderBy : 'name'"  value="<%org.name%> , <%org.city%> , <%org.region_name%>, <%org.address1%>"><%org.name%> , <%org.city%> , <%org.region_name%>, <%org.address1%></option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
                <button type="button" class="btn btn-raised btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"><i class="material-icons">search</i> Cliente </button>
                @include('partials.modals.tercerosDirecciones')
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-4">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>ATENCION A</label>
                {!! Form::text('atencion',null,array('ng-model'=>'objeto.atencion','class'=>'form-control')) !!}
        </div>
    </div>    
    <div class="col-md-4">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CONTACTO <%lleva%> </label>
            <!--{!! Form::text('contacto',null,array('ng-model'=>'objeto.contacto','class'=>'form-control','placeholder'=>'Telefono ETC.')) !!}-->
            <textarea class="form-control" name="contacto" ng-model="objeto.contacto" placeholder="" required maxlength="250" ng-change="contar(objeto.contacto)"></textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-info">
            <label class='control-label'><i class='material-icons'></i>CORREO</label>
            <!--{!! Form::text('correo',null,array('ng-model'=>'objeto.correo','class'=>'form-control','placeholder'=>'email ETC.')) !!}-->
            <textarea class="form-control" name="correo" ng-model="objeto.correo" placeholder="" required maxlength="250" ng-change="contar(objeto.correo)"></textarea>
        </div>
    </div>
</div>
