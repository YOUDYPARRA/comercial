<div class="row">
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.categoria1.$error.required">*</span>
            <label class="control-label">Organización</label>
            <select name="categoria1" class="form-control" class="form-control" ng-model="producto.categoria1" required="">
                    <option value=""></option>
                    <option value="SMH">SMH</option>
                    <option value="IMS">IMS</option>
            </select>
        </div>
    </div>
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.bandera_insumo.$error.required">*</span>
            <label class="control-label">Categoria</label>
            {!! Form::select('bandera_insumo',[
                        ''=>'',
                        'E'=>'EQUIPO',
                        'R'=>'REFACCION',
                        'O'=>'OPCION',
                        'C'=>'CONSUMIBLE',
                        'A'=>'ACCESORIO',
                        'S'=>'SERVICIO',
                        'N'=>'PAQUETE',
                        ],null,['class'=>'form-control','required'=>'','ng-model'=>'producto.bandera_insumo']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <label class="control-label">Tipo</label>
            <select name="categoria3" class="form-control" ng-model="categoria3" >
                <option value="">Elegir</option>
                <option ng-repeat="prod in insumo | orderBy : 'nombre'" value="<%prod.nombre%>"><%prod.nombre%></option>
            </select>
        </div>
    </div>
    <div class='col-md-3'>  
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.tipo_equipo.$error.required">*</span>
            <label class="control-label">Linea de negocio</label>
            <select name="tipo_equipo" class="form-control" ng-model="producto.tipo_equipo" required="" >
                <option value="">Elegir</option>
                <option ng-repeat="categoria in categorias | orderBy : 'name'" value="<%categoria.name%>"><%categoria.name%></option>
            </select>
        </div>
    </div>
</div>
<div class='row'>  
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formProducto.codigo_proovedor.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Codigo de producto</label>
            {!! Form::text('codigo_proovedor',null,['class'=>'form-control','ng-model'=>'producto.codigo_proovedor','ng-change'=>'getProductos(producto.codigo_proovedor);checkCode(producto.codigo_proovedor)','placeholder'=>'BUSCAR CODIGO PRODUCTO']) !!}
        </div>    
    </div> 
    <div class="col-md-6">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.codigo_proovedor.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Resultados encontrados en Sistema Alendum<span class="badge"> <%productos.length%> </span></label>
            <select name="codigo" ng-model="codigo" class="form-control" ng-change="productoSeleccionado(codigo)">
                <option value="">Elige un producto</option>
                <option ng-repeat="objeto in productos" value="<%objeto%>"><% objeto.value | uppercase %>  <% objeto.product_name | uppercase %></option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.descripcion.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Descripción</label>
            {!! Form::text('descripcion',null,['class'=>'form-control','ng-model'=>'producto.descripcion','required'=>'']) !!}
        </div>
    </div>
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.marca.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Marca</label>
            {!! Form::text('marca',null,['class'=>'form-control','ng-model'=>'producto.marca','required'=>'']) !!}
        </div>
    </div>
    <div class='col-md-3'> 
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.modelo.$error.required">*</span>
            <label class="control-label"><i class="material-icons"></i>Modelo</label>
            {!! Form::text('modelo',null,['class'=>'form-control','ng-model'=>'producto.modelo']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.costos.$error.required">*</span>
            <label class="control-label">Costo del producto</label>
            {!! Form::text('costos',null,['class'=>'form-control','required'=>'','ng-model'=>'producto.costos']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.costo_moneda.$error.required">*</span>
            <label class="control-label">Moneda compra</label>
            {!! Form::select('costo_moneda',[
                ''=>'',
                'USD'=>'USD',
                'MXN'=>'MXN',
                'EUR'=>'EUR',
                'JPY'=>'JPY',
                'CNY'=>'CNY',
                'GBP'=>'GBP'],null,['class'=>'form-control','required'=>'','ng-model'=>'producto.costo_moneda']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.unidad_compra.$error.required">*</span>
            <label class="control-label">Unidad de compra</label>
            <select name="unidad_compra" ng-model="producto.unidad_compra" class="form-control" ng-init="getUnidades('C','*')" required="">
                <option value=""></option>
                <option ng-repeat="objeto in unidad" value="<%objeto.p_name%>"><% objeto.p_name | uppercase %></option>
            </select>            
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.cantidad_unidad_compra.$error.required">*</span>
            <label class="control-label">Cantidad por unidad de compra</label>
            {!! Form::text('cantidad_unidad_compra',null,['class'=>'form-control','required'=>'','ng-model'=>'producto.cantidad_unidad_compra','ng-change'=>'validaEntero(producto.cantidad_unidad_compra)']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.precio.$error.required">*</span>
            <label class="control-label">Precio de venta</label>
            {!! Form::text('precio',null,['class'=>'form-control','required'=>'','ng-model'=>'producto.precio']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.tipo_cambio.$error.required">*</span>
            <label class="control-label">Moneda venta</label>
             {!! Form::select('tipo_cambio',[
                        ''=>'',
                        'USD'=>'USD',
                        'MXN'=>'MXN',
                        'JPY'=>'JPY',
                        'CNY'=>'CNY',
                        'EUR'=>'EUR',
                        'GBP'=>'GBP'],null,['class'=>'form-control','required'=>'','ng-model'=>'producto.tipo_cambio']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-info">
            <span class="badge badge-warning" ng-show="formProducto.unidad_medida.$error.required">*</span>
            <label class="control-label">Unidad de venta</label>
            <select name="unidad_medida" ng-model="producto.unidad_venta" class="form-control" ng-init="getUnidades('C','*')" required="">
                <option value=""></option>
                <option ng-repeat="objeto in unidad" value="<%objeto.p_name%>"><% objeto.p_name | uppercase %></option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group has-info" >
            <span class="badge badge-warning" ng-show="formProducto.estado.$error.required">*</span>
            <label class="control-label">Registro Sanitario</label><br>
            <label class="control-label">SI{!! Form::radio('estado','SI',false,['ng-model'=>'producto.estado','required'=>'','class'=>'form-control']) !!}</label>
            <label class="control-label">NO{!! Form::radio('estado','NO',false,['ng-model'=>'producto.estado','required'=>'','class'=>'form-control']) !!}</label>
        </div>
    </div>
</div>

@if(isset($insumo->precios))<!--//verificar cuando hay precios y validar en una edicion cuando no venga con precios-->
<div class="row">
    <div class="col-md-12">
        <div class="form-group has-info">
            <label class="control-label">Multiprecios de ventas {{count($insumo->precios)}}</label>
    @if(sizeof($insumo->precios)>0)
            <input type="checkbox" name="multiprecios" ng-model="multiprecios"/>
    @else
            <input type="checkbox" name="multiprecios" ng-model="multiprecios" ng-init="multiprecios='false'"/>
    <div class="row" ng-show="multiprecios">
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[0]','DISTRIBUIDOR',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[0]','',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[1]','CONTADO',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[1]','',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[2]','LISTA',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[2]','',['class'=>'form-control']) !!}
            </div>
        </div>
    </div><!--fin de formulario multiprecio-->
    @endif
        </div>
    </div>
    @foreach($insumo->precios as $k=>$precio)
        <div class="col-md-3">                        
            <div class="form-group label-floating has-info">
                <label class="control-label">ETIQUETA </label>{{--$k--}}
                {!! Form::hidden('id[$k]',$precio->id,array('required'=>'','class'=>'form-control')) !!}                {{--!! Form::text('etiqueta[$k]',$precio->etiqueta,['class'=>'form-control']) !!--}}
                <?php echo '<input type="text" name="etiqueta['.$k.']" value="'.$precio->etiqueta.'" class="form-control">';?>
            </div>
        </div>
        <div class="col-md-3">                
            <div class="form-group label-floating has-info">
                <label class="control-label">PRECIO </label>                        {{--!! Form::text('monto[$k]',$precio->monto,['class'=>'form-control']) !!--}}
                <?php echo '<input type="text" name="monto['.$k.']" value="'.$precio->monto.'" class="form-control">';?>
            </div>
        </div>
    @endforeach
</div><!--fin de formulario multiprecio-->
@else
    <div class="col-md-12">
        <div class="form-group has-info">
            <label class="control-label">Multiprecios de venta</label>
            <input type="checkbox" name="multiprecios" ng-model="multiprecios"/>
        </div>
    </div>
    <div class="row" ng-show="multiprecios">
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[0]','DISTRIBUIDOR',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[0]','1',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[1]','CONTADO',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[1]','2',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group label-floating has-info">
                <label class="control-label">Etiqueta </label>
                {!! Form::text('etiqueta[2]','LISTA',['class'=>'form-control']) !!}
            </div>
            <div class="form-group label-floating has-info">
                <label class="control-label">Precio </label>
                {!! Form::text('monto[2]','3',['class'=>'form-control']) !!}
            </div>
        </div>
    </div><!--fin de formulario multiprecio-->
@endif<!--<div class="checkbox">-->