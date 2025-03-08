<div class='form-group'>
<div class="row">
    <div class="col-sm-3">
        @if(isset($id) )    
                <div class="form-group">
                    <label>ID</label>
                    {!! Form::text('id',null,array('readonly'=>'readonly','required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.id','ng-init'=>'marcaProveedor.id='.$id)) !!}
                </div>
            <div class="form-group">
                <label>PROVEEDOR</label>
                {!! Form::text('nombre_proveedor',null,array('readonly'=>'readonly','required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.nombre_proveedor')) !!}
            </div>
            
            <div class="form-group">
                <label>MARCA</label>
                {!! Form::text('marca_representada',null,array('readonly'=>'readonly','required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.marca_representada')) !!}
            </div>
            @else
            <div class="form-group">
                <label>PROVEEDOR</label>
                {!! Form::text('nombre_proveedor',null,array('required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.nombre_proveedor')) !!}
            </div>
            
            <div class="form-group">
                <label>MARCAS</label>
                {!! Form::text('marca_representada',null,array('required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.marca_representada')) !!}
            </div>
        @endif
        
    </div>
    <div class="col-sm-3">
        <div class="form-group">
                    <label>PROCESO INTERNO</label>
                    {!! Form::text('proceso_interno',null,array('required'=>'','class'=>'form-control','ng-model'=>'calulo_proveedor.proceso_interno','ng-blur'=>'entrega()')) !!}
            </div>
            <div class="form-group">
                    <label>TIEMPO FABRICACION</label>
                    {!! Form::text('tiempo_fabricacion',null,array('required'=>'','class'=>'form-control','ng-model'=>'calulo_proveedor.tiempo_fabricacion','ng-blur'=>'entrega()')) !!}
            </div>
            <div class="form-group">
                    <label>TIEMPO EMBARQUE</label>
                    {!! Form::text('tiempo_embarque',null,array('required'=>'','class'=>'form-control','ng-model'=>'calulo_proveedor.tiempo_embarque','ng-blur'=>'entrega()')) !!}
            </div>
            <div class="form-group">
                    <label>LIBERACION ADUANA</label>
                    {!! Form::text('liberacion_aduana',null,array('required'=>'','class'=>'form-control','ng-model'=>'calulo_proveedor.liberacion_aduana','ng-blur'=>'entrega()')) !!}
            </div>
        
    </div>


    
    <div class="col-sm-3">
            <div class="form-group">
                <label>DÍA DE ENTREGA MÁXIMA</label>
                {!! Form::text('dias_entrega_maximo',null,array('required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.dias_entrega_maximo')) !!}
            </div>
            
            <div class="form-group">
                <label>DÍA DE ENTREGA MÍNIMO</label>
                {!! Form::text('dias_entrega_minimo',null,array('required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.dias_entrega_minimo')) !!}
            </div>
            
            <div class="form-group">
                <label>OBSERVACIÓN</label>
                {!! Form::text('observacion',null,array('required'=>'','class'=>'form-control','ng-model'=>'marcaProveedor.observacion')) !!}
            </div>
        </div>        
    </div>
</div>